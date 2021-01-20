<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
	//global function
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('User');
		$this->load->library('form_validation');
		is_login();
		pemilik();
	}

	//view data user
	public function index()
	{
		$user = $this->User->getAll()->result();

		$data = [
			'folder' 			=> 'user',
			'page'   			=> 'data_user',
			'title'             => 'Data User',
			'user'				=> $user
		];

		$this->load->view('pemilik/templates/index', $data);
	}
	//view tambah user
	public function tambahUser()
	{
		$data = [
			'folder'	=> 'user',
			'page'		=> 'tambah_user',
			'title'		=> 'Tambah User'
		];

		$this->load->view('pemilik/templates/index', $data);
	}
	//post data
	public function store()
	{
		//ambil data dari form
		$post = $this->input->post();
		// vaidasi form
		$validation = $this->form_validation;
		$validation->set_rules('nama', 'Nama', 'required');
		$validation->set_rules('username', 'Username', 'required|is_unique[user.username]', array('required' => '%s wajib diisi', 'is_unique' => '%s sudah terdaftar'));
		$validation->set_rules('password', 'Password', 'required');
		$validation->set_rules('alamat', 'Alamat', 'required');
		$validation->set_rules('no_hp', 'Nomor Hp', 'required|numeric');
		$validation->set_rules('jabatan', 'Jabatan', 'required');
		if ($validation->run() == false) {
			return $this->tambahUser();
		} else {
			$upload_image = $_FILES['foto']['name'];

			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 1024;
			$config['upload_path']          = './assets/media/avatars/';

			$this->load->library('upload', $config);

			$this->upload->initialize($config);
			$this->upload->do_upload('foto');
			$gambar = $this->upload->data('file_name');
			$data = array(
				'nama'         	=> $post['nama'],
				'username'  	=> $post['username'],
				'password'  	=> password_hash($post['password'], PASSWORD_DEFAULT),
				'alamat'        => $post['alamat'],
				'no_hp'         => $post['no_hp'],
				'jabatan'       => $post['jabatan'],
				'active'		=> 1,
			);
			if ($gambar != '') {
				$data['foto_profil'] = $upload_image;
			}
			$this->User->save($data);
			$this->session->set_flashdata('simpan', 'Tambah data user berhasil');
			redirect(site_url('pemilik/user/data_user'));
		}
	}
	//view edit data
	public function showEdit($id)
	{

		$data = [
			'user' 		=>  $this->User->getById($id)->row(),
			'folder' 	=> 'user',
			'page' 		=> 'edit_user',
			'title' 	=> 'Edit Data User'
		];

		$this->load->view('pemilik/templates/index', $data);
	}
	//update data
	public function update()
	{
		//ambil data dari form
		$post = $this->input->post();
		$id = $post['id'];
		$validation = $this->form_validation;
		$validation->set_rules('nama', 'Nama', 'required');
		$validation->set_rules('username', 'Username', 'required', array('required' => '%s wajib diisi'));
		$validation->set_rules('alamat', 'Alamat', 'required');
		$validation->set_rules('no_hp', 'Nomor Hp', 'required|numeric');
		$validation->set_rules('jabatan', 'Jabatan', 'required');
		if ($validation->run() == false) {
			return $this->showEdit($id);
		} else {
			$upload_image = $_FILES['foto']['name'];

			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 1024;
			$config['upload_path']          = './assets/media/avatars/';

			$this->load->library('upload', $config);

			$this->upload->initialize($config);
			$this->upload->do_upload('foto');
			$gambar = $this->upload->data('file_name');
			$data = array(
				'nama'         	=> $post['nama'],
				'username'  	=> $post['username'],
				'alamat'        => $post['alamat'],
				'no_hp'         => $post['no_hp'],
				'jabatan'       => $post['jabatan'],
				'active'		=> 1,
			);
			if ($gambar != '') {
				$data['foto_profil'] = $upload_image;
			}
			$this->User->update($data, $id);
			$this->session->set_flashdata('update', 'Edit data user berhasil');
			redirect(site_url('pemilik/user/data_user'));
		}
	}
	//delete data
	public function delete($id)
	{
		$this->User->delete($id);
		$this->session->set_flashdata('hapus', 'Data user berhasil dihapus');
		redirect(site_url('pemilik/user/data_user'));
	}
}
