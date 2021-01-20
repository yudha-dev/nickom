<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HistoryController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model(array('Sparepart', 'Servis', 'Kategori', 'Keranjang', 'TarifServis'));
		$this->load->library('form_validation');
		is_login();
		tekhnisi();
	}
	//index
	public function index()
	{
		$id = $this->session->userdata('id_user');
		$servis = $this->Servis->getHistory($id)->result();

		$data = [
			'folder' 			=> 'history',
			'page'   			=> 'data_history',
			'title'             => 'Data History',
			'servis'			=> $servis
		];

		$this->load->view('tekhnisi/templates/index', $data);
	}
	//detail
	public function detailServis($id)
	{
		$data = [
			'detail' 	=>  $this->Servis->detail($id)->result(),
			'folder' 	=> 'servis',
			'page' 		=> 'detail_servis',
			'title' 	=> 'Detail Data Servis'
		];

		$this->load->view('tekhnisi/templates/index', $data);
	}
	//selesai service
	public function selesaiServis($id)
	{
		$total	= $this->Servis->total()->row();

		$data = [
			'folder' 			=> 'servis',
			'page'   			=> 'selesai_servis',
			'title'             => 'Selesai Servis',
			'kode'				=> $id,
			'total'				=> $total,
		];

		$this->load->view('tekhnisi/templates/index', $data);
	}
	//store
	public function doneServis()
	{
		//ambil data dari form
		$post = $this->input->post();
		$kode = $post['kode_servis'];

		$data = array(
			'id_user' 						=> $this->session->userdata('id_user'),
			'kode_servis' 					=> $kode,
			'tarif_servis' 					=> preg_replace("/[^0-9]/", "", $post['tarif_servis']),
			'total_hrg_sparepart' 			=> preg_replace("/[^0-9]/", "", $post['total']),
		);
		$this->TarifServis->save($data);
		$this->Servis->update($kode);
		$this->session->set_flashdata('simpan', 'Servis Selesai');
		redirect(site_url('tekhnisi/servis/data_servis'));
	}
}
