<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sparepart extends CI_Model
{
	private $_table = 'sparepart';

	//select * from kategori
	public function getAll()
	{
		$this->db->select('*');
		$this->db->join('kategori', 'kategori.id_kategori = sparepart.id_kategori');
		return $this->db->get_where($this->_table, ['sparepart.is_delete' => 1]);
	}
	//save data
	public function save($data)
	{
		//INSERT INTO kategori
		$this->db->insert($this->_table, $data);
		return $this->db->insert_id();
	}
	//edit data
	public function getById($id)
	{
		//GET edit data ke form
		$this->db->select('*');
		$this->db->join('kategori', 'kategori.id_kategori = sparepart.id_kategori');
		return $this->db->get_where($this->_table, ['id_sparepart' => $id]);
	}
	//update data
	public function update($data, $id)
	{
		// Update data user
		$this->db->where('id_sparepart', $id);
		$this->db->update($this->_table, $data);
	}
	//delete
	public function delete($id)
	{
		//Soft delete
		$this->db->where('id_sparepart', $id);
		$this->db->update($this->_table, ['is_delete' => 0]);
	}
	//get satuan
	public function viewSparepart($id_kategori)
	{
		$this->db->select('*');
		$this->db->join('kategori', 'sparepart.id_kategori = kategori.id_kategori');
		return $this->db->get_where($this->_table, ['sparepart.id_kategori' => $id_kategori]);
	}
	//get join
	public function getJoin()
	{
		$this->db->select('*');
		$this->db->join('kategori', 'sparepart.id_kategori = kategori.id_kategori');
		return $this->db->get($this->_table);
	}
}
