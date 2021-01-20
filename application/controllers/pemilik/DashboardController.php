<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
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

	public function index()
	{
		$user = $this->User->getAll()->result();

		$data = [
			'folder' 			=> 'dashboard',
			'page'   			=> 'index',
			'title'             => 'Dashboard',
			'user'				=> $user
		];

		$this->load->view('pemilik/templates/index', $data);
	}
}
