<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enduser_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('docutrackingmodel');
	}
	public function enduser(){
		if($this->session->userdata('user_type_ID')!='2')
			redirect();
		$data['euserpending'] = $this->docutrackingmodel->euser_pending($_SESSION['end_user_ID']);
		$data['euserongoing'] = $this->docutrackingmodel->euser_ongoing($_SESSION['end_user_ID']); 
		$data['pr_done'] = $this->docutrackingmodel->PRdone_eu($_SESSION['end_user_ID']); 
		$data['euserPR'] = $this->docutrackingmodel->countPR_eu($_SESSION['end_user_ID']);
		$data['prfail'] = $this->docutrackingmodel->PRfail_eu($_SESSION['end_user_ID']); 
		$this->load->view('enduser/eu_nav');
		$this->load->view('enduser/enduser',$data);
		$this->load->view('footer_home');
	}	
	public function enduser_table_submittedpr(){
		$data['eu_readPR'] = $this->docutrackingmodel->readPR($_SESSION['end_user_ID']);//pr submitted by end user		$data['title'] = "Pending";
		$data['title'] = "All Submitted";
		$this->load->view('enduser/eu_nav');
		$this->load->view('enduser/enduser_table',$data);
		$this->load->view('footer');
	}
	public function enduser_table_pending(){
		$data['eu_readPR'] = $this->docutrackingmodel->read_PRpending_eu($_SESSION['end_user_ID']);
		$data['title'] = "Pending";
		$this->load->view('enduser/eu_nav');
		$this->load->view('enduser/enduser_table',$data);
		$this->load->view('footer');
	}
	public function enduser_table_ongoing(){
		$data['eu_readPR'] = $this->docutrackingmodel->read_PRongoing_eu($_SESSION['end_user_ID']);
		$data['title'] = "Ongoing";
		$this->load->view('enduser/eu_nav');
		$this->load->view('enduser/enduser_table',$data);
		$this->load->view('footer');
	}
	public function enduser_table_done(){
		$data['eu_readPR'] = $this->docutrackingmodel->read_PRdone_eu($_SESSION['end_user_ID']); 
		$data['title'] = "Approved";	
		$this->load->view('enduser/eu_nav');
		$this->load->view('enduser/enduser_table',$data);
		$this->load->view('footer');
	}
	public function enduser_table_failed(){ 
		$data['eu_readPR'] = $this->docutrackingmodel->read_PRfailed_eu($_SESSION['end_user_ID']); 
		$data['title'] = "Failed";
		$this->load->view('enduser/eu_nav');
		$this->load->view('enduser/enduser_table',$data);
		$this->load->view('footer');
	}
	public function enduser_notif(){
		$this->load->view('enduser/eu_nav');
		$this->load->view('notif');
		$this->load->view('footer');
	}
	public function enduser_details($data){
		$det['return'] = $this->docutrackingmodel->checkIfReturned($data);	
		$det['prremarks'] = $this->docutrackingmodel->read_PRremarks($data);	
		$det['prdetails'] = $this->docutrackingmodel->read_PRdetails($data);	
		$det['prbidders'] = $this->docutrackingmodel->read_PRbidders($data);	
		$det['prattachements'] = $this->docutrackingmodel->read_PRattachments($data);
		$det['prresomode'] = $this->docutrackingmodel->read_PRresomode($data);
		$det['prresoaward'] = $this->docutrackingmodel->read_PRresoaward($data);
		$det['allbidders'] = $this->docutrackingmodel->read_allbidders();
		$det['test'] = $this->docutrackingmodel->readIfReturned($data);
		$this->load->view('enduser/eu_nav');
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
		$this->load->view('enduser/eu_details',$det);
		$this->load->view('footer');
	}
	
	# NOTIFICATION
	public function notification(){
		if(isset($_POST['view'])){
			$result = $this->docutrackingmodel->eu_readNotif($_SESSION['admin_office_ID']);
			$output = '';
			if($result > 0){
			 	foreach($result as $key){			 		
			 			$output .= '
				   		<li>
				   		<a href="#">
				   		<strong>'.$key->message_subject.'</strong><br />
				   		<small><em>'.$key->message_description.'</em></small>
				   		</a>
				   		</li>';			 				   		
			 	}				 		 
			}
			else{
			    $output .= '
			    <li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
			}
			$output .= '
		 			<li>
                        <a href="'.site_url("enduser_notif").'">
                            <b style="text-align: center">See All Notifications</b>
                        </a>
                    </li> ';
			if($_POST["view"] != ''){
				$this->docutrackingmodel->eu_update_notif($_SESSION['department_ID']);
			}
			$count = $this->docutrackingmodel->eu_checkNotif($_SESSION['department_ID']);
			$data = array(
			    'notification' => $output,
			    'unseen_notification'  => $count[0]->unseenNotif
			);
			echo json_encode($data);
		}
	}
	
}
?>
