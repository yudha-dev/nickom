<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SparepartController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model(array('Sparepart', 'Kategori'));
		$this->load->library('form_validation');
		is_login();
		admin();
	}
	//get data
	public function index()
	{
		$sparepart = $this->Sparepart->getAll()->result();

		$data = [
			'folder' 			=> 'sparepart',
			'page'   			=> 'data_sparepart',
			'title'             => 'Data Sparepart',
			'sparepart'			=> $sparepart
		];

		$this->load->view('admin/templates/index', $data);
	}
	//get view tambah 
	public function tambahSparepart()
	{
		$kategori = $this->Kategori->getAll()->result();

		$data = [
			'folder' 			=> 'sparepart',
			'page'   			=> 'tambah_sparepart',
			'title'             => 'Tambah Sparepart',
			'kategori'			=> $kategori
		];

		$this->load->view('admin/templates/index', $data);
	}
	//
	public function listSatuan()
	{
		// Ambil data ID Provinsi yang dikirim via ajax post
		$id_kat = $this->input->post('id_kategori');

		$lists = $this->Kategori->getSatuan($id_kat)->row();
		if (empty($lists)) {
			$callback = array('list_satuan' => 'Kategori belum dipilih');
			echo json_encode($callback);
		} else {
			$callback = array('list_satuan' => $lists->satuan);
			echo json_encode($callback); // konversi varibael $callback menjadi JSON
		}
	}

	//insert data
	public function store()
	{
		//ambil data dari form
		$post = $this->input->post();
		// vaidasi form
		$validation = $this->form_validation;
		$validation->set_rules('kategori', 'Kategori', 'required', array('required' => '%s wajib diisi'));
		$validation->set_rules('nama_sparepart', 'Nama Sparepart', 'required', array('required' => '%s wajib diisi'));
		$validation->set_rules('harga_beli', 'Harga Beli', 'required', array('required' => '%s wajib diisi'));
		$validation->set_rules('harga_jual', 'Harga Jual', 'required', array('required' => '%s wajib diisi'));
		if ($validation->run() == false) {
			return $this->tambahSparepart();
		} elseif (preg_replace("/[^0-9]/", "", $post['harga_beli']) > preg_replace("/[^0-9]/", "", $post['harga_jual'])) {
			$this->session->set_flashdata('kurang', 'Harga beli tidak boleh lebih dari harga jual');
			return $this->tambahSparepart();
		} else {
			$data = array(
				'id_kategori' 		=> $post['kategori'],
				'nama_sparepart' 	=> ucwords($post['nama_sparepart']),
				'harga_beli' 		=> preg_replace("/[^0-9]/", "", $post['harga_beli']),
				'harga_jual' 		=> preg_replace("/[^0-9]/", "", $post['harga_jual']),
				'ukuran' 			=> $post['keterangan'],
				'is_delete'			=> 1
			);
			$this->Sparepart->save($data);
			$this->session->set_flashdata('simpan', 'Tambah data sparepart berhasil');
			redirect(site_url('admin/sparepart/data_sparepart'));
		}
	}
	//view edit data
	public function showEdit($id)
	{
		$kategori = $this->Kategori->getAll()->result();

		$data = [
			'sparepart' 	=>  $this->Sparepart->getById($id)->row(),
			'folder' 		=> 'sparepart',
			'page' 			=> 'edit_sparepart',
			'title' 		=> 'Edit Data Sparepart',
			'kategori'		=> $kategori
		];

		$this->load->view('admin/templates/index', $data);
	}
	//update data
	public function update()
	{
		$post = $this->input->post();
		$id = $post['id'];
		// vaidasi form
		$validation = $this->form_validation;
		$validation->set_rules('kategori', 'Kategori', 'required', array('required' => '%s wajib diisi'));
		$validation->set_rules('nama_sparepart', 'Nama Sparepart', 'required', array('required' => '%s wajib diisi'));
		$validation->set_rules('harga_beli', 'Harga Beli', 'required', array('required' => '%s wajib diisi'));
		$validation->set_rules('harga_jual', 'Harga Jual', 'required', array('required' => '%s wajib diisi'));
		if ($validation->run() == false) {
			return $this->tambahSparepart();
		} elseif (preg_replace("/[^0-9]/", "", $post['harga_beli']) > preg_replace("/[^0-9]/", "", $post['harga_jual'])) {
			$this->session->set_flashdata('kurang', 'Harga beli tidak boleh lebih dari harga jual');
			return $this->tambahSparepart();
		} else {
			$data = array(
				'id_kategori' 		=> $post['kategori'],
				'nama_sparepart' 	=> ucwords($post['nama_sparepart']),
				'harga_beli' 		=> preg_replace("/[^0-9]/", "", $post['harga_beli']),
				'harga_jual' 		=> preg_replace("/[^0-9]/", "", $post['harga_jual']),
				'ukuran' 			=> $post['keterangan'],
				'is_delete'			=> 1
			);
			$this->Sparepart->update($data, $id);
			$this->session->set_flashdata('update', 'Edit data sparepart berhasil');
			redirect(site_url('admin/sparepart/data_sparepart'));
		}
	}
	//delete data
	public function delete($id)
	{
		$this->Sparepart->delete($id);
		$this->session->set_flashdata('hapus', 'Data sparepart berhasil dihapus');
		redirect(site_url('admin/sparepart/data_sparepart'));
	}
}
