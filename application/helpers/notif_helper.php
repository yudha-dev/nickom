<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function notif()
{
	$get = get_instance();
	$get->db->select('*');
	$get->db->from('servis');
	$get->db->group_by('kode_servis');
	$get->db->where('status =', 'Diproses');
	$notif = $get->db->count_all_results();
	return $notif;
}
