<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//login
$route['default_controller'] = 'auth';
//logout
$route['logout']                                           = 'Auth/logout';
//pemilik
$route['pemilik/beranda']                               = 'pemilik/DashboardController/index';
$route['pemilik/user/data_user']                        = 'pemilik/UserController/index';
$route['pemilik/user/tambah_user']                      = 'pemilik/UserController/tambahUser';
$route['pemilik/user/insert']                           = 'pemilik/UserController/store';
$route['pemilik/user/edit_user/(:any)']                 = 'pemilik/UserController/showEdit/$1';
$route['pemilik/user/update_user']                      = 'pemilik/UserController/update';
$route['pemilik/user/delete/(:any)']                    = 'pemilik/UserController/delete/$1';
//pemilik servis
$route['pemilik/servis/data_servis']                   	= 'pemilik/ServisController/index';
//admin beranda
$route['admin/beranda']                                   = 'admin/DashboardController/index';
//admin kategori
$route['admin/kategori/data_kategori']                  = 'admin/KategoriController/index';
$route['admin/kategori/tambah_kategori']                = 'admin/KategoriController/tambahKategori';
$route['admin/kategori/insert']                          = 'admin/KategoriController/store';
$route['admin/kategori/edit_kategori/(:any)']           = 'admin/KategoriController/showEdit/$1';
$route['admin/kategori/update']                           = 'admin/KategoriController/update';
$route['admin/kategori/delete/(:any)']                     = 'admin/KategoriController/delete/$1';
//admin sparepart
$route['admin/sparepart/data_sparepart']                = 'admin/SparepartController/index';
$route['admin/sparepart/tambah_sparepart']              = 'admin/SparepartController/tambahSparepart';
$route['admin/sparepart/insert']                        = 'admin/SparepartController/store';
$route['admin/sparepart/edit_sparepart/(:any)']         = 'admin/SparepartController/showEdit/$1';
$route['admin/sparepart/update']                           = 'admin/SparepartController/update';
$route['admin/sparepart/delete/(:any)']                 = 'admin/SparepartController/delete/$1';
//admin servis
$route['admin/servis/data_servis']                        = 'admin/ServisController/index';
$route['admin/servis/tambah_servis']                      = 'admin/ServisController/tambahServis';
$route['admin/servis/add/(:any)']                          = 'admin/ServisController/addKeranjang/$1';
$route['admin/servis/delete/(:any)']                     = 'admin/ServisController/deleteKeranjang/$1';
$route['admin/servis/add_servis']                         = 'admin/ServisController/addServis';
//admin pembayaran
$route['admin/pembayaran/data_pembayaran']				= 'admin/PembayaranController/index';
$route['admin/pembayaran/proses_pembayaran/(:any)']		= 'admin/PembayaranController/formBayar/$1';
$route['admin/pembayaran/insert']						= 'admin/PembayaranController/store';
$route['admin/pembayaran/cetak_pembayaran/(:any)']		= 'admin/PembayaranController/cetakData/$1';
//tekhnisi
$route['tekhnisi/beranda']                              = 'tekhnisi/DashboardController/index';
//tekhnisi servis
$route['tekhnisi/servis/data_servis']                    = 'tekhnisi/ServisController/index';
$route['tekhnisi/servis/detail_servis/(:any)']           = 'tekhnisi/ServisController/detailServis/$1';
$route['tekhnisi/servis/selesai_servis/(:any)']          = 'tekhnisi/ServisController/selesaiServis/$1';
$route['tekhnisi/servis/done_servis']                    = 'tekhnisi/ServisController/doneServis';
//tekhnisi history servis
$route['tekhnisi/history_servis/data_history']           = 'tekhnisi/HistoryController/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
