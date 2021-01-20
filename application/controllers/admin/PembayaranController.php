<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PembayaranController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('Servis', 'Pembayaran'));
		$this->load->library('form_validation');
		is_login();
		admin();
	}

	public function index()
	{
		$pembayaran = $this->Servis->getPay()->result();

		$data = [
			'folder' 			=> 'pembayaran',
			'page'   			=> 'data_pembayaran',
			'title'             => 'Pembayaran Servis',
			'pembayaran'		=> $pembayaran
		];

		$this->load->view('admin/templates/index', $data);
	}
	//form pembayaran
	public function formBayar($id)
	{
		$datanya 	= $this->Servis->getServis($id)->result();
		$get 	= $this->Servis->getTekhnisi($id)->row();

		$data = [
			'folder'	=> 'pembayaran',
			'page'		=> 'tambah_pembayaran',
			'title'		=> 'Pembayaran Servis',
			'datanya'	=> $datanya,
			'get'		=> $get
		];

		$this->load->view('admin/templates/index', $data);
	}
	//
	public function store()
	{
		//ambil data dari form
		$post = $this->input->post();
		$kode = $post['kode'];
		//
		$data = array(
			'id_tarif' 			=> $post['tarif'],
			'total_bayar' 		=> $post['total_pembayaran'],
			'jumlah_bayar' 		=> preg_replace("/[^0-9]/", "", $post['jumlah_bayar']),
			'tgl_bayar' 		=> date('Y-m-d'),
		);
		$this->Pembayaran->save($data);
		$this->Servis->done($kode);
		$this->session->set_flashdata('simpan', 'Pembayaran Berhasil');
		redirect(site_url('admin/pembayaran/data_pembayaran'));
	}
	//
	public function cetakData($id)
	{
		$datanya 	= $this->Servis->getServis($id)->result();
		$get 	= $this->Servis->getTekhnisi($id)->row();

		$data = [
			'title'		=> 'Cetak Pembayaran',
			'datanya'	=> $datanya,
			'get'		=> $get
		];

		$this->load->view('admin/pembayaran/cetak_pembayaran', $data);
	}
}
