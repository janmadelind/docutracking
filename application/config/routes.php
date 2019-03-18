<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Admin_controller/home';

$route['bac'] = 'Admin_controller/bac';
$route['procurement'] = 'Procurement_controller/procurement';
$route['officeOfThePresident'] = 'Op_controller/op';
$route['enduser'] = 'Enduser_controller/enduser';
$route['ico'] = 'ICO_controller/ICO';
$route['budget'] = 'Budget_controller/budget';
$route['accounting'] = 'Accounting_controller/accounting';
$route['cashier'] = 'Cashier_controller/cashier';

#Admin_controller
$route['bac_table_pending'] = 'Admin_controller/bac_table_pending';
$route['bac_table_ongoing'] = 'Admin_controller/bac_table_ongoing';
$route['bac_table_done'] = 'Admin_controller/bac_table_done';
$route['bac_table_failed'] = 'Admin_controller/bac_table_failed';
$route['bac_notif'] = 'Admin_controller/bac_notif';
$route['bac_details'] = 'Admin_controller/bac_details';
$route['bac_reports'] = 'Admin_controller/bac_reports';

#Procurement_controller
$route['procurement_table_pending'] = 'Procurement_controller/procurement_table_pending';
$route['procurement_table_ongoing'] = 'Procurement_controller/procurement_table_ongoing';
$route['procurement_table_done'] = 'Procurement_controller/procurement_table_done';
$route['procurement_table_failed'] = 'Procurement_controller/procurement_table_failed';
$route['procurement_notif'] = 'Procurement_controller/procurement_notif';
$route['procurement_details'] = 'Procurement_controller/proc_details';
$route['proc_reports'] = 'Procurement_controller/proc_reports';

#Op_controller
$route['op_table_pending'] = 'Op_controller/op_table_pending';
$route['op_table_ongoing'] = 'Op_controller/op_table_ongoing';
$route['op_table_done'] = 'Op_controller/op_table_done';
$route['op_table_failed'] = 'Op_controller/op_table_failed';
$route['op_notif'] = 'Op_controller/op_notif';
$route['op_reports'] = 'Op_controller/op_reports';

#ICO_controller
$route['ICO_table_pending'] = 'ICO_controller/ICO_table_pending';
$route['ICO_table_ongoing'] = 'ICO_controller/ICO_table_ongoing';
$route['ICO_table_done'] = 'ICO_controller/ICO_table_done';
$route['ICO_table_failed'] = 'ICO_controller/ICO_table_failed';
$route['ICO_notif'] = 'ICO_controller/ICO_notif';
$route['ICO_reports'] = 'ICO_controller/ICO_reports';

#Budget_controller
$route['Budget_table_pending'] = 'Budget_controller/Budget_table_pending';
$route['Budget_table_ongoing'] = 'Budget_controller/Budget_table_ongoing';
$route['Budget_table_done'] = 'Budget_controller/Budget_table_done';
$route['Budget_table_failed'] = 'Budget_controller/Budget_table_failed';
$route['Budget_notif'] = 'Budget_controller/Budget_notif';
$route['Budget_reports'] = 'Budget_controller/Budget_reports';

#Accounting_controller
$route['Accounting_table_pending'] = 'Accounting_controller/Accounting_table_pending';
$route['Accounting_table_ongoing'] = 'Accounting_controller/Accounting_table_ongoing';
$route['Accounting_table_done'] = 'Accounting_controller/Accounting_table_done';
$route['Accounting_table_failed'] = 'Accounting_controller/Accounting_table_failed';
$route['Accounting_notif'] = 'Accounting_controller/Accounting_notif';
$route['Accounting_reports'] = 'Accounting_controller/Accounting_reports';

#Cashier_controller
$route['Cashier_table_pending'] = 'Cashier_controller/Cashier_table_pending';
$route['Cashier_table_ongoing'] = 'Cashier_controller/Cashier_table_ongoing';
$route['Cashier_table_done'] = 'Cashier_controller/Cashier_table_done';
$route['Cashier_table_failed'] = 'Cashier_controller/Cashier_table_failed';
$route['Cashier_notif'] = 'Cashier_controller/Cashier_notif';
$route['Cashier_reports'] = 'Cashier_controller/Cashier_reports';

#Enduser_controller
$route['enduser_table_submittedpr'] = 'Enduser_controller/enduser_table_submittedpr';
$route['enduser_table_pending'] = 'Enduser_controller/enduser_table_pending';
$route['enduser_table_ongoing'] = 'Enduser_controller/enduser_table_ongoing';
$route['enduser_table_done'] = 'Enduser_controller/enduser_table_done';
$route['enduser_table_failed'] = 'Enduser_controller/enduser_table_failed';
$route['enduser_notif'] = 'Enduser_controller/enduser_notif';
$route['enduser_details'] = 'Enduser_controller/enduser_details';

$route['pr_form'] = 'Admin_controller/pr_form';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
