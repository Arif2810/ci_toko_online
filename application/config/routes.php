<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
// $route['default_controller'] = 'welcome';
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['customer/buy/(:num)'] = 'customer/sale/buy/$1';
$route['customer/detail/(:num)'] = 'customer/product/show/$1';
$route['keranjang'] = 'customer/sale/cart';
$route['keranjang/hapus/(:num)'] = 'customer/sale/hapus_cart/$1';
$route['checkout'] = 'customer/sale/checkout';
$route['riwayat'] = 'customer/sale/history';
$route['nota/(:num)'] = 'customer/sale/nota/$1';
$route['pembayaran/(:num)'] = 'customer/sale/pembayaran/$1';
$route['lihat_pembayaran/(:num)'] = 'customer/sale/lihat_pembayaran/$1';

$route['login'] = 'customer/auth/login';
$route['daftar'] = 'customer/auth/register';

// ======================================================================
$route['admin'] = 'admin/dashboard';

$route['admin/login'] = 'admin/auth/login';
$route['admin/logout'] = 'admin/auth/logout';

$route['admin/barang'] = 'admin/product';
$route['admin/barang/tambah'] = 'admin/product/add';
$route['admin/barang/detail/(:num)'] = 'admin/product/show/$1';
$route['admin/barang/ubah/(:num)'] = 'admin/product/edit/$1';
$route['admin/barang/delete/(:num)'] = 'admin/product/delete/$1';

$route['admin/kategori'] = 'admin/category';
$route['admin/kategori/tambah'] = 'admin/category/add';
$route['admin/kategori/ubah/(:num)'] = 'admin/category/edit/$1';
$route['admin/kategori/hapus/(:num)'] = 'admin/category/delete/$1';

$route['admin/pembelian'] = 'admin/purchase';
$route['admin/pembelian/detail/(:num)'] = 'admin/purchase/show/$1';
$route['admin/pembayaran/(:num)'] = 'admin/purchase/pembayaran/$1';

$route['admin/pelanggan'] = 'admin/customer';
$route['admin/pelanggan/hapus/(:num)'] = 'admin/customer/delete/$1';

$route['admin/laporan'] = 'admin/report';

