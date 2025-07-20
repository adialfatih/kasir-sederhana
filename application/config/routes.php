<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['dashboard'] = 'beranda';
//$route['manager-dashboard'] = 'beranda/dsbmng';
$route['operator-dashboard'] = 'beranda/dsbopt';
$route['404_override'] = 'Notfounde';
$route['translate_uri_dashes'] = FALSE;
$route['upload-image'] = 'Upload_image';
$route['store-image'] = 'Upload_image/produk_upload';
$route['laporan'] = 'beranda/laporan';
$route['load-laporan'] = 'beranda/load_laporan';
$route['load-menu'] = 'beranda/load_menu';
$route['hapus-pesanan'] = 'beranda/hapus_pesanan';
$route['hapus-menu'] = 'beranda/hapus_menu';
$route['setup-menu'] = 'setupmodals/newmenu';

// new route akses halaman
$route['produksi-insfinish/(:any)'] = 'produksistx/insfinish/$1';
/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/

$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
