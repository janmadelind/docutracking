<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ICO_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('docutrackingmodel');
	}
	
	public function ICO(){
		if('6' != $this->session->userdata('admin_office_ID')){ //BAC
			redirect();
		}
		$data['ICOongoing'] = $this->docutrackingmodel->ICO_ongoing(); 
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
		$this->load->view('ICO/ICO_nav');
		$this->load->view('ICO/ICO',$data);
		$this->load->view('footer_home');
	}		
	public function ICO_table_pending(){
		$data['readPR'] = $this->docutrackingmodel->read_ICOpending(); 
		$data['title'] = "Pending";	
		$this->load->view('ICO/ICO_nav');
		$this->load->view('ICO/ICO_admin_table',$data);
		$this->load->view('footer');
	}
	public function ICO_table_ongoing(){
		$data['readPR'] = $this->docutrackingmodel->read_ICOongoing(); 	
		$data['title'] = "Ongoing";		
		$this->load->view('ICO/ICO_nav');
		$this->load->view('ICO/ICO_admin_table',$data);
		$this->load->view('footer');
	}
	public function ICO_table_done(){
		$data['readPR'] = $this->docutrackingmodel->read_PRdone(); 	//whole ICOess
		$data['title'] = "Approved";
		$this->load->view('ICO/ICO_nav');
		$this->load->view('ICO/ICO_admin_table',$data);
		$this->load->view('footer');
	}
	public function ICO_table_failed(){
		$data['readPR'] = $this->docutrackingmodel->readPR_failed(); 	
		$data['title'] = "Failed";
		$this->load->view('ICO/ICO_nav');
		$this->load->view('ICO/ICO_admin_table',$data);
		$this->load->view('footer');
	}
	public function ICO_notif(){
		$data['read']= $this->docutrackingmodel->readALLNotif();				
		$this->load->view('ICO/ICO_nav');
		$this->load->view('ICO/ICO_notif',$data);
		$this->load->view('footer');
	}
	// public function ICO_reports(){
	// 	$this->load->model('docutrackingmodel');
	// 	// $data['bacpending'] = $this->docutrackingmodel->bac_pending(); 
	// 	// $data['procpending'] = $this->docutrackingmodel->proc_pending();
	// 	// $data['bacongoing'] = $this->docutrackingmodel->bac_ongoing(); 
	// 	// $data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
	// 	// $data['ICOpending'] = $this->docutrackingmodel->ICO_pending();
	// 	// $data['ICOongoing'] = $this->docutrackingmodel->ICO_ongoing(); 
	// 	$data['prdone'] = $this->docutrackingmodel->PRdone(); 
	// 	$data['prfail'] = $this->docutrackingmodel->PRfail(); 

	// 	$this->load->model('reportmodel');
	// 	// $data['collegePRcount'] = $this->reportmodel->countCOLLEGEpr();	
	// 	// $data['deptPRcount'] = $this->reportmodel->countDEPTpr();	
	// 	$data['svpPRcount'] = $this->reportmodel->countSVPpr();	
	// 	$data['npPRcount'] = $this->reportmodel->countNPpr();	
	// 	$data['mon'] = $this->reportmodel->monthlyPR();	
	// 	$data['deptcol'] = $this->reportmodel->deptcolPR();	
	// 	$data['deptname'] = $this->reportmodel->deptname();	
	// 	$data['colname'] = $this->reportmodel->colname();
	// 	$this->load->view('ICO/ICO_nav');
	// 	$this->load->view('ICO/ICO_reports',$data);
	// 	$this->load->view('footer');
	// }
	public function ICO_details($data){
		$curloc= $this->docutrackingmodel->checkSequence($data);	
		$det['prcurloc'] = $this->docutrackingmodel->getLoc($curloc);	
		$det['prremarks'] = $this->docutrackingmodel->read_PRremarks($data);	
		$det['prdetails'] = $this->docutrackingmodel->read_PRdetails($data);	
		$det['prbidders'] = $this->docutrackingmodel->read_PRbidders($data);	
		$det['prattachements'] = $this->docutrackingmodel->read_PRattachments($data);
		$det['prresomode'] = $this->docutrackingmodel->read_PRresomode($data);
		$det['prresoaward'] = $this->docutrackingmodel->read_PRresoaward($data);
		$det['allbidders'] = $this->docutrackingmodel->read_allbidders();
		$this->load->view('ICO/ICO_nav');
		$this->load->view('PR_Route');		
		$this->load->view('ICO/ICO_details',$det);
		$this->load->view('footer');
	}
	#ADD PR mode type in BAC
	public function ICO_addPR_status($data){
		$status =$this->input->post('status');
		$add_status = $this->docutrackingmodel->addPR_status($status,$data);
		$remarks = "Change status to ".$status;
		if($add_status){
			$this->docutrackingmodel->add_PRremarks($data,$remarks,date('Y-m-d H:i:s T', time()),$_SESSION['admin_user_ID']);
			$deptID =  $this->docutrackingmodel->getDEPT($data);
			if($status == 'to be returned'){
				$subj = "Status Change";		
				$this->docutrackingmodel->euser_addNotif($data,$subj,$deptID,date('Y-m-d H:i:s T', time()));
				$sequence = $this->docutrackingmodel->checkSequence($data);
				$this->docutrackingmodel->updatePR_ICOscan($data,$sequence); 	// update: back to processing office, status_if_scanned = NS
				$type = $this->docutrackingmodel->getModetype($data);
				if( $type[0]->type_name== 'food'){ //type = food
					$subj1 = "PR Returned";
					$this->docutrackingmodel->updatePR_returnScan($data,$sequence-5); 	// update: back to processing office, status_if_scanned = NS if BAC
					$this->docutrackingmodel->addNotif($data,$subj1,$_SESSION["admin_office_ID"],date('Y-m-d H:i:s T', time()));
					$this->docutrackingmodel->euser_addNotif($data,$subj1,$deptID,date('Y-m-d H:i:s T', time()));
					echo "<script type='text/javascript'>alert('This PR is to be returned to BAC Office!').delay(500); </script>";
				}
				else{
					$subj1 = "PR Returned";
					$this->docutrackingmodel->updatePR_returnScan($data,$sequence-4); 	// update: back to processing office, status_if_scanned = NS if PROC
					$this->docutrackingmodel->updatePR_returnScan($data,$sequence-2); 	// update: back to processing office, status_if_scanned = NS for bac chairman
					$this->docutrackingmodel->addNotif($data,$subj1,$_SESSION["admin_office_ID"],date('Y-m-d H:i:s T', time()));
					$this->docutrackingmodel->euser_addNotif($data1,$subj1,$deptID,date('Y-m-d H:i:s T', time()));
					echo "<script type='text/javascript'>alert('This PR is to be returned to Procurement Office!').delay(500); </script>";
				}
				// print_r($sequence);
				// exit();
			}
			else{
				echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
				redirect('ico', 'refresh');
			}
			
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			redirect('ico', 'refresh');
		}
	}
	#ADD PR attachments in ICO
	public function ICO_addPR_attachments($data){
		$attachedfile = $this->input->post('attachedfile');
		$date_added = date('Y-m-d H:i:s T', time());
		$attachments_result=$this->docutrackingmodel->add_PRattachments($data,$attachedfile,$date_added,$_SESSION['admin_office_ID'],$_SESSION['admin_user_ID']);
		if($attachments_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
			$this->ICO_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
		}

	}

	#ADD PR remarks in ICO
	public function ICO_addPR_remarks($data){
		$remarks = $this->input->post('remarks');
		$date_added = date('Y-m-d H:i:s T', time());
		$remarks_result=$this->docutrackingmodel->add_PRremarks($data,$remarks,$date_added,$_SESSION['admin_user_ID']);
		if($remarks_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
			$this->ICO_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
		}

	}

	#READ PR details of scanned PR
	public function ICO_scanPR(){
		$data['prinfo'] = $this->docutrackingmodel->scanned_PRdetails($this->input->post('scanPR'));

		if($data['prinfo']['result']== 0){
			echo "<script type='text/javascript'>alert('No Data Found!').delay(500);</script>";
			// redirect('ICO', 'refresh');
			$this->ICO();
		}
		else{
			$sequence = $this->docutrackingmodel->checkSequence($this->input->post('scanPR'));
			// $sequence+1 to get the next location 
			// print_r($sequence);
			// exit();
			if(($sequence+2) == 6){
				$this->docutrackingmodel->update_scannedPR($this->input->post('scanPR'),$_SESSION["admin_user_ID"],$_SESSION["admin_office_ID"]);
				$data['ICOongoing'] = $this->docutrackingmodel->ICO_ongoing(); 
				$data['prdone'] = $this->docutrackingmodel->PRdone(); 
				$data['prfail'] = $this->docutrackingmodel->PRfail();
				echo "<script type='text/javascript'>alert('Scanned Successfully!'); </script>";
				$this->load->view('ICO/ICO_nav');
				$this->load->view('ICO/ICO_qr',$data);
				$this->load->view('footer_home');

			}
			else if(($sequence+5) == 6){
				$this->docutrackingmodel->update_scannedPR($this->input->post('scanPR'),$_SESSION["admin_user_ID"],$_SESSION["admin_office_ID"]);
				$data['ICOongoing'] = $this->docutrackingmodel->ICO_ongoing(); 
				$data['prdone'] = $this->docutrackingmodel->PRdone(); 
				$data['prfail'] = $this->docutrackingmodel->PRfail();
				echo "<script type='text/javascript'>alert('Scanned Successfully!'); </script>";
				$this->load->view('ICO/ICO_nav');
				$this->load->view('ICO/ICO_qr',$data);
				$this->load->view('footer_home');

			}
			else{
				if($sequence == NULL){
					// add here notificaion for ico
					$wrongSeq = 'Wrong Sequence';
					
					$result = $this->docutrackingmodel->addNotif($this->input->post('scanPR'),$wrongSeq,$_SESSION["admin_office_ID"],date('Y-m-d H:i:s T', time()));
					if($result){
						echo "<script type='text/javascript'>alert('Wrong Sequence! Return to BAC Office!!').delay(500);</script>";
						redirect('ico', 'refresh');
					}
					else{
						echo "<script type='text/javascript'>alert('ERROR!!').delay(500); </script>";		
						redirect('ico', 'refresh');
					}
				}
				else{
					$wrongSeq = 'Wrong Sequence';
					$result = $this->docutrackingmodel->addNotif($this->input->post('scanPR'),$wrongSeq,$_SESSION["admin_office_ID"],date('Y-m-d H:i:s T', time()));
					echo "<script type='text/javascript'>alert('Wrong Sequence! Return to previous office!!').delay(500); </script>";
					redirect('ico', 'refresh');
				}
			}
			
		}
	}

	public function notification(){
		if(isset($_POST['view'])){
			$duePR = $this->docutrackingmodel->getDuePR($_SESSION['admin_office_ID']);
			$subj = 'Due Date';
			if($duePR != NULL){ //kung merong nahanap na expiry date >= current date
				foreach ($duePR as $key) {
					$this->docutrackingmodel->addNotif($key->PR_No,$subj,$_SESSION['admin_office_ID'],date('Y-m-d H:i:s T', time()));
				}				
			}
			$result = $this->docutrackingmodel->readNotif($_SESSION['admin_office_ID']);
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
