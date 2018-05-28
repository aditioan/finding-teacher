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

//Main Routes
$route['default_controller'] = 'main';
$route['search'] = 'main/search';
$route['ketentuan'] = 'main/ketentuan';
$route['forget'] = 'main/forget';
$route['reset/(:any)'] = 'main/reset/$1';
$route['mastermind'] = 'main/mastermind';
$route['tentang'] = 'main/tentang';
$route['detail/(:num)/(:num)'] = 'main/detail/$1/$2';
$route['logout'] = 'main/logout';

// Guru Routes
// $route['profil'] = 'guru/profil';
// $route['kelas'] = 'guru/kelas';
// $route['honor'] = 'guru/honor';
$route['guru/detail-kursus/(:num)'] = 'guru/detail_kursus/$1';
$route['guru/detail-guru/(:num)/(:num)'] = 'guru/detail_guru/$1/$2';
$route['panduan-guru'] = 'guru/panduan_guru';

// Murid Routes
$route['murid/detail-kursus/(:num)'] = 'murid/detail_kursus/$1';
$route['murid/detail-guru/(:num)/(:num)'] = 'murid/detail_guru/$1/$2';
$route['panduan-murid'] = 'murid/panduan_murid';

// Superadmin Routes
$route['superadmin/data-bank'] = 'superadmin/data_bank';
$route['superadmin/data-kabupaten'] = 'superadmin/data_kabupaten';
$route['superadmin/data-kecamatan'] = 'superadmin/data_kecamatan';
$route['superadmin/data-murid'] = 'superadmin/data_murid';
$route['superadmin/data-guru'] = 'superadmin/data_guru';
$route['superadmin/tagihan-guru'] = 'superadmin/tagihan_guru';
$route['superadmin/detail-guru/(:num)'] = 'superadmin/detail_guru/$1';
$route['superadmin/detail-murid/(:num)'] = 'superadmin/detail_murid/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
