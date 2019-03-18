<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashier_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('docutrackingmodel');
	}
	
	public function cashier(){
		if('9' != $this->session->userdata('admin_office_ID')){ //BAC
			redirect();
		}
		$data['cashierongoing'] = $this->docutrackingmodel->cashier_ongoing(); 
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
		$this->load->view('cashier/cashier_nav');
		$this->load->view('cashier/cashier',$data);
		$this->load->view('footer_home');
	}		
	public function cashier_table_pending(){
		$data['readPR'] = $this->docutrackingmodel->read_cashierpending(); 
		$data['title'] = "Pending";	
		$this->load->view('cashier/cashier_nav');
		$this->load->view('cashier/cashier_admin_table',$data);
		$this->load->view('footer');
	}
	public function cashier_table_ongoing(){
		$data['readPR'] = $this->docutrackingmodel->read_cashierongoing(); 	
		$data['title'] = "Ongoing";		
		$this->load->view('cashier/cashier_nav');
		$this->load->view('cashier/cashier_admin_table',$data);
		$this->load->view('footer');
	}
	public function cashier_table_done(){
		$data['readPR'] = $this->docutrackingmodel->read_PRdone(); 	//whole cashieress
		$data['title'] = "Approved";
		$this->load->view('cashier/cashier_nav');
		$this->load->view('cashier/cashier_admin_table',$data);
		$this->load->view('footer');
	}
	public function cashier_table_failed(){
		$data['readPR'] = $this->docutrackingmodel->readPR_failed(); 	
		$data['title'] = "Failed";
		$this->load->view('cashier/cashier_nav');
		$this->load->view('cashier/cashier_admin_table',$data);
		$this->load->view('footer');
	}
	public function cashier_notif(){
		$data['read']= $this->docutrackingmodel->readALLNotif($_SESSION['admin_office_ID']);				
		$this->load->view('cashier/cashier_nav');
		$this->load->view('cashier/cashier_notif',$data);
		$this->load->view('footer');
	}
	
	public function cashier_details($data){
		$det['return1'] = $this->docutrackingmodel->checkIfReturned1($data);	
		$det['return'] = $this->docutrackingmodel->checkIfReturned($data);	
		$det['prremarks'] = $this->docutrackingmodel->read_PRremarks($data);	
		$det['prdetails'] = $this->docutrackingmodel->read_PRdetails($data);	
		$det['prbidders'] = $this->docutrackingmodel->read_PRbidders($data);	
		$det['prattachements'] = $this->docutrackingmodel->read_PRattachments($data);
		$det['prresomode'] = $this->docutrackingmodel->read_PRresomode($data);
		$det['prresoaward'] = $this->docutrackingmodel->read_PRresoaward($data);
		$det['allbidders'] = $this->docutrackingmodel->read_allbidders();
		$det['test'] = $this->docutrackingmodel->readIfReturned($data);
		$this->load->view('cashier/cashier_nav');
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
		$this->load->view('cashier/cashier_details',$det);
		$this->load->view('footer');
	}
	#ADD PR attachments in cashier
	public function cashier_addPR_attachments($data){
		$attachedfile = $this->input->post('attachedfile');
		$date_added = date('Y-m-d H:i:s T', time());
		$attachments_result=$this->docutrackingmodel->add_PRattachments($data,$attachedfile,$date_added,$_SESSION['admin_office_ID'],$_SESSION['admin_user_ID']);
		if($attachments_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
			$this->cashier_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
		}

	}

	#ADD PR remarks in cashier
	public function cashier_addPR_remarks($data){
		$remarks = $this->input->post('remarks');
		$date_added = date('Y-m-d H:i:s T', time());
		$remarks_result=$this->docutrackingmodel->add_PRremarks($data,$remarks,$date_added,$_SESSION['admin_user_ID']);
		if($remarks_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
			$this->cashier_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
		}
	}
	#ADD PR remarks in accounting
	public function cashier_addPR_remarks1($data){
		$remarks = $this->input->post('remarks');
		$date_added = date('Y-m-d H:i:s T', time());
		$remarks_result=$this->docutrackingmodel->add_PRremarks($data,$remarks,$date_added,$_SESSION['admin_user_ID']);
		if($remarks_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
			$this->cashier_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
		}

	}
	#ADD to return
	public function cashier_PR_return($data){
		$remarks = $this->input->post('remarks');
        $destination = $this->input->post('destination'); // alamin kung admin office or euser office
        if($destination != 1 OR $destination != 2 OR $destination != 6 OR $destination != 3 OR $destination != 7 OR $destination != 8){
            $date_added = date('Y-m-d H:i:s T', time());
            if($remarks == NULL){
                $this->docutrackingmodel->updatePR_location1($data,$destination,date('Y-m-d H:i:s T', time()));
                echo "<script type='text/javascript'>alert('Trial Updated!').delay(500); </script>";
                $this->cashier_details($data);
            }
            else{ // if with remarks
                $this->docutrackingmodel->updatePR_location1($data,$destination,date('Y-m-d H:i:s T', time()));
                // $this->docutrackingmodel->updatePR_returnScan($data,$destination);
                $this->docutrackingmodel->add_PRremarks($data,"Returned: ".$remarks,date('Y-m-d H:i:s T', time()),$_SESSION['admin_user_ID']);
                $this->docutrackingmodel->addPR_status("to be returned",$data);             
                echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
                $this->cashier_details($data);
            }   
        }
        else{
            $date_added = date('Y-m-d H:i:s T', time());
            if($remarks == NULL ){
                $this->docutrackingmodel->updatePR_location($data,$destination);
                echo "<script type='text/javascript'>alert('Trial Updated!').delay(500); </script>";
                $this->cashier_details($data);
            }
            else{ // if with remarks
                $this->docutrackingmodel->updatePR_location($data,$destination);
                // $this->docutrackingmodel->updatePR_returnScan($data,$destination);
                $this->docutrackingmodel->add_PRremarks($data,"Returned ".$remarks,date('Y-m-d H:i:s T', time()),$_SESSION['admin_user_ID']);
                $this->docutrackingmodel->addPR_status("to be returned",$data);
                echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
                $this->cashier_details($data);

            }
        }
	}

	#READ PR details of scanned PR
	public function cashier_scanPR(){
		$data['prinfo'] = $this->docutrackingmodel->scanned_PRdetails($this->input->post('scanPR'));

		if($data['prinfo']['result']== 0){
			echo "<script type='text/javascript'>alert('No Data Found!');</script>";
			$this->budget();
			// redirect('cashier', 'refresh');
		}
		else{
			$sequence = $this->docutrackingmodel->checkSequence($this->input->post('scanPR'));
			// $sequence+1 to get the next location 
			// print_r($sequence);
			// exit();
			if($this->docutrackingmodel->readIfReturned1($this->input->post('scanPR')) != NULL){
				$this->docutrackingmodel->updateReturned1($this->input->post('scanPR'));
				$this->docutrackingmodel->addPR_status("pending",$this->input->post('scanPR'));	
				$data['cashierongoing'] = $this->docutrackingmodel->cashier_ongoing(); 
				$data['prdone'] = $this->docutrackingmodel->PRdone(); 
				$data['prfail'] = $this->docutrackingmodel->PRfail();
				echo "<script type='text/javascript'>alert('Scanned Successfully!'); </script>";
				$this->load->view('cashier/cashier_nav');
				$this->load->view('cashier/cashier_qr',$data);
				$this->load->view('footer_home');
			}
			else if($this->docutrackingmodel->readIfReturned($this->input->post('scanPR')) != NULL){
				$this->docutrackingmodel->updateReturned($this->input->post('scanPR'));
				$this->docutrackingmodel->addPR_status("pending",$this->input->post('scanPR'));	
				$data['cashierongoing'] = $this->docutrackingmodel->cashier_ongoing(); 
				$data['prdone'] = $this->docutrackingmodel->PRdone(); 
				$data['prfail'] = $this->docutrackingmodel->PRfail();
				echo "<script type='text/javascript'>alert('Scanned Successfully!'); </script>";
				$this->load->view('cashier/cashier_nav');
				$this->load->view('cashier/cashier_qr',$data);
				$this->load->view('footer_home');
			}
			else if(($sequence+1) == 9){
				$days =$this->docutrackingmodel->getDays($this->input->post('scanPR'),$_SESSION["admin_office_ID"]);								 
				$this->docutrackingmodel->update_scannedPR($this->input->post('scanPR'),$_SESSION["admin_user_ID"],$_SESSION["admin_office_ID"],$days);
				$data['cashierongoing'] = $this->docutrackingmodel->cashier_ongoing(); 
				$data['prdone'] = $this->docutrackingmodel->PRdone(); 
				$data['prfail'] = $this->docutrackingmodel->PRfail();
				echo "<script type='text/javascript'>alert('Scanned Successfully!'); </script>";
				$this->load->view('cashier/cashier_nav');
				$this->load->view('cashier/cashier_qr',$data);
				$this->load->view('footer_home');

			}
			else{
				if($sequence == NULL){
					// add here notificaion for cashier
					$wrongSeq = 'Wrong Sequence';
					
					$result = $this->docutrackingmodel->addNotif($this->input->post('scanPR'),$wrongSeq,$_SESSION["admin_office_name"],$_SESSION["admin_office_ID"],date('Y-m-d H:i:s T', time()));
					if($result){
						echo "<script type='text/javascript'>alert('Wrong Sequence! Return to BAC Office!!').delay(500);</script>";
						redirect('cashier', 'refresh');
					}
					else{
						echo "<script type='text/javascript'>alert('ERROR!!').delay(500); </script>";		
						redirect('cashier', 'refresh');
					}
				}
				else{
					$wrongSeq = 'Wrong Sequence';
					$result = $this->docutrackingmodel->addNotif($this->input->post('scanPR'),$wrongSeq,$_SESSION["admin_office_name"],$_SESSION["admin_office_ID"],date('Y-m-d H:i:s T', time()));
					echo "<script type='text/javascript'>alert('Wrong Sequence! Return to correct office!!').delay(500); </script>";
					redirect('cashier', 'refresh');
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
			$result = $this->docutrackingmodel->readNotif($_SESSION['admin_office_ID']);
			$output = '';
			if($result > 0){
			 	foreach($result as $key){
			 		if($key->message_subject == "Due Date"){
			 			$output .= '
				   		<li>
				   		<a href="#">
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
				   		<a href="#">
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
