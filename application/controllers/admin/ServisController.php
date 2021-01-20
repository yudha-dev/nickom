<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ServisController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model(array('Sparepart', 'Servis', 'Kategori', 'Keranjang'));
		$this->load->library('form_validation');
		is_login();
		admin();
	}
	//get data
	public function index()
	{
		$servis = $this->Servis->getAll()->result();

		$data = [
			'folder' 			=> 'servis',
			'page'   			=> 'data_servis',
			'title'             => 'Data Servis',
			'servis'			=> $servis
		];

		$this->load->view('admin/templates/index', $data);
	}
	//get view tambah 
	public function tambahServis()
	{
		$sparepart = $this->Sparepart->getJoin()->result();
		$count = $this->Keranjang->getCount();
		$keranjang = $this->Keranjang->getAll()->result();
		$total	= $this->Keranjang->total()->row();

		$data = [
			'folder' 			=> 'servis',
			'page'   			=> 'tambah_servis',
			'title'             => 'Tambah Servis',
			'sparepart'			=> $sparepart,
			'keranjang'			=> $keranjang,
			'count'				=> $count,
			'total'				=> $total
		];

		$this->load->view('admin/templates/index', $data);
	}
	//add keranjang
	public function addKeranjang($id)
	{
		$data = array(
			'id_sparepart' => $id
		);
		$this->Keranjang->save($data);
		redirect(site_url('admin/servis/tambah_servis'));
	}
	//delete keranjnag
	public function deleteKeranjang($id)
	{
		$this->Keranjang->delete($id);
		redirect(site_url('admin/servis/tambah_servis'));
	}
	//add servis
	public function addServis()
	{
		//ambil data dari form
		$post = $this->input->post();
		$kode = $this->Servis->maxCode()->row();
		$urut 	= (int) substr($kode->kode, 3, 4);
		$urut++;
		$char 	= "SVC";
		$kode 	= $char . sprintf("%03s", $urut);
		$krj = $this->Keranjang->getAll()->result();
		//
		$validation = $this->form_validation;
		$validation->set_rules('nama_pel', 'Nama Pelanggan', 'required', array('required' => '%s wajib diisi'));
		$validation->set_rules('alamat', 'Alamat Pelanggan', 'required', array('required' => '%s wajib diisi'));
		$validation->set_rules('no_hp', 'Nomor Hp', 'required', array('required' => '%s wajib diisi'));
		if ($validation->run() == false) {
			return $this->tambahServis();
		} else {
			foreach ($krj as $k) {
				$data[] = array(
					"id_sparepart"	=>	$k->id_sparepart,
					'nama_pel' 		=> ucwords($post['nama_pel']),
					'alamat_pel'	=> $post['alamat'],
					'no_hp'			=> $post['no_hp'],
					'kode_servis'	=> $kode,
					'tgl_servis'	=> date('Y-m-d'),
					'status'		=> 'Diproses'
				);
			}

			$this->Servis->save($data);
			$this->Keranjang->deleteAll();
			$this->session->set_flashdata('simpan', 'Tambah data servis berhasil');
			redirect(site_url('admin/servis/data_servis'));
		}
	}
}
