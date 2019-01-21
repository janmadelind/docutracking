<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Admin_controller/home';

$route['bac'] = 'Admin_controller/bac';
$route['procurement'] = 'Admin_controller/procurement';
$route['enduser'] = 'Admin_controller/enduser';

$route['bac_table_pending'] = 'Admin_controller/bac_table_pending';
$route['bac_table_ongoing'] = 'Admin_controller/bac_table_ongoing';
$route['bac_table_done'] = 'Admin_controller/bac_table_done';
$route['bac_table_failed'] = 'Admin_controller/bac_table_failed';
$route['bac_notif'] = 'Admin_controller/bac_notif';
$route['bac_details'] = 'Admin_controller/bac_details';

$route['procurement_table_pending'] = 'Admin_controller/procurement_table_pending';
$route['procurement_table_ongoing'] = 'Admin_controller/procurement_table_ongoing';
$route['procurement_table_done'] = 'Admin_controller/procurement_table_done';
$route['procurement_table_failed'] = 'Admin_controller/procurement_table_failed';
$route['procurement_notif'] = 'Admin_controller/procurement_notif';
$route['procurement_details'] = 'Admin_controller/proc_details';

$route['enduser_table_pending'] = 'Admin_controller/enduser_table_pending';
$route['enduser_table_ongoing'] = 'Admin_controller/enduser_table_ongoing';
$route['enduser_table_done'] = 'Admin_controller/enduser_table_done';
$route['enduser_table_failed'] = 'Admin_controller/enduser_table_failed';
$route['enduser_notif'] = 'Admin_controller/enduser_notif';
$route['enduser_details'] = 'Admin_controller/enduser_details';

$route['pr_form'] = 'Admin_controller/pr_form';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
