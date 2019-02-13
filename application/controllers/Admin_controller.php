<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('docutrackingmodel');
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
		$data['read']= $this->docutrackingmodel->readALLNotif();
		$this->load->view('bac/nav');
		$this->load->view('bac/bac_notif',$data);
		$this->load->view('footer');
	}
	public function bac_reports(){
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
		$this->load->view('bac/nav');
		$this->load->view('bac/reports',$data);
		$this->load->view('footer');
	}
	public function bac_details($data){
		$curloc = $this->docutrackingmodel->checkSequence($data);	
		$det['prcurloc'] = $this->docutrackingmodel->getLoc($curloc);	
		$det['prremarks'] = $this->docutrackingmodel->read_PRremarks($data);	
		$det['prdetails'] = $this->docutrackingmodel->read_PRdetails($data);	
		$det['prbidders'] = $this->docutrackingmodel->read_PRbidders($data);	
		$det['prattachements'] = $this->docutrackingmodel->read_PRattachments($data);
		$det['prresomode'] = $this->docutrackingmodel->read_PRresomode($data);
		$det['prresoaward'] = $this->docutrackingmodel->read_PRresoaward($data);
		$det['allbidders'] = $this->docutrackingmodel->read_allbidders();
		$this->load->view('bac/nav');
		$this->load->view('PR_Route');		
		$this->load->view('bac/bac_details',$det);
		$this->load->view('footer');
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
				$remarks = "added ".$mt[0]->mode_of_procurement." - ".$mt[0]->type_name;
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
					echo "<script type='text/javascript'>alert('BAC!');  window.location.href = 'http://192.168.43.179/docutracking/bac'; </script>";					
				}
				else if('2' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID){ //PROC
					echo "<script type='text/javascript'>alert('PROC!');  window.location.href = 'http://192.168.43.179/docutracking/procurement'; </script>";
				}
				else if('3' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID){ // OP
					echo "<script type='text/javascript'>alert('OP!');  window.location.href = 'http://192.168.43.179/docutracking/officeOfThePresident'; </script>";
				}
				else if('6' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID){ //PROC
					echo "<script type='text/javascript'>alert('ico!');  window.location.href = 'http://192.168.43.179/docutracking/ico'; </script>";
				}
				else if('7' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID){ // OP
					echo "<script type='text/javascript'>alert('budget!');  window.location.href = 'http://192.168.43.179/docutracking/budget'; </script>";
				}
				else if('8' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID){ //PROC
					echo "<script type='text/javascript'>alert('accounting!');  window.location.href = 'http://192.168.43.179/docutracking/accounting'; </script>";
				}
				else if('9' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID){ // OP
					echo "<script type='text/javascript'>alert('cashier!');  window.location.href = 'http://192.168.43.179/docutracking/cashier'; </script>";
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
					echo "<script type='text/javascript'>alert('ENDUSER!'); window.location.href = 'http://192.168.43.179/docutracking/enduser';</script>";
			}
		}
		else{
			echo "<script type='text/javascript'>alert('Username and Password Mismatch!'); window.location.href = 'http://192.168.43.179/docutracking';</script>";
		}
	}	

	#ADD PR in Enduser dashboard
	public function addPR(){
		$totalamt = $this->input->post('total');
		// print_r($totalamt);
		// exit();
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
			// print_r($sequence);
			// exit();
			if(($sequence+1) == $_SESSION["admin_office_ID"]){
				$this->docutrackingmodel->update_scannedPR($this->input->post('scanPR'),$_SESSION["admin_user_ID"],$_SESSION["admin_office_ID"]);				
				$data['bacongoing'] = $this->docutrackingmodel->bac_ongoing(); 
				$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
				$data['prdone'] = $this->docutrackingmodel->PRdone(); 
				$data['prfail'] = $this->docutrackingmodel->PRfail(); 
				echo "<script type='text/javascript'>alert('Scanned Successfully at BAC Office!!').delay(500); </script>";				
				$this->load->view('bac/nav');
				$this->load->view('bac/bac_qr',$data);
				$this->load->view('footer_home');
			}
			else if(($sequence+2) == 4){ #LYLE LYLE LYLE
				$this->docutrackingmodel->update_scannedPR($this->input->post('scanPR'),$_SESSION["admin_user_ID"],4);				
				$data['bacongoing'] = $this->docutrackingmodel->bac_ongoing(); 
				$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
				$data['prdone'] = $this->docutrackingmodel->PRdone(); 
				$data['prfail'] = $this->docutrackingmodel->PRfail(); 
				echo "<script type='text/javascript'>alert('Scanned Successfully').delay(500); </script>";				
				$this->load->view('bac/nav');
				$this->load->view('bac/bac_qr',$data);
				$this->load->view('footer_home');
			}
			else if(($sequence+1) == 4){ #LYLE LYLE LYLE
				$this->docutrackingmodel->update_scannedPR($this->input->post('scanPR'),$_SESSION["admin_user_ID"],4);				
				$data['bacongoing'] = $this->docutrackingmodel->bac_ongoing(); 
				$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
				$data['prdone'] = $this->docutrackingmodel->PRdone(); 
				$data['prfail'] = $this->docutrackingmodel->PRfail(); 
				echo "<script type='text/javascript'>alert('Scanned Successfully').delay(500); </script>";				
				$this->load->view('bac/nav');
				$this->load->view('bac/bac_qr',$data);
				$this->load->view('footer_home');
			}


			else{
				if($sequence == NULL){
					// add here notificaion for bac
					$wrongSeq = 'Wrong Sequence';
					
					$result = $this->docutrackingmodel->addNotif($this->input->post('scanPR'),$wrongSeq,$_SESSION["admin_office_ID"],date('Y-m-d H:i:s T', time()));
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
					$result = $this->docutrackingmodel->addNotif($this->input->post('scanPR'),$wrongSeq,$_SESSION["admin_office_ID"],date('Y-m-d H:i:s T', time()));
					echo "<script type='text/javascript'>alert('Wrong Sequence! Return to previous office!!').delay(500); </script>";
					redirect('bac', 'refresh');
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
