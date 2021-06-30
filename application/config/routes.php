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
$route['default_controller'] = 'welcome';
$route['404_override'] = 'Test/index';
$route['translate_uri_dashes'] = FALSE;

/* ROUTE EXTERNAL */
$route['login'] = 'Users/login';
$route['register'] = 'Users/register';
$route['register-car'] = 'Users/register_staff';
$route['logout'] = 'Users/logout';

/* ROUTE USER */
$route['edit/profile'] = 'Users/profile';
$route['history'] = 'Users/Riwayat';
$route['change/password'] = 'Users/Password';
$route['invoice'] = 'Users/Invoice';
$route['invoice/(:any)'] = 'Payment/Detail/$1';
$route['kupon'] = 'Users/kupon/';
// $route['pay'] = 'Payment/rent/';

$route['topup'] = 'Users/topup';
$route['rating'] = 'Mobil/rate_car';

/* CAR DETAILS */
$route['cars/detail/(:any)'] = 'Mobil/getDetail/$1';
$route['payment-rent'] = 'Mobil/Buy';

/* Adnub Route */
$route['admin/staff'] = 'Admin/staff';
$route['admin/change-status'] = 'Admin/change_status';
$route['admin/penyewa'] = 'Admin/penyewa';
$route['admin/promo'] = 'Admin/promo';
$route['tambah_promo'] = 'Admin/tambah_promo';
$route['confirm-payment'] = 'Admin/confirm_payment';

/* Staff Route */
$route['staff/new-car'] = 'Staff/insert';
$route['staff/rating'] = 'Staff/show_rating';
