<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procurement_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('docutrackingmodel');
	}
	
	public function procurement(){
		if('2' != $this->session->userdata('admin_office_ID')){ //BAC
			redirect();
		}
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
		$this->load->view('procurement/proc_nav');
		$this->load->view('procurement/procurement',$data);
		$this->load->view('footer_home');		
	}		
	public function procurement_table_pending(){
		$data['readPR'] = $this->docutrackingmodel->read_procpending(); 
		$data['title'] = "Pending";	
		$this->load->view('procurement/proc_nav');
		$this->load->view('procurement/proc_admin_table',$data);
		$this->load->view('footer');
	}
	public function procurement_table_ongoing(){
		$data['readPR'] = $this->docutrackingmodel->read_procongoing(); 			
		$data['title'] = "Ongoing";		
		$this->load->view('procurement/proc_nav');
		$this->load->view('procurement/proc_admin_table',$data);
		$this->load->view('footer');
		
	}
	public function procurement_table_done(){
		$data['readPR'] = $this->docutrackingmodel->read_PRdone(); 	//whole process
		$data['title'] = "Approved";
		$this->load->view('procurement/proc_nav');
		$this->load->view('procurement/proc_admin_table',$data);
		$this->load->view('footer');
	}
	public function procurement_table_failed(){
		$data['readPR'] = $this->docutrackingmodel->readPR_failed(); 	
		$data['title'] = "Failed";
		$this->load->view('procurement/proc_nav');
		$this->load->view('procurement/proc_admin_table',$data);
		$this->load->view('footer');
	}
	public function procurement_notif(){
		$data['read']= $this->docutrackingmodel->readALLNotif($_SESSION['admin_office_ID']);		
		$this->load->view('procurement/proc_nav');
		$this->load->view('procurement/proc_notif',$data);
		$this->load->view('footer');
	}
	public function proc_reports(){
		$this->load->model('docutrackingmodel');
		// $data['bacpending'] = $this->docutrackingmodel->bac_pending(); 
		// $data['procpending'] = $this->docutrackingmodel->proc_pending();
		// $data['bacongoing'] = $this->docutrackingmodel->bac_ongoing(); 
		// $data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
		// $data['oppending'] = $this->docutrackingmodel->op_pending();
		// $data['opongoing'] = $this->docutrackingmodel->op_ongoing(); 
		$data['prdone'] = $this->docutrackingmodel->PRdone(); 
		$data['prfail'] = $this->docutrackingmodel->PRfail(); 

		$this->load->model('reportmodel');
		// $data['collegePRcount'] = $this->reportmodel->countCOLLEGEpr();	
		// $data['deptPRcount'] = $this->reportmodel->countDEPTpr();	
		$data['svpPRcount'] = $this->reportmodel->countSVPpr();	
		$data['npPRcount'] = $this->reportmodel->countNPpr();	
		$data['mon'] = $this->reportmodel->monthlyPR();	
		$data['deptcol'] = $this->reportmodel->deptcolPR();	
		$data['deptname'] = $this->reportmodel->deptname();	
		$data['colname'] = $this->reportmodel->colname();	
		$this->load->view('procurement/proc_nav');
		$this->load->view('procurement/proc_reports',$data);
		$this->load->view('footer_home');
	}
	public function procurement_details($data){
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
		$date1 = $this->docutrackingmodel->getHistoDate($office1,$data);
		$date2 = $this->docutrackingmodel->getHistoDate($office2,$data);
		$det['all'] = $this->docutrackingmodel->histogram($data);
		for($x=0;$x < count($det['all'])-1 ;$x++){
			$det['new'][$x]['days']=date_diff(date_create($det['all'][$x+1]->date_scanned),date_create($det['all'][$x]->date_scanned)); 
			$det['new'][$x]['office']= $det['all'][$x]->admin_office_name."<br>";
			$det['new'][$x]['daystart']= $det['all'][$x+1]->date_scanned;
			$det['new'][$x]['dayend']= $det['all'][$x]->date_scanned;
		}			
		$det['start'] = $this->docutrackingmodel->getDateStart($data);
		$det['end'] = $this->docutrackingmodel->getDateEnd($data);		
		$this->load->view('procurement/proc_nav');
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
		// print_r($det['prcurloc']);
		// print_r($det['return1']);
		// exit();
		
		$this->load->view('procurement/proc_details',$det);
		$this->load->view('footer');
	}
	#ADD Reso of Mode of PR
	public function proc_addPR_resomode($data){
		$resomode = $this->input->post('resomode');
		$date_added = date('Y-m-d H:i:s T', time());
		$type = "Mode";		
		$result=$this->docutrackingmodel->addPR_resomode($data,$resomode,$date_added,$type);
		$resomodefile = $resomode." file";
		$resoattachment_result=$this->docutrackingmodel->add_PRattachments($data,$resomodefile,$date_added,$_SESSION['admin_office_ID'],$_SESSION['admin_user_ID']);//add reso to attachments	
		if($result){
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->procurement_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!!').delay(500); </script>";
		}
	}

	#ADD Reso of Awards of PR
	public function proc_addPR_resoawards($data){
		$resoaward = $this->input->post('resoaward');
		$date_added = date('Y-m-d H:i:s T', time());	
		$type = "Award";	
		$result=$this->docutrackingmodel->addPR_resoaward($data,$resoaward,$date_added,$type);
		$resoawardfile = $resoaward." file";
		$resoawardfile=$this->docutrackingmodel->add_PRattachments($data,$resoawardfile,$date_added,$_SESSION['admin_office_ID'],$_SESSION['admin_user_ID']);//add reso to attachments	
		if($result){
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->procurement_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!!').delay(500); </script>";
		}
	}

	#ADD update amount of Bidders
	public function proc_updatePR_bidderamount($bidderID, $data){
		$amount = $this->input->post('amount');		
		$date_added = date('Y-m-d H:i:s T', time());
		$result=$this->docutrackingmodel->updatePR_bidderamount($data,$bidderID,$amount);
		if($result){
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->procurement_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!!').delay(500); </script>";
		}
	}

	#UPDATE amount of Bidders
	public function proc_updatePR_bidderstatus($bidderID, $data){
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
	public function proc_addPR_oldbidders($data){
		$bidder =$this->input->post('bidder');
		$amount = $this->input->post('amount');	
		$date_added = date('Y-m-d H:i:s T', time());
		$checkduplicate = $this->docutrackingmodel->checkPR_oldbidders_transac($bidder,$data); 	
		if($checkduplicate == NULL){
			$bidderstrans_result = $this->docutrackingmodel->addPR_oldbidderstrans($data,$bidder,$amount,$date_added);
			if($bidderstrans_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->procurement_details($data);
			}
			else{
				echo "<script type='text/javascript'>alert('Successfully Updated! !').delay(500); </script>";
				$this->procurement_details($data);
			}
		}
		else{
			echo "<script type='text/javascript'>alert('Bidder has duplicate for this PR!').delay(500); </script>";
			$this->procurement_details($data);
		}	
		
	}

	#ADD new PR bidders for PR
	public function proc_addPR_newbidders($data){
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
					$this->procurement_details($data);
				}
				else{
					echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
					$this->procurement_details($data);

				}
			}
			else{
				$bidderID = $this->docutrackingmodel->getPR_newbidders_ID($bidders);
				$bidderstrans_result = $this->docutrackingmodel->addPR_newbidderstrans($data,$bidderID,$amount,$date_added);	// add new bidder transaction 
				if($bidderstrans_result){
					echo "<script type='text/javascript'>alert('bidder has duplicate in bidder table but non in bidder transaction.Successfully Updated!').delay(500); </script>";
					$this->procurement_details($data);
				}
				else{
					echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
					$this->procurement_details($data);

				}				

			}
			
		}
		else{
			echo "<script type='text/javascript'>alert('Bidder has duplicate for this PR!').delay(500); </script>";
			$this->procurement_details($data);
		}
	}

	#ADD PR attachments in PROC
	public function proc_addPR_attachments($data){
		$attachedfile = $this->input->post('attachedfile');
		$date_added = date('Y-m-d H:i:s T', time());
		$attachments_result=$this->docutrackingmodel->add_PRattachments($data,$attachedfile,$date_added,$_SESSION['admin_office_ID'],$_SESSION['admin_user_ID']);
		if($attachments_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->procurement_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!!').delay(500); </script>";
		}

	}

	#ADD PR remarks in PROC
	public function proc_addPR_remarks($data){
		$remarks = $this->input->post('remarks');
		$date_added = date('Y-m-d H:i:s T', time());
		$remarks_result=$this->docutrackingmodel->add_PRremarks($data,$remarks,$date_added,$_SESSION['admin_user_ID']);
		if($remarks_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
			$this->procurement_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!!').delay(500); </script>";
		}

	}
	#ADD PR remarks in accounting
	public function proc_addPR_remarks1($data){
		$remarks = $this->input->post('remarks');
		$date_added = date('Y-m-d H:i:s T', time());
		$remarks_result=$this->docutrackingmodel->add_PRremarks($data,$remarks,$date_added,$_SESSION['admin_user_ID']);
		if($remarks_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
			$this->procurement_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
		}

	}
