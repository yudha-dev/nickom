<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
	//global function
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		is_login();
		admin();
	}

	public function index()
	{

		$data = [
			'folder' 			=> 'dashboard',
			'page'   			=> 'index',
			'title'             => 'Dashboard',
		];

		$this->load->view('admin/templates/index', $data);
	}
}
