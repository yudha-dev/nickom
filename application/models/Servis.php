<?php defined('BASEPATH') or exit('No direct script access allowed');

class Servis extends CI_Model
{
	private $_table = 'servis';

	//select * from kategori
	public function getSemua()
	{
		$this->db->select('*');
		$this->db->join('sparepart', 'servis.id_sparepart = sparepart.id_sparepart');
		$this->db->group_by('servis.kode_servis');
		return $this->db->get($this->_table);
	}
	//get belum
	//select * from kategori
	public function getAll()
	{
		$this->db->select('*');
		$this->db->join('sparepart', 'servis.id_sparepart = sparepart.id_sparepart');
		$this->db->group_by('servis.kode_servis');
		return $this->db->get_where($this->_table, ['servis.status' => 'Diproses']);
	}
	//get belum
	public function getPending()
	{
		$this->db->select('*');
		$this->db->join('sparepart', 'servis.id_sparepart = sparepart.id_sparepart');
		$this->db->group_by('servis.kode_servis');
		return $this->db->get_where($this->_table, ['servis.status' => 'Diproses']);
	}
	//edit data
	public function getById($id)
	{
		//GET edit data ke form
		return $this->db->get_where($this->_table, ['id_kategori' => $id]);
	}
	//update data
	public function update($kode)
	{
		// Update data user
		$this->db->where('kode_servis', $kode);
		$this->db->update($this->_table, ['status' => 'Selesai']);
	}
	//kode
	public function maxCode()
	{
		$this->db->select_max('kode_servis', 'kode');
		return $this->db->get($this->_table);
	}
	//insert data
	public function save($data)
	{
		return $this->db->insert_batch($this->_table, $data);
	}
	//get detail servis
	public function detail($id)
	{
		$this->db->select('*');
		$this->db->join('sparepart', 'servis.id_sparepart = sparepart.id_sparepart');
		$this->db->join('kategori', 'kategori.id_kategori = sparepart.id_kategori');
		return $this->db->get_where($this->_table, ['kode_servis' => $id]);
	}
	//total
	public function total($id)
	{
		$this->db->select_sum('harga_jual');
		$this->db->join('sparepart', 'servis.id_sparepart = sparepart.id_sparepart');
		return $this->db->get_where($this->_table, ['servis.kode_servis' => $id]);
	}
	//get history
	public function getHistory($id)
	{
		$this->db->select('*');
		$this->db->join('sparepart', 'servis.id_sparepart = sparepart.id_sparepart');
		$this->db->join('tarif_servis', 'servis.kode_servis = tarif_servis.kode_servis');
		$this->db->group_by('tarif_servis.kode_servis');
		return $this->db->get_where($this->_table, ['servis.status' => 'Selesai', 'tarif_servis.id_user' => $id]);
	}
	//get pembayaran
	public function getPay()
	{
		$this->db->select('*');
		$this->db->join('sparepart', 'servis.id_sparepart = sparepart.id_sparepart');
		$this->db->join('tarif_servis', 'servis.kode_servis = tarif_servis.kode_servis');
		$this->db->group_by('tarif_servis.kode_servis');
		$this->db->where_in('servis.status', ['Selesai', 'Dibayar']);
		return $this->db->get($this->_table);
	}
	//get history
	public function getServis($id)
	{
		$this->db->select('*');
		$this->db->join('sparepart', 'servis.id_sparepart = sparepart.id_sparepart');
		$this->db->join('kategori', 'sparepart.id_kategori = kategori.id_kategori');
		$this->db->join('tarif_servis', 'servis.kode_servis = tarif_servis.kode_servis');
		return $this->db->get_where($this->_table, ['servis.kode_servis' => $id]);
	}
	//get tekhnisi
	public function getTekhnisi($id)
	{
		$this->db->select('*');
		$this->db->join('sparepart', 'servis.id_sparepart = sparepart.id_sparepart');
		$this->db->join('tarif_servis', 'servis.kode_servis = tarif_servis.kode_servis');
		$this->db->join('user', 'tarif_servis.id_user = user.id_user');
		$this->db->group_by('tarif_servis.kode_servis');
		return $this->db->get_where($this->_table, ['servis.kode_servis' => $id]);
	}
	//dibayar
	public function done($kode)
	{
		// Update data user
		$this->db->where('kode_servis', $kode);
		$this->db->update($this->_table, ['status' => 'Dibayar']);
	}
}