#ADD to return
	public function proc_PR_return($data){
		$remarks = $this->input->post('remarks');
		$destination = $this->input->post('destination'); // alamin kung admin office or euser office
		if($destination != 1){
			$date_added = date('Y-m-d H:i:s T', time());
			if($remarks == NULL){
				$this->docutrackingmodel->updatePR_location1($data,$destination,date('Y-m-d H:i:s T', time()));
				echo "<script type='text/javascript'>alert('Trial Updated!').delay(500); </script>";
				$this->procurement_details($data);
			}
			else{ // if with remarks
				$this->docutrackingmodel->updatePR_location1($data,$destination,date('Y-m-d H:i:s T', time()));
				// $this->docutrackingmodel->updatePR_returnScan($data,$destination);
				$this->docutrackingmodel->add_PRremarks($data,"Returned: ".$remarks,date('Y-m-d H:i:s T', time()),$_SESSION['admin_user_ID']);
				$this->docutrackingmodel->addPR_status("to be returned",$data);				
				echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
				$this->procurement_details($data);
			}	
		}
		else{
			$date_added = date('Y-m-d H:i:s T', time());
			if($remarks == NULL ){
				$this->docutrackingmodel->updatePR_location($data,$destination);
				echo "<script type='text/javascript'>alert('Trial Updated!').delay(500); </script>";
				$this->procurement_details($data);
			}
			else{ // if with remarks
				$this->docutrackingmodel->updatePR_location($data,$destination);
				// $this->docutrackingmodel->updatePR_returnScan($data,$destination);
				$this->docutrackingmodel->add_PRremarks($data,"Returned ".$remarks,date('Y-m-d H:i:s T', time()),$_SESSION['admin_user_ID']);
				$this->docutrackingmodel->addPR_status("to be returned",$data);
				echo "<script type='text/javascript'>alert('Successfully Updated!').delay(500); </script>";
				$this->procurement_details($data);

			}
		}
	}
	#READ PR details of scanned PR
	public function proc_scanPR(){
		$data['prinfo'] = $this->docutrackingmodel->scanned_PRdetails($this->input->post('scanPR'));
		if($data['prinfo']['result']== 0){
			echo "<script type='text/javascript'>alert('No Data Found!').delay(500);</script>";
			$this->procurement();
			// redirect('procurement', 'refresh');
		}
		else{
			$sequence = $this->docutrackingmodel->checkSequence($this->input->post('scanPR'));
			// $sequence+1 to get the next location 
			if($this->docutrackingmodel->readIfReturned1($this->input->post('scanPR')) != NULL){
				$this->docutrackingmodel->updateReturned1($this->input->post('scanPR'));
				$this->docutrackingmodel->addPR_status("pending",$this->input->post('scanPR'));	
				$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
				$data['prdone'] = $this->docutrackingmodel->PRdone(); 
				$data['prfail'] = $this->docutrackingmodel->PRfail(); 
				echo "<script type='text/javascript'>alert('Scanned Successfully!').delay(500); </script>";
				$this->load->view('procurement/proc_nav');
				$this->load->view('procurement/procurement_qr',$data);
				$this->load->view('footer_home');	
			}	
			else if($this->docutrackingmodel->readIfReturned($this->input->post('scanPR')) != NULL){
				$this->docutrackingmodel->updateReturned($this->input->post('scanPR'));
				$this->docutrackingmodel->addPR_status("pending",$this->input->post('scanPR'));	
				$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
				$data['prdone'] = $this->docutrackingmodel->PRdone(); 
				$data['prfail'] = $this->docutrackingmodel->PRfail(); 
				echo "<script type='text/javascript'>alert('Scanned Successfully!').delay(500); </script>";
				$this->load->view('procurement/proc_nav');
				$this->load->view('procurement/procurement_qr',$data);
				$this->load->view('footer_home');	
			}			
			else if(($sequence+1) == $_SESSION["admin_office_ID"]){				
				$days = $this->docutrackingmodel->getDays($this->input->post('scanPR'),$_SESSION["admin_office_ID"]);	
				$this->docutrackingmodel->update_scannedPR($this->input->post('scanPR'),$_SESSION["admin_user_ID"],$_SESSION["admin_office_ID"],$days);						
				$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
				$data['prdone'] = $this->docutrackingmodel->PRdone(); 
				$data['prfail'] = $this->docutrackingmodel->PRfail(); 
				echo "<script type='text/javascript'>alert('Scanned Successfully!').delay(500); </script>";
				$this->load->view('procurement/proc_nav');
				$this->load->view('procurement/procurement_qr',$data);
				$this->load->view('footer_home');

			}
			// else if(($sequence+2) == 5){				
			// 	$this->docutrackingmodel->update_scannedPR($this->input->post('scanPR'),$_SESSION["admin_user_ID"],5);
			// 	$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
			// 	$data['pr_done'] = $this->docutrackingmodel->PRdone();
			// 	$this->docutrackingmodel->updateFinalStatus($this->input->post('scanPR'));
			// 	echo "<script type='text/javascript'>alert('Scanned Successfully!').delay(500); </script>";
			// 	$this->load->view('procurement/proc_nav');
			// 	$this->load->view('procurement/procurement_qr',$data);
			// 	$this->load->view('footer_home');

			// }
			else if(($sequence+2) == 5){				
				$days['day'] = $this->docutrackingmodel->getDays($this->input->post('scanPR'),$_SESSION["admin_office_ID"]);								 
				$this->docutrackingmodel->update_scannedPR($this->input->post('scanPR'),$_SESSION["admin_user_ID"],$_SESSION["admin_office_ID"],$days);				
				$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
				$data['prdone'] = $this->docutrackingmodel->PRdone(); 
				$data['prfail'] = $this->docutrackingmodel->PRfail(); 
				$this->docutrackingmodel->updateFinalStatus($this->input->post('scanPR'));
				echo "<script type='text/javascript'>alert('Scanned Successfully!').delay(500); </script>";
				$this->load->view('procurement/proc_nav');
				$this->load->view('procurement/procurement_qr',$data);
				$this->load->view('footer_home');

			}
			else{
				if($sequence == NULL){
					// add here notificaion for bac
					$wrongSeq = 'Wrong Sequence';
					$date_added = date('Y-m-d H:i:s T', time());
					$result = $this->docutrackingmodel->addNotif($this->input->post('scanPR'),$wrongSeq,$_SESSION["admin_office_name"],$_SESSION["admin_office_ID"],$date_added);
					if($result){
						echo "<script type='text/javascript'>alert('Wrong Sequence! Return PR to BAC Office!!').delay(500); </script>";
						redirect('procurement', 'refresh');
					}
					else{
						echo "<script type='text/javascript'>alert('ERROR!').delay(500); </script>";		
						redirect('procurement', 'refresh');
					}
				}
				else{
					$wrongSeq = 'Wrong Sequence';
					$date_added = date('Y-m-d H:i:s T', time());
					$result = $this->docutrackingmodel->addNotif($this->input->post('scanPR'),$wrongSeq,$_SESSION["admin_office_name"],$_SESSION["admin_office_ID"],$date_added);
					echo "<script type='text/javascript'>alert('Wrong Sequence! Return PR to correct Office!!').delay(500); </script>";
					redirect('procurement', 'refresh');
				}
				//dagdag sa notif database
				// kung anong PR ung mali, at kung nakaninong office
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
