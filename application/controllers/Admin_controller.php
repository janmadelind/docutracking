<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('docutrackingmodel');
		date_default_timezone_set('Asia/Kuala_Lumpur');
	}
	 
	public function home(){
		if($this->session->userdata('user_type_ID')=='2')
			redirect('enduser');

		else if('1' == $this->session->userdata('admin_office_ID')){ //BAC
			redirect('bac');
		}
		else if('2' == $this->session->userdata('admin_office_ID')){ //PROC
			redirect('procurement');
		}
		else if('3' == $this->session->userdata('admin_office_ID')){ // OP
			redirect('officeOfThePresident');			
		}
		else if('6' == $this->session->userdata('admin_office_ID')){ //BAC
			redirect('ico');
		}
		else if('7' == $this->session->userdata('admin_office_ID')){ //PROC
			redirect('budget');
		}
		else if('8' == $this->session->userdata('admin_office_ID')){ // OP
			redirect('accounting');			
		}
		else if('9' == $this->session->userdata('admin_office_ID')){ // OP
			redirect('cashier');			
		}
		$this->load->view('login');
	}	

	public function bac(){
		if('1' != $this->session->userdata('admin_office_ID')){ //BAC
			redirect();
		}
		$data['bacongoing'] = $this->docutrackingmodel->bac_ongoing(); 
		$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
		$data['prdone'] = $this->docutrackingmodel->PRdone(); 
		$data['prfail'] = $this->docutrackingmodel->PRfail(); 
		$data['prinfo']['proj_name'] = "";
		$data['prinfo']['proj_description'] = "";
		$data['prinfo']['PR_No'] = "";
		$data['prinfo']['date_submitted'] = "";
		$data['prinfo']['amount'] = "";
		$data['prinfo']['end_user_name'] = "";
		$data['prinfo']['college_name'] = "";
		$data['prinfo']['department_name'] = "";
		$data['prinfo']['result'] = "";
		$data['prinfo']['date_scanned'] = "";
		$this->load->view('bac/nav');
		$this->load->view('bac/bac', $data);
		$this->load->view('footer_home');

	}	
	public function bac_table_pending(){
		$data['readPR'] = $this->docutrackingmodel->read_bacpending(); 
		$data['title'] = "Pending";
		$this->load->view('bac/nav');
		$this->load->view('bac/admin_table',$data);
		$this->load->view('footer');
	}
	public function bac_table_ongoing(){
		$data['readPR'] = $this->docutrackingmodel->read_bacongoing(); 
		$data['title'] = "Ongoing";
		$this->load->view('bac/nav');
		$this->load->view('bac/admin_table',$data);
		$this->load->view('footer');
	}
	public function bac_table_done(){
		$data['readPR'] = $this->docutrackingmodel->read_PRdone(); 	
		$data['title'] = "Approved";
		$this->load->view('bac/nav');
		$this->load->view('bac/admin_table',$data);
		$this->load->view('footer');
	}
	public function bac_table_failed(){
		$data['readPR'] = $this->docutrackingmodel->readPR_failed(); 	
		$data['title'] = "Failed";
		$this->load->view('bac/nav');
		$this->load->view('bac/admin_table',$data);
		$this->load->view('footer');
	}
	public function bac_notif(){
		$data['read']= $this->docutrackingmodel->readALLNotifBAC($_SESSION['admin_office_ID']);
		$data['duedatereport']= $this->docutrackingmodel->dueDateReport($_SESSION['admin_office_ID']);
		
		// print_r($data['read']);
		// exit();
		$this->load->view('bac/nav');
		$this->load->view('bac/bac_notif',$data);
		$this->load->view('footer');
	}
	public function bac_reports(){
		$this->load->model('reportmodel');		
		$data['monthly'] = $this->reportmodel->monthly();	
		$data['monthly_report'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
		if($data['monthly'] != NULL){	
			foreach ($data['monthly'] as $key) {
				$data['monthly_report'][$key->m - 1] = $key->c;
			}
		}
		$data['quarterly'] = $this->reportmodel->quarterly();	
		$data['quarterly_report'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
		if($data['quarterly'] != NULL){	
			foreach ($data['quarterly'] as $key) {
				$data['quarterly_report'][$key->m - 1] = $key->c;
			}
		}
		$data['per_mode'] = $this->reportmodel->pr_per_mode();	
		$data['per_mode_report'] = array(0,0,0,0);
		if($data['per_mode'] != NULL){	
			foreach ($data['per_mode'] as $key) {
				$data['per_mode_report'][$key->mp - 1] = $key->c;
			}
		}
		$data['per_college'] = $this->reportmodel->pr_per_college();	
		$data['per_college_report'] = array(0,0,0,0,0,0,0);
		if($data['per_college'] != NULL){	
			foreach ($data['per_college'] as $key) {
				$data['per_college_report'][$key->college-1] = $key->c;
			}
		}
		$data['per_dept'] = $this->reportmodel->pr_per_dept();	
		$data['per_dept_report'] = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		if($data['per_dept'] != NULL){	
			foreach ($data['per_dept'] as $key) {
				$data['per_dept_report'][$key->d-1] = $key->c;
			}
		}


		$data['svp_month'] = $this->reportmodel->SVPmonthly();	
		$data['svp_month_report'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
		if($data['svp_month'] != NULL){
			foreach($data['svp_month'] as $key) {
				$data['svp_month_report'][$key->m-1] = $key->c;
			}
		}
		$data['s_month'] = $this->reportmodel->Smonthly();	
		$data['s_month_report'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
		if($data['s_month'] != NULL){
			foreach($data['s_month'] as $key) {
				$data['s_month_report'][$key->m-1] = $key->c;
			}
		}
		$data['np_month'] = $this->reportmodel->Smonthly();	
		$data['np_month_report'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
		if($data['np_month'] != NULL){
			foreach($data['np_month'] as $key) {
				$data['np_month_report'][$key->m-1] = $key->c;
			}
		}
		$data['dc_month'] = $this->reportmodel->Smonthly();	
		$data['dc_month_report'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
		if($data['dc_month']!=NULL){
			foreach($data['dc_month'] as $key) {
				$data['dc_month_report'][$key->m-1] = $key->c;
			}
		}


		$data['cos_month'] = $this->reportmodel->COS_monthly();	
		$data['cos_month_report'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
		if($data['cos_month'] != NULL){	
			foreach ($data['cos_month'] as $key) {
				$data['cos_month_report'][$key->m-1] = $key->c;
			}
		}
		$data['cla_month'] = $this->reportmodel->CLA_monthly();	
		$data['cla_month_report'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
		if($data['cla_month'] != NULL){	
			foreach ($data['cla_month'] as $key) {
				$data['cla_month_report'][$key->m-1] = $key->c;
			}
		}
		$data['cie_month'] = $this->reportmodel->CIE_monthly();	
		$data['cie_month_report'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
		if($data['cie_month'] != NULL){	
			foreach ($data['cie_month'] as $key) {
				$data['cie_month_report'][$key->m-1] = $key->c;
			}
		}
		$data['cit_month'] = $this->reportmodel->CIT_monthly();	
		$data['cit_month_report'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
		if($data['cit_month'] != NULL){	
			foreach ($data['cit_month'] as $key) {
				$data['cit_month_report'][$key->m-1] = $key->c;
			}
		}
		$data['coe_month'] = $this->reportmodel->COE_monthly();	
		$data['coe_month_report'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
		if($data['coe_month'] != NULL){	
			foreach ($data['coe_month'] as $key) {
				$data['coe_month_report'][$key->m-1] = $key->c;
			}
		}
		$data['cafa_month'] = $this->reportmodel->CAFA_monthly();	
		$data['cafa_month_report'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
		if($data['cafa_month'] != NULL){	
			foreach ($data['cafa_month'] as $key) {
				$data['cafa_month_report'][$key->m-1] = $key->c;
			}
		}
		$this->load->view('bac/nav');
		$this->load->view('bac/reports',$data);
		$this->load->view('footer');
	}
	public function bac_details($data){		
		$det['return1'] = $this->docutrackingmodel->checkIfReturned1($data);	
		$det['return'] = $this->docutrackingmodel->checkIfReturned($data);	
		$det['prremarks'] = $this->docutrackingmodel->read_PRremarks($data);	
		$det['prdetails'] = $this->docutrackingmodel->read_PRdetails($data);	
		$det['prbidders'] = $this->docutrackingmodel->read_PRbidders($data);	
		$det['prattachements'] = $this->docutrackingmodel->read_PRattachments($data);
		$det['prresomode'] = $this->docutrackingmodel->read_PRresomode($data);
		$det['prresoaward'] = $this->docutrackingmodel->read_PRresoaward($data);
		$det['allbidders'] = $this->docutrackingmodel->read_allbidders();
		$det['days'] = $this->docutrackingmodel->getDays($data,$this->docutrackingmodel->checkSequence($data));		
		$det['test'] = $this->docutrackingmodel->readIfReturned($data);
		$office1 = $this->docutrackingmodel->checkHistoSequence($data);
		$office2= $this->docutrackingmodel->checkHistoSequence2($data);
		if($office1 == NULL OR $office2 == NULL){
			$office1 = 1;
			$office2 = 1;
			$det['all'] = $this->docutrackingmodel->histogram($data);
			for($x=0;$x < count($det['all'])-1 ;$x++){
				$det['new'][$x]['days']=date_diff(date_create($det['all'][$x+1]->date_scanned),date_create($det['all'][$x]->date_scanned)); 
				$det['new'][$x]['office']= $det['all'][$x]->admin_office_name."<br>";
				$det['new'][$x]['daystart']= $det['all'][$x+1]->date_scanned;
				$det['new'][$x]['dayend']= $det['all'][$x]->date_scanned;
			}	
		}
		else{
			$date1 = $this->docutrackingmodel->getHistoDate($office1,$data);
			$date2 = $this->docutrackingmodel->getHistoDate($office2,$data);
			$det['all'] = $this->docutrackingmodel->histogram($data);
			for($x=0;$x < count($det['all'])-1 ;$x++){
				$det['new'][$x]['days']=date_diff(date_create($det['all'][$x+1]->date_scanned),date_create($det['all'][$x]->date_scanned)); 
				$det['new'][$x]['office']= $det['all'][$x]->admin_office_name."<br>";
				$det['new'][$x]['daystart']= $det['all'][$x+1]->date_scanned;
				$det['new'][$x]['dayend']= $det['all'][$x]->date_scanned;
			}	
		}
					
		$det['start'] = $this->docutrackingmodel->getDateStart($data);
		$det['end'] = $this->docutrackingmodel->getDateEnd($data);
		// print_r($det['new']);
		// exit();		
		$this->load->view('bac/nav');
		if($det['return'] != NULL){
			$det['prcurloc'] = $this->docutrackingmodel->checkIfReturned($data);
			$return = $this->docutrackingmodel->checkIfReturned_ID($data);
			if($det['prdetails'][0]->type_ID == 1){
				if($return == 1 ){
					$this->load->view('type1/PR_Route');
				}
				else if($return == 4 ){
					$this->load->view('type1/PR_Route1');
				}
				else if($return == 3){
					$this->load->view('type1/PR_Route_OP1');
				}
				else if($return == 6){
					$this->load->view('type1/PR_Route_ICO1');
				}
				else if($return == 7){
					$this->load->view('type1/PR_Route_BUDGET1');
				}
				else if($return == 8){
					$this->load->view('type1/PR_Route_ACC1');
				}
				else if($return == 9){
					$this->load->view('type1/PR_Route_CASH1');
				}
				else if($det['prdetails'][0]->mode_ID == NULL){
					$this->load->view('type1/PR_Route_EMP1');
				}	
			}
			else{
				if($return == 1 ){
					$this->load->view('type/PR_Route');
				}
				else if($return == 2 ){
					$this->load->view('type/PR_RoutePROC');
				}
				else if($return == 5 ){
					$this->load->view('type/PR_RoutePROC1');
				}
				else if($return == 4 ){
					$this->load->view('type/PR_Route1');
				}
				else if($return == 3){
					$this->load->view('type/PR_RouteOP');
				}
				else if($return == 6){
					$this->load->view('type/PR_RouteICO');
				}
				else if($return == 7){
					$this->load->view('type/PR_RouteBUDGET');
				}
				else if($return == 8){
					$this->load->view('type/PR_RouteACC');
				}
				else if($return == 9){
					$this->load->view('type/PR_RouteCASH');
				}
				else if($det['prdetails'][0]->mode_ID == NULL){
					$this->load->view('type/PR_Route_EMP1');
				}	
			}				
		}
		else{
			$curloc = $this->docutrackingmodel->checkSequence($data);	
			$det['prcurloc'] = $this->docutrackingmodel->getLoc($curloc);	
			if($det['prdetails'][0]->type_ID == 1){
				if($curloc == 1 ){
					$this->load->view('type1/PR_Route');
				}
				else if($curloc == 4 ){
					$this->load->view('type1/PR_Route1');
				}
				else if($curloc == 3){
					$this->load->view('type1/PR_Route_OP1');
				}
				else if($curloc == 6){
					$this->load->view('type1/PR_Route_ICO1');
				}
				else if($curloc == 7){
					$this->load->view('type1/PR_Route_BUDGET1');
				}
				else if($curloc == 8){
					$this->load->view('type1/PR_Route_ACC1');
				}
				else if($curloc == 9){
					$this->load->view('type1/PR_Route_CASH1');
				}
				else if($det['prdetails'][0]->mode_ID == NULL){
					$this->load->view('type1/PR_Route_EMP1');
				}	
			}
			else{
				if($curloc == 1 ){
					$this->load->view('type/PR_Route');
				}
				else if($curloc == 2 ){
					$this->load->view('type/PR_RoutePROC');
				}
				else if($curloc == 5 ){
					$this->load->view('type/PR_RoutePROC1');
				}
				else if($curloc == 4 ){
					$this->load->view('type/PR_Route1');
				}
				else if($curloc == 3){
					$this->load->view('type/PR_RouteOP');
				}
				else if($curloc == 6){
					$this->load->view('type/PR_RouteICO');
				}
				else if($curloc == 7){
					$this->load->view('type/PR_RouteBUDGET');
				}
				else if($curloc == 8){
					$this->load->view('type/PR_RouteACC');
				}
				else if($curloc == 9){
					$this->load->view('type/PR_RouteCASH');
				}
				else if($det['prdetails'][0]->mode_ID == NULL){
					$this->load->view('type/PR_Route_EMP1');
				}	
			}				
		}
		$this->load->view('bac/bac_details',$det);
		$this->load->view('footer');
	}
	#ADD PR mode type in BAC
	public function bac_addPR_duration($data){
		$bac =$this->input->post('bac');
		$proc =$this->input->post('proc');
		$ico =$this->input->post('ico');
		$op =$this->input->post('op');
		$bdgt =$this->input->post('bdgt');
		$cashier =$this->input->post('cashier');
		$acctg =$this->input->post('acctg');
		$add_status = $this->docutrackingmodel->addPR_duration($data,$bac,$proc,$ico,$op,$bdgt,$cashier,$acctg);
		if($add_status){			
			// update the days for the bac
			$this->docutrackingmodel->update_BAC_dateEnd($data,$bac);
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->bac_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->bac_details($data);
		}
	}
	#ADD PR mode type in BAC
	public function bac_addPR_duration1($data){
		$bac =$this->input->post('bac');
		$ico =$this->input->post('ico');
		$op =$this->input->post('op');
		$bdgt =$this->input->post('bdgt');
		$cashier =$this->input->post('cashier');
		$acctg =$this->input->post('acctg');
		$add_status = $this->docutrackingmodel->addPR_duration1($data,$bac,$ico,$op,$bdgt,$cashier,$acctg);
		if($add_status){			
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->bac_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->bac_details($data);
		}
	}
	#ADD PR mode type in BAC
	public function bac_addPR_status($data){
		$status =$this->input->post('status');
		$add_status = $this->docutrackingmodel->addPR_status($status,$data);
		$remarks = "Change status to ".$status;
		if($add_status){
			$this->docutrackingmodel->add_PRremarks($data,$remarks,date('Y-m-d H:i:s T', time()),$_SESSION['admin_user_ID']);			
			$subj = "Status Change";
			$deptID =  $this->docutrackingmodel->getDEPT($data);
			$this->docutrackingmodel->euser_addNotif($data,$subj,$deptID,date('Y-m-d H:i:s T', time()));
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			redirect('bac', 'refresh');
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			redirect('bac', 'refresh');
		}
	}

	#ADD PR mode type in BAC
	public function bac_addPR_modetype($data){
		$mode =$this->input->post('mode')[0];
		$type=$this->input->post('type')[0];
		if($this->docutrackingmodel->checkPR_route($data) != NULL){	//check if prno is in route_per_scanned table
			$this->docutrackingmodel->addPR_modetype($mode,$type,$data);
			$del = $this->docutrackingmodel->deletePR_route1($data);	//if yes, delete the row then add new route detail
			if($del != NULL){
				$mode_result = $this->docutrackingmodel->addPR_seq($mode,$type,$data);
				$this->docutrackingmodel->deletePR_route($data);
				$mt = $this->docutrackingmodel->getModetype($data);
				$remarks = "added mode of PR# ".$data." to ".$mt[0]->mode_of_procurement." - ".$mt[0]->type_name;
				$this->docutrackingmodel->add_PRremarks($data,$remarks,date('Y-m-d H:i:s T', time()),$_SESSION['admin_user_ID']);	
				if($mode_result){
					echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
					$this->bac_details($data);
				}
				else{
					echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
					$this->bac_details($data);
				}
			}
			else{
				echo "<script type='text/javascript'>alert('Not Deleted!').delay(500); </script>";
				$this->bac_details($data);
			}

		}
		else{
			echo "<script type='text/javascript'>alert('Route is NULL!').delay(500); </script>";
			$this->bac_details($data);
		}
	}
	#UPDATE PR mode type in BAC
	public function bac_updatePR_modetype($data){
		$mode =$this->input->post('mode')[0];
		$type=$this->input->post('type')[0];
		if($this->docutrackingmodel->checkPR_route($data) != NULL){	//check if prno is in route_per_scanned table
			$this->docutrackingmodel->addPR_modetype($mode,$type,$data);
			$del = $this->docutrackingmodel->deletePR_oldroute($data);	//if yes, delete the row then add new route detail
			if($del != NULL){
				$mode_result = $this->docutrackingmodel->addPR_seq($mode,$type,$data);
				$this->docutrackingmodel->deletePR_route($data); //deletes the route #1 w/c is BAC tha has NS status
				$mt = $this->docutrackingmodel->getModetype($data);
				$remarks = "updates PR# ".$data." mode to ".$mt[0]->mode_of_procurement." - ".$mt[0]->type_name;
				$this->docutrackingmodel->delALL($data);	
				$this->docutrackingmodel->add_PRremarks($data,$remarks,date('Y-m-d H:i:s T', time()),$_SESSION['admin_user_ID']);	
				if($mode_result){
					echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
					$this->bac_details($data);
				}
				else{
					echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
					$this->bac_details($data);
				}
			}
			else{
				echo "<script type='text/javascript'>alert('Not Deleted!').delay(500); </script>";
				$this->bac_details($data);
			}

		}
		else{
			echo "<script type='text/javascript'>alert('Route is NULL!').delay(500); </script>";
			$this->bac_details($data);
		}
	}
	#ADD Reso of Mode of PR
	public function bac_addPR_resomode($data){
		$resomode = $this->input->post('resomode');
		$date_added = date('Y-m-d H:i:s T', time());
		$type = "Mode";		
		$result=$this->docutrackingmodel->addPR_resomode($data,$resomode,$date_added,$type);
		$resomodefile = $resomode." file";
		$resoattachment_result=$this->docutrackingmodel->add_PRattachments($data,$resomodefile,$date_added,$_SESSION['admin_office_ID'],$_SESSION['admin_user_ID']);//add reso to attachments	
		if($result){			
			$remarks = "added ".$resomode;
			$this->docutrackingmodel->add_PRremarks($data,$remarks,date('Y-m-d H:i:s T', time()),$_SESSION['admin_user_ID']);
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->bac_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!!').delay(500); </script>";
		}
	}

	#ADD Reso of Awards of PR
	public function bac_addPR_resoawards($data){
		$resoaward = $this->input->post('resoaward');
		$date_added = date('Y-m-d H:i:s T', time());	
		$type = "Award";	
		$result=$this->docutrackingmodel->addPR_resoaward($data,$resoaward,$date_added,$type);
		$resoawardfile = $resoaward." file";
		$resoawardfile=$this->docutrackingmodel->add_PRattachments($data,$resoawardfile,$date_added,$_SESSION['admin_office_ID'],$_SESSION['admin_user_ID']);//add reso to attachments	
		if($result){
			$remarks = "added ".$resoaward;
			$this->docutrackingmodel->add_PRremarks($data,$remarks,date('Y-m-d H:i:s T', time()),$_SESSION['admin_user_ID']);
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->bac_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!!').delay(500); </script>";
		}
	}
	#ADD update amount of Bidders
	public function bac_updatePR_bidderamount($bidderID, $data){
		$amount = $this->input->post('amount');		
		$date_added = date('Y-m-d H:i:s T', time());
		$result=$this->docutrackingmodel->updatePR_bidderamount($data,$bidderID,$amount);
		if($result){
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->bac_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!!').delay(500); </script>";
		}
	}

	#UPDATE amount of Bidders
	public function bac_updatePR_bidderstatus($bidderID, $data){
		$status =$this->input->post('status')[0];
		$date_added = date('Y-m-d H:i:s T', time());
		$result=$this->docutrackingmodel->updatePR_bidderstatus($data,$bidderID,$status);
		if($result){
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			if($status != 'Approved'){
				echo "<script type='text/javascript'>alert('Successfully Updated!!').delay(500); </script>";
				$this->procurement_details($data);
			}
			else{
				$this->docutrackingmodel->updatePRdoc_bidderstatus($data,$bidderID);
				echo "<script type='text/javascript'>alert('Successfully Updated!!.').delay(500); </script>";
				$this->procurement_details($data);
			}
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!!').delay(500); </script>";
		}
	}
	#ADD old PR bidders for PR
	public function bac_addPR_oldbidders($data){
		$bidder =$this->input->post('bidder');
		$amount = $this->input->post('amount');	
		$date_added = date('Y-m-d H:i:s T', time());
		$checkduplicate = $this->docutrackingmodel->checkPR_oldbidders_transac($bidder,$data); 	
		if($checkduplicate == NULL){
			$bidderstrans_result = $this->docutrackingmodel->addPR_oldbidderstrans($data,$bidder,$amount,$date_added);
			if($bidderstrans_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->bac_details($data);
			}
			else{
				echo "<script type='text/javascript'>alert('Successfully Updated! !').delay(500); </script>";
				$this->bac_details($data);
			}
		}
		else{
			echo "<script type='text/javascript'>alert('Bidder has duplicate for this PR!').delay(500); </script>";
			$this->bac_details($data);
		}	
	}

	#ADD new PR bidders for PR
	public function bac_addPR_newbidders($data){
		$bidders = $this->input->post('bidders');
		$contact = $this->input->post('contact');
		$email = $this->input->post('email');
		$amount = $this->input->post('amount');
		$date_added = date('Y-m-d H:i:s T', time());
		$checkduplicate = $this->docutrackingmodel->checkPR_newbidders_transac($bidders,$data); 								//check duplicate in bidder transaction
		if($checkduplicate == NULL){																							//if no duplicate bidder for this PR,
			$checkdupli = $this->docutrackingmodel->checkPR_newbidders($bidders,$data); 										//check duplicate bidder in bidders info
			if($checkdupli == NULL){																							// if no duplicate in bidder table,
				$bidders_result = $this->docutrackingmodel->addPR_newbidders($data,$bidders,$contact,$email); 					// add new bidder in bidder table
				$bidderID = $this->db->insert_id();
				$bidderstrans_result = $this->docutrackingmodel->addPR_newbidderstrans($data,$bidderID,$amount,$date_added);	// add new bidder transaction 
				if($bidderstrans_result){
					echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
					$this->bac_details($data);
				}
				else{
					echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
					$this->bac_details($data);

				}
			}
			else{
				$bidderID = $this->docutrackingmodel->getPR_newbidders_ID($bidders);
				$bidderstrans_result = $this->docutrackingmodel->addPR_newbidderstrans($data,$bidderID,$amount,$date_added);	// add new bidder transaction 
				if($bidderstrans_result){
					echo "<script type='text/javascript'>alert('bidder has duplicate in bidder table but non in bidder transaction.Successfully Updated!').delay(500); </script>";
					$this->bac_details($data);
				}
				else{
					echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
					$this->bac_details($data);

				}				

			}
			
		}
		else{
			echo "<script type='text/javascript'>alert('Bidder has duplicate for this PR!').delay(500); </script>";
			$this->bac_details($data);
		}
	}
	
	#ADD PR attachments in BAC
	public function bac_addPR_attachments($data){
		$attachedfile = $this->input->post('attachedfile');
		$date_added = date('Y-m-d H:i:s T', time());
		$attachments_result=$this->docutrackingmodel->add_PRattachments($data,$attachedfile,$date_added,$_SESSION['admin_office_ID'],$_SESSION['admin_user_ID']);
		if($attachments_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->bac_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->bac_details($data);

		}

	}

	#ADD PR remarks in BAC
	public function bac_addPR_remarks($data){
		$remarks = $this->input->post('remarks');
		$date_added = date('Y-m-d H:i:s T', time());

		$remarks_result=$this->docutrackingmodel->add_PRremarks($data,$remarks,$date_added,$_SESSION['admin_user_ID']);
		if($remarks_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->bac_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->bac_details($data);
		}
	}
	#ADD PR remarks in BAC
	public function bac_addPR_remarks1($data){
		$remarks = $this->input->post('remarks');
		$date_added = date('Y-m-d H:i:s T', time());

		$remarks_result=$this->docutrackingmodel->add_PRremarks($data,"(Due Date Notification) ".$remarks,$date_added,$_SESSION['admin_user_ID']);
		if($remarks_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->bac_notif();
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->bac_notif();

		}

	}
	#ADD to return
	public function bac_PR_return($data){
		$remarks = $this->input->post('remarks');
        $destination = $this->input->post('destination'); // alamin kung admin office or euser office
        print_r($destination);
        exit();
        if($destination != 1){
            $date_added = date('Y-m-d H:i:s T', time());
            if($remarks == NULL){
                $this->docutrackingmodel->updatePR_location1($data,$destination,date('Y-m-d H:i:s T', time()));
                echo "<script type='text/javascript'>alert('Trial Updated!').delay(500); </script>";
                $this->bac_details($data);
            }
            else{ // if with remarks
                $this->docutrackingmodel->updatePR_location1($data,$destination,date('Y-m-d H:i:s T', time()));
                // $this->docutrackingmodel->updatePR_returnScan($data,$destination);
                $this->docutrackingmodel->add_PRremarks($data,"Returned: ".$remarks,date('Y-m-d H:i:s T', time()),$_SESSION['admin_user_ID']);
                $this->docutrackingmodel->addPR_status("to be returned",$data);             
                echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
                $this->bac_details($data);
            }   
        }
        else{
            $date_added = date('Y-m-d H:i:s T', time());
            if($remarks == NULL ){
                $this->docutrackingmodel->updatePR_location($data,$destination);
                echo "<script type='text/javascript'>alert('Trial Updated!').delay(500); </script>";
                $this->bac_details($data);
            }
            else{ // if with remarks
                $this->docutrackingmodel->updatePR_location($data,$destination);
                // $this->docutrackingmodel->updatePR_returnScan($data,$destination);
                $this->docutrackingmodel->add_PRremarks($data,"Returned ".$remarks,date('Y-m-d H:i:s T', time()),$_SESSION['admin_user_ID']);
                $this->docutrackingmodel->addPR_status("to be returned",$data);
                echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
                $this->bac_details($data);

            }
        }
	}

###################################################################################
###################################################################################
###################################################################################
###################################################################################
	#MAKE QR for PR
	public function pr_form(){
		$newQR = $this->docutrackingmodel->newQR();
		
		// generate QR
		$data['img_url']="";
		$data['prdetails'] ="";
		$this->load->library('ciqrcode');
		$qr_image=rand().'.png';
		$params['data'] = $newQR;
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] =FCPATH."uploads/qr_image/".$qr_image;
		if($this->ciqrcode->generate($params))
		{
			$data['img_url']=$qr_image;	
		}
		$this->load->view('enduser/eu_nav');
		$this->load->view('enduser/pr_form',$data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('Admin_controller/home');
	}
	
	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$verify = $this->docutrackingmodel->login($username,$password);
		if(isset($verify)){
			$userdata = array( 
				'user_ID' => $verify[0]->user_ID,
				'user_type_ID' => $verify[0]->user_type_ID,
				'username' => $verify[0]->username
			);
			$this->session->set_userdata($userdata);
			if('1' == $verify[0]->user_type_ID ){ 
				$verify = $this->docutrackingmodel->adlogin($username,$password);
				if(isset($verify)){
					$userdata = array( 
						'user_ID' => $verify[0]->user_ID,
						'username' => $verify[0]->username,
						'admin_office_ID' => $verify[0]->admin_office_ID,
						'admin_office_name' => $verify[0]->admin_office_name,
						'admin_user_ID' => $verify[0]->admin_user_ID,
						'admin_user_name' => $verify[0]->admin_user_name, 
						'user_type_ID'=>$verify[0]->user_type_ID
					);
				}
				$this->session->set_userdata($userdata);
				if('1' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID ){ //BAC
					echo "<script type='text/javascript'>window.location.href = 'http://localhost/docutracking/bac'; </script>";					
				}
				else if('2' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID){ //PROC
					echo "<script type='text/javascript'>window.location.href = 'http://localhost/docutracking/procurement'; </script>";
				}
				else if('3' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID){ // OP
					echo "<script type='text/javascript'>window.location.href = 'http://localhost/docutracking/officeOfThePresident'; </script>";
				}
				else if('6' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID){ //PROC
					echo "<script type='text/javascript'>window.location.href = 'http://localhost/docutracking/ico'; </script>";
				}
				else if('7' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID){ // OP
					echo "<script type='text/javascript'>window.location.href = 'http://localhost/docutracking/budget'; </script>";
				}
				else if('8' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID){ //PROC
					echo "<script type='text/javascript'>window.location.href = 'http://localhost/docutracking/accounting'; </script>";
				}
				else if('9' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID){ // OP
					echo "<script type='text/javascript'>window.location.href = 'http://localhost/docutracking/cashier'; </script>";
				}
				
			}
			if('2' == $verify[0]->user_type_ID ){
				$verify = $this->docutrackingmodel->eulogin($username,$password);
				if(isset($verify)){
					$userdata = array( 
						'user_ID' => $verify[0]->user_ID,
						'user_type_ID' => $verify[0]->user_type_ID,
						'username' => $verify[0]->username,
						'end_user_ID' =>$verify[0]->end_user_ID,
						'end_user_name' =>$verify[0]->end_user_name,
						'college_ID' => $verify[0]->college_ID,
						'department_ID' => $verify[0]->department_ID,
						'college_name' => $verify[0]->college_name,
						'department_name' => $verify[0]->department_name
					);
				}
					$this->session->set_userdata($userdata);
					echo "<script type='text/javascript'>window.location.href = 'http://localhost/docutracking/enduser';</script>";
			}
		}
		else{
			echo "<script type='text/javascript'>alert('Username and Password Mismatch!'); window.location.href = 'http://localhost/docutracking';</script>";
		}
	}	

	#ADD PR in Enduser dashboard
	public function addPR(){
		$totalamt = $this->input->post('total');
		$projdesc = $this->input->post('projdesc');
		$newQR = $this->docutrackingmodel->newQR();
		$date_added = date('Y-m-d H:i:s T', time());
		$this->docutrackingmodel->addPR_route1($newQR); //add first routee (BAC) to route per scanned
		$this->docutrackingmodel->addPR_route2($newQR); //add first routee (BAC) to route per scanned
		$this->docutrackingmodel->addPR_details($newQR,$totalamt,$projdesc, $_SESSION['end_user_ID'],$date_added); //add details to document table
		echo "<script type='text/javascript'>alert('Successfully Added!').delay(500); </script>";
		redirect('pr_form', 'refresh');

	}

	#READ PR details of scanned PR
	public function bac_scanPR(){
		$data['prinfo'] = $this->docutrackingmodel->scanned_PRdetails($this->input->post('scanPR'));
		if($data['prinfo']['result']== 0){
			echo "<script type='text/javascript'>alert('No Data Found!').delay(500);</script>";
			// redirect('bac', 'refresh');
			$this->bac();
		}
		else{
			$sequence = $this->docutrackingmodel->checkSequence($this->input->post('scanPR'));
			if($this->docutrackingmodel->readIfReturned1($this->input->post('scanPR')) != NULL){
				$this->docutrackingmodel->updateReturned1($this->input->post('scanPR'));
				$this->docutrackingmodel->addPR_status("pending",$this->input->post('scanPR'));	
				$data['bacongoing'] = $this->docutrackingmodel->bac_ongoing(); 
				$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
				$data['prdone'] = $this->docutrackingmodel->PRdone(); 
				$data['prfail'] = $this->docutrackingmodel->PRfail(); 
				echo "<script type='text/javascript'>alert('Scanned Successfully at BAC Office!!').delay(500); </script>";				
				$this->load->view('bac/nav');
				$this->load->view('bac/bac',$data);
				$this->load->view('footer_home');		
			}	
			else if($this->docutrackingmodel->readIfReturned($this->input->post('scanPR')) != NULL){
				$this->docutrackingmodel->updateReturned($this->input->post('scanPR'));
				$this->docutrackingmodel->addPR_status("pending",$this->input->post('scanPR'));	
				$data['bacongoing'] = $this->docutrackingmodel->bac_ongoing(); 
				$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
				$data['prdone'] = $this->docutrackingmodel->PRdone(); 
				$data['prfail'] = $this->docutrackingmodel->PRfail(); 
				echo "<script type='text/javascript'>alert('Scanned Successfully at BAC Office!!').delay(500); </script>";				
				$this->load->view('bac/nav');
				$this->load->view('bac/bac',$data);
				$this->load->view('footer_home');		
			}			
			else if((($sequence+1) == $_SESSION["admin_office_ID"])){
				$days = 7;
				// $this->docutrackingmodel->getDays($this->input->post('scanPR'),$_SESSION["admin_office_ID"]);								 
				$this->docutrackingmodel->update_scannedPR($this->input->post('scanPR'),$_SESSION["admin_user_ID"],$_SESSION["admin_office_ID"],$days);				
				$data['bacongoing'] = $this->docutrackingmodel->bac_ongoing(); 
				$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
				$data['prdone'] = $this->docutrackingmodel->PRdone(); 
				$data['prfail'] = $this->docutrackingmodel->PRfail(); 
				echo "<script type='text/javascript'>alert('Scanned Successfully at BAC Office!!').delay(500); </script>";				
				$this->load->view('bac/nav');
				$this->load->view('bac/bac_qr',$data);
				$this->load->view('footer_home');
			}	
			else if((($sequence+1) == $_SESSION["admin_office_ID"]) OR (($sequence+2) == 4) OR (($sequence+1) == 4)){
				$days =$this->docutrackingmodel->getDays($this->input->post('scanPR'),$_SESSION["admin_office_ID"]);								 
				$this->docutrackingmodel->update_scannedPR($this->input->post('scanPR'),$_SESSION["admin_user_ID"],$_SESSION["admin_office_ID"],$days);				
				$data['bacongoing'] = $this->docutrackingmodel->bac_ongoing(); 
				$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
				$data['prdone'] = $this->docutrackingmodel->PRdone(); 
				$data['prfail'] = $this->docutrackingmodel->PRfail(); 
				echo "<script type='text/javascript'>alert('Scanned Successfully at BAC Office!!').delay(500); </script>";				
				$this->load->view('bac/nav');
				$this->load->view('bac/bac_qr',$data);
				$this->load->view('footer_home');
			}			
			else{
				if($sequence == NULL){
					// add here notificaion for bac
					$wrongSeq = 'Wrong Sequence';
					
					$result = $this->docutrackingmodel->addNotif($this->input->post('scanPR'),$wrongSeq,$_SESSION["admin_office_name"],$_SESSION["admin_office_ID"],date('Y-m-d H:i:s T', time()));
					if($result){
						echo "<script type='text/javascript'>alert('Wrong Sequence! Return to BAC Office!!').delay(500);</script>";
						redirect('bac', 'refresh');
					}
					else{
						echo "<script type='text/javascript'>alert('ERROR!!').delay(500); </script>";		
						redirect('bac', 'refresh');
					}
				}
				else{
					$wrongSeq = 'Wrong Sequence';
					$result = $this->docutrackingmodel->addNotif($this->input->post('scanPR'),$wrongSeq,$_SESSION["admin_office_name"],$_SESSION["admin_office_ID"],date('Y-m-d H:i:s T', time()));
					echo "<script type='text/javascript'>alert('Wrong Sequence! Return to correct office!!').delay(500); </script>";
					redirect('bac', 'refresh');
				}
			}
			
		}
	}

	public function notification(){
		if(isset($_POST['view'])){
			if($this->docutrackingmodel->readALLNotif($_SESSION['admin_office_ID'])==NULL){
				$duePR = $this->docutrackingmodel->getDuePR($_SESSION['admin_office_ID']);
				$this->docutrackingmodel->updateDuePR();		
				$subj = 'Due Date';
				if($duePR != NULL){ //kung merong nahanap na expiry date >= current date
					foreach ($duePR as $key) {
						$this->docutrackingmodel->addNotif($key->PR_No,$subj,$_SESSION["admin_office_name"],$_SESSION['admin_office_ID'],date('Y-m-d H:i:s T', time()));
					}				
				}		
			}
			else{
				$duePR = $this->docutrackingmodel->getDuePR1($_SESSION['admin_office_ID']);
				$this->docutrackingmodel->updateDuePR();	
				$subj = 'Due Date';
				if($duePR != NULL){ //kung merong nahanap na expiry date >= current date
					foreach ($duePR as $key) {
						$this->docutrackingmodel->addNotif1($key->PR_No,$subj,$_SESSION["admin_office_name"],$_SESSION['admin_office_ID'],date('Y-m-d H:i:s T', time()));
					}				
				}
			}
			$result = $this->docutrackingmodel->readAllNotif($_SESSION['admin_office_ID']);
			$output = '';
			if($result > 0){
			 	foreach($result as $key){
			 		if($key->message_subject == "Due Date"){
			 			$output .= '
				   		<li>
				   		<a href=""'.site_url("bac_notif").'"">
				   		<strong>'.$key->message_subject.'</strong><br/>
				   		<small><em>'.$key->message_description.'</em></small><br/>
				   		<small><em>Add remarks why PR is late</em></small><br/>				   		
				   		</a>
				   		</li>
				   		';
			 		// <small><input type="text" class="form-control" name=""  ></small>
			 		}
			 		else{
			 			$output .= '
				   		<li>
				   		<a href=""'.site_url("bac_notif").'"">
				   		<strong>'.$key->message_subject.'</strong><br />
				   		<small><em>'.$key->message_description.'</em></small>
				   		</a>
				   		</li>';
			 		}			   		
			 	}				 		 
			}
			else{
			    $output .= '
			    <li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
			}
			$output .= '
		 			<li>
                        <a href="'.site_url("bac_notif").'">
                            <b style="text-align: center">See All Notifications</b>
                        </a>
                    </li> ';
			if($_POST["view"] != ''){
				$this->docutrackingmodel->update_notif();
			}
			$count = $this->docutrackingmodel->checkNotif($_SESSION['admin_office_ID']);
			$data = array(
			    'notification' => $output,
			    'unseen_notification'  => $count[0]->unseenNotif
			);
			echo json_encode($data);
		}
	}
}
?>
