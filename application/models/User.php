<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
	private $_table = 'user';

	//Ambil data
	public function getAll()
	{
		// SELECT * FROM user WHERE jabatan NOT IN ('pemilik') AND active = 1
		$this->db->where_not_in('jabatan', ['pemilik'])->where(['active' => 1])->order_by('nama', 'asc');
		return $this->db->get($this->_table);
	}
	//save data
	public function save($data)
	{
		//INSERT INTO user
		$this->db->insert($this->_table, $data);
		return $this->db->insert_id();
	}
	//edit data
	public function getById($id)
	{
		//GET edit data ke form
		return $this->db->get_where('user', ['id_user' => $id]);
	}
	//update data
	public function update($data, $id)
	{
		// Update data user
		$this->db->where('id_user', $id);
		$this->db->update($this->_table, $data);
	}
	//delete
	public function delete($id)
	{
		//Soft delete
		$this->db->where('id_user', $id);
		$this->db->update($this->_table, ['active' => 0]);
	}
}
