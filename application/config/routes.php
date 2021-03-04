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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin'] = 'Administrator/index';
$route['news/(:any)'] = 'Home/news_list/1';
$route['news-details/(:any)'] = 'Home/newsDetail/$1';
$route['services'] = 'Home/servicesList';
$route['projects/(:any)'] = 'Home/projectList/$1';
$route['project-details/(:any)'] = 'Home/projectDetail/$1';
$route['contact'] = 'Home/contact_us';
$route['about-company'] = 'Home/aboutCompany';
$route['about-team'] = 'Home/aboutTeam';
$route['about-history'] = 'Home/aboutHistory';
$route['about-partners'] = 'Home/partners';
$route['shop/(:any)'] = 'Home/shopList/1';

//Administrator
$route['admin/dashboard'] = 'Administrator/dashboard';
$route['admin/manage-banner'] = 'Administrator/manageBanner';
$route['admin/add-banner'] = 'Administrator/addBanner';
$route['admin/edit-banner/(:any)'] = 'Administrator/editBanner/$1';
$route['admin/manage-categories'] = 'Administrator/manageCategories';
$route['admin/add-category'] = 'Administrator/addCategory';
$route['admin/edit-category/(:any)'] = 'Administrator/editCategory/$1';
$route['admin/manage-goods'] = 'Administrator/manageGoods';
$route['admin/add-goods'] = 'Administrator/addGoods';
$route['admin/add-goods-images/(:any)'] = 'Administrator/addGoodsImages/$1';
$route['admin/edit-goods/(:any)'] = 'Administrator/editGoods/$1';
$route['admin/edit-goods-images/(:any)'] = 'Administrator/editGoodsImages/$1';