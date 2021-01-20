<?php
function is_login()
{
	$get = get_instance();
	//cek session
	if (!$get->session->userdata('id_user')) {
		redirect('auth');
	}
}

function pemilik()
{
	$get = get_instance();
	//jika jabatan tidak sesuai kembalikan ke profil
	if ($get->session->userdata('jabatan') != 'pemilik') {
		redirect('auth');
	}
}
function admin()
{
	$get = get_instance();
	//jika jabatan tidak sesuai kembalikan ke profil
	if ($get->session->userdata('jabatan') != 'admin') {
		redirect('auth');
	}
}
function tekhnisi()
{
	$get = get_instance();
	//jika jabatan tidak sesuai kembalikan ke profil
	if ($get->session->userdata('jabatan') != 'tekhnisi') {
		redirect('auth');
	}
}
