<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('tgl_indo')) {
	function tgl_indo($date)
	{
		// array hari dan bulan
		$Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

		// pemisahan tahun, bulan, hari, dan waktu
		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl = substr($date, 8, 2);
		$waktu = substr($date, 11, 5);
		$result =  $tgl . " " . $Bulan[(int) $bulan - 1] . " " . $tahun . "" . $waktu;

		return $result;
	}
}
