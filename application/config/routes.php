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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['forgot-password'] = 'forgot_password';
$route['about-us'] = 'about_us';
$route['how-to-use'] = 'how_to_use';
$route['choose-your-package'] = 'choose_your_package';
$route['terms-and-condition'] = 'terms_and_condition';

/*********** Manager Admin **********/
$route['manager-admin'] = 'manager-admin/index';
$route['manager-admin/edit_user/(:num)'] = 'manager-admin/edit_user';
$route['manager-admin/generate_report/(:num)/(:any)'] = 'manager-admin/generate_report';
$route['manager-admin/instant_report/(:any)/(:num)/(:any)'] = 'manager-admin/instant_report';

$route['manager-admin/users/food_log/(:num)'] = 'manager-admin/Food_log';
$route['manager-admin/users/food_log/store'] = 'manager-admin/Food_log/store';
$route['manager-admin/users/food_log/fetch_food_data'] = 'manager-admin/Food_log/fetch_food_data';