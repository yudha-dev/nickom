<?php defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Model
{
	private $_table = 'keranjang';

	//select * from kategori
	public function getAll()
	{
		$this->db->select('*');
		$this->db->join('sparepart', 'keranjang.id_sparepart = sparepart.id_sparepart');
		$this->db->join('kategori', 'sparepart.id_kategori = kategori.id_kategori');
		return $this->db->get($this->_table);
	}
	//save data
	public function save($data)
	{
		//INSERT INTO kategori
		$this->db->insert($this->_table, $data);
		return $this->db->insert_id();
	}
	//count data
	public function getCount()
	{
		//GET edit data ke form
		return $this->db->count_all($this->_table);
	}
	//delete
	public function delete($id)
	{
		$this->db->delete($this->_table, ['id_keranjang' => $id]);
	}
	//delete
	public function deleteAll()
	{
		$this->db->empty_table($this->_table);
	}
	//total
	public function total()
	{
		$this->db->select_sum('harga_jual');
		$this->db->join('sparepart', 'keranjang.id_sparepart = sparepart.id_sparepart');
		return $this->db->get($this->_table);
	}
}
