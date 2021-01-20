<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	//global fungsi
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
	}
	public function index()
	{
		//cek jabatan
		$session = $this->session->userdata('jabatan');
		if ($session == 'pemilik') {
			redirect('pemilik/beranda');
		} elseif ($session == 'admin') {
			redirect('admin/beranda');
		} elseif ($session == 'tekhnisi') {
			redirect('tekhnisi/beranda');
		}
		$this->form_validation->set_rules('login-username', 'Username', 'trim|required', array('trim' => '', 'required' => 'Username wajib diisi.'));
		$this->form_validation->set_rules('login-password', 'Password', 'trim|required', array('trim' => '', 'required' => 'Password wajib diisi.'));

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login', $data);
			$this->load->view('templates/auth_footer');
		} else {
			//validasi sukses
			$this->_login();
		}
	}

	private function _login()
	{
		$username       = $this->input->post('login-username');
		$password       = $this->input->post('login-password');
		//SELECT * FROM user WHERE username = username
		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		if ($user) {
			if ($user['active'] == 1) {
				//jika user ada 
				if (password_verify($password, $user['password'])) {
					$data = [
						'id_user'     => $user['id_user'],
						'username'    => $user['username'],
						'nama'   	  => $user['nama'],
						'foto_profil' => $user['foto_profil'],
						'jabatan'     => $user['jabatan']
					];
					$this->session->set_userdata($data);
					if ($this->session->userdata('jabatan') == 'pemilik') {
						redirect('pemilik/beranda');
					} elseif ($this->session->userdata('jabatan') == 'admin') {
						redirect('admin/beranda');
					} elseif ($this->session->userdata('jabatan') == 'tekhnisi') {
						redirect('tekhnisi/beranda');
					}
				} else {
					$this->session->set_flashdata('pass', 'Password salah');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('tdk', 'Maaf akun anda sudah tidak aktif');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('belum', 'Username belum terdaftar');
			redirect('auth');
		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
