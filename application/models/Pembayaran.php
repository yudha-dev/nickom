<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Model
{

	private $_table = 'pembayaran';
	//save data
	public function save($data)
	{
		//INSERT INTO kategori
		$this->db->insert($this->_table, $data);
		return $this->db->insert_id();
	}
}
