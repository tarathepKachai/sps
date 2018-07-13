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

$route['API'] = "Rest_server";

$route['get_test'] = "api/News/user";

$route['get_test2'] = "api/News/usera";
$route['patient/save']="api/Patient/patient_save";
$route['patient/user']="api/Patient/user";

$route['prefix_list']="api/Patient/prefix";
$route['person_status_list']="api/Patient/person_status";
$route['edu_list']="api/Patient/edu_list";
$route['time_sp_list']="api/Patient/time_sp_list";
$route['sp_list']="api/Patient/sp_list";
$route['symptom_list']="api/Patient/symptom_list";
$route['sp_act_list']="api/Patient/sp_act_list";
$route['evaluation_list']="api/Patient/evaluation_list";

$route['get_sp_info_by_id']="api/Patient/get_sp_info_by_id";
$route['get_sp_by_id']="api/Patient/get_sp_by_id";
$route['get_sp_data']="api/Patient/get_sp_data";
$route['get_single_sp_info']="api/Patient/get_single_sp_info";
$route['sp_info_data_table']='api/Patient/sp_info_data_table';
$route['search_person'] = 'api/Patient/search_person';
$route['search_sp_info'] = 'api/Patient/search_sp_info';

$route['sp_save']="api/Patient/sp_save";
$route['save_sp_info']="api/Patient/save_sp_info";
$route['update_evaluation']="api/Patient/update_evaluation";
$route['update_symptom']="api/Patient/update_symptom";
$route['update_sp_act']="api/Patient/update_sp_act";
$route['save_comment']="api/Patient/save_comment";
$route['delete_sp_info']='api/Patient/delete_sp_info';
$route['update_sp_info']='api/Patient/update_sp_info';

