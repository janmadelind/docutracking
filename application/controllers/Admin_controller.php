<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('docutrackingmodel');
	}
	 
	public function home(){
		$this->load->view('login');
	}	

	public function bac(){
		// count
		$data['bacpending'] = $this->docutrackingmodel->bac_pending(); 
		$data['procpending'] = $this->docutrackingmodel->proc_pending();
		$data['bacongoing'] = $this->docutrackingmodel->bac_ongoing(); 
		$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
		$data['pr_done'] = $this->docutrackingmodel->PRdone(); 
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
	}	
	public function bac_table_pending(){
		$data['readPR'] = $this->docutrackingmodel->read_bacpending(); 
		$this->load->view('bac/nav');
		$this->load->view('bac/admin_table',$data);
	}
	public function bac_table_ongoing(){
		$data['readPR'] = $this->docutrackingmodel->read_bacongoing(); 
		$this->load->view('bac/nav');
		$this->load->view('bac/admin_table',$data);
	}
	public function bac_table_done(){
		$data['readPR'] = $this->docutrackingmodel->read_PRdone(); 	
		$this->load->view('bac/nav');
		$this->load->view('bac/admin_table',$data);
	}
	public function bac_table_failed(){
		$this->load->view('bac/nav');
		$this->load->view('bac/admin_table');
	}
	public function bac_notif(){
		$this->load->view('bac/nav');
		$this->load->view('notif');
	}
	public function bac_details($data){
		$det['prdetails'] = $this->docutrackingmodel->read_PRdetails($data);	
		$det['prbidders'] = $this->docutrackingmodel->read_PRbidders($data);	
		$det['prattachements'] = $this->docutrackingmodel->read_PRattachments($data);
		$det['prremarks'] = $this->docutrackingmodel->read_PRremarks($data);	
		$this->load->view('bac/nav');
		$this->load->view('bac/bac_details',$det);
	}
	#ADD PR mode in BAC
	public function bac_addPR_mode($data){
		$mode =$this->input->post('mode')[0];
		// $submode =$this->input->post('submode');
		$add_mode = $this->docutrackingmodel->addPR_mode($mode,$data);
		$mode_result = $this->docutrackingmodel->addPR_seq($mode,$data);
		if($add_mode && $mode_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
			$this->bac_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
		}


	}
	#ADD PR attachments in BAC
	public function bac_addPR_attachments($data){
		$attachedfile = $this->input->post('attachedfile');
		$date_added = date('Y-m-d H:i:s T', time());
		$attachments_result=$this->docutrackingmodel->add_PRattachments($data,$attachedfile,$date_added);
		if($attachments_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
			$this->bac_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
		}

	}

	#ADD PR remarks in BAC
	public function bac_addPR_remarks($data){
		$remarks = $this->input->post('remarks');
		$date_added = date('Y-m-d H:i:s T', time());

		$remarks_result=$this->docutrackingmodel->add_PRremarks($data,$remarks,$date_added,$_SESSION['admin_user_ID']);
		if($remarks_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
			$this->bac_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
		}

	}
######################################################################################
######################################################################################
######################################################################################
######################################################################################
	public function procurement(){
		$data['procpending'] = $this->docutrackingmodel->proc_pending();
		$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
		$data['pr_done'] = $this->docutrackingmodel->PRdone();
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
	}		
	public function procurement_table_pending(){
		$data['readPR'] = $this->docutrackingmodel->read_procpending(); 	
		$this->load->view('procurement/proc_nav');
		$this->load->view('procurement/proc_admin_table',$data);
	}
	public function procurement_table_ongoing(){
		$data['readPR'] = $this->docutrackingmodel->read_procongoing(); 			
		$this->load->view('procurement/proc_nav');
		$this->load->view('procurement/proc_admin_table',$data);
	}
	public function procurement_table_done(){
		$data['readPR'] = $this->docutrackingmodel->read_PRdone(); 	//whole process
		$this->load->view('procurement/proc_nav');
		$this->load->view('procurement/proc_admin_table',$data);
	}
	public function procurement_table_failed(){
		$this->load->view('procurement/proc_nav');
		$this->load->view('procurement/proc_admin_table');
	}
	public function procurement_notif(){
		$this->load->view('procurement/proc_nav');
		$this->load->view('notif');
	}
	public function procurement_details($data){
		$det['prremarks'] = $this->docutrackingmodel->read_PRremarks($data);	
		$det['prdetails'] = $this->docutrackingmodel->read_PRdetails($data);	
		$det['prbidders'] = $this->docutrackingmodel->read_PRbidders($data);	
		$det['prattachements'] = $this->docutrackingmodel->read_PRattachments($data);
		$det['allbidders'] = $this->docutrackingmodel->read_allbidders();
		$this->load->view('procurement/proc_nav');
		$this->load->view('procurement/proc_details',$det);
	}
	#ADD new PR bidders for PR
	public function proc_addPR_oldbidders($data){
		$attachedfile = $this->input->post('attachedfile');
		$date_added = date('Y-m-d H:i:s T', time());
		$attachments_result=$this->docutrackingmodel->add_PRattachments($data,$attachedfile,$date_added);
		if($attachments_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
			$this->procurement_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
		}

	}

	#ADD old PR bidders for PR
	public function proc_addPR_newbidders($data){
		$bidders = $this->input->post('bidders');
		$contact = $this->input->post('contact');
		$email = $this->input->post('email');
		$amount = $this->input->post('amount');
		$date_added = date('Y-m-d H:i:s T', time());
		$bidders_result = $this->docutrackingmodel->add_PRbidders($data,$bidders,$contact,$email);
		$bidderID = $this->db->insert_id();
		$bidderstrans_result = $this->docutrackingmodel->add_PRbidderstrans($data,$bidderID,$amount,$date_added);
		if($bidderstrans_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
			$this->procurement_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
		}
	}

#ADD PR attachments in PROC
	public function proc_addPR_attachments($data){
		$attachedfile = $this->input->post('attachedfile');
		$date_added = date('Y-m-d H:i:s T', time());
		$attachments_result=$this->docutrackingmodel->add_PRattachments($data,$attachedfile,$date_added);
		if($attachments_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
			$this->procurement_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
		}

	}

	#ADD PR remarks in PROC
	public function proc_addPR_remarks($data){
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
###################################################################################
###################################################################################
###################################################################################
###################################################################################
	public function enduser(){
		$data['euserpending'] = $this->docutrackingmodel->euser_pending($_SESSION['end_user_ID']);
		$data['euserongoing'] = $this->docutrackingmodel->euser_ongoing($_SESSION['end_user_ID']); 
		$data['pr_done'] = $this->docutrackingmodel->PRdone_eu($_SESSION['end_user_ID']); 

		$this->load->view('enduser/eu_nav');
		$this->load->view('enduser/enduser',$data);
	}	
	public function enduser_table_pending(){
		$data['eu_readPR'] = $this->docutrackingmodel->read_PRpending_eu($_SESSION['end_user_ID']);
		$this->load->view('enduser/eu_nav');
		$this->load->view('enduser/enduser_table',$data);
	}
	public function enduser_table_ongoing(){
		$data['eu_readPR'] = $this->docutrackingmodel->read_PRongoing_eu($_SESSION['end_user_ID']);
		$this->load->view('enduser/eu_nav');
		$this->load->view('enduser/enduser_table',$data);
	}
	public function enduser_table_done(){
		$data['eu_readPR'] = $this->docutrackingmodel->read_PRdone_eu($_SESSION['end_user_ID']); 	
		$this->load->view('enduser/eu_nav');
		$this->load->view('enduser/enduser_table',$data);
	}
	public function enduser_table_failed(){ 
		// $data['eu_readPR'] = $this->docutrackingmodel->readPR($_SESSION['end_user_ID']);//pr submitted by end user
		$this->load->view('enduser/eu_nav');
		$this->load->view('enduser/enduser_table');
	}
	public function enduser_notif(){
		$this->load->view('enduser/eu_nav');
		$this->load->view('notif');
	}
	public function enduser_details($data){
		$det['prdetails'] = $this->docutrackingmodel->read_PRdetails($data);	
		$det['prbidders'] = $this->docutrackingmodel->read_PRbidders($data);	
		$det['prattachements'] = $this->docutrackingmodel->read_PRattachments($data);
		$det['prremarks'] = $this->docutrackingmodel->read_PRremarks($data);	
		$this->load->view('enduser/eu_nav');
		$this->load->view('enduser/eu_details',$det);
	}
	// #ADD PR attachments in end user
	// public function eu_addPR_attachments($data){
	// 	$attachedfile = $this->input->post('attachedfile');
	// 	$date_added = date('Y-m-d H:i:s T', time());
	// 	$attachments_result=$this->docutrackingmodel->add_PRattachments($data,$attachedfile,$date_added);
	// 	if($attachments_result){
	// 		echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
	// 		$this->enduser_details($data);
	// 	}
	// 	else{
	// 		echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
	// 	}

	// }

	// #ADD PR remarks in end user
	// public function eu_addPR_remarks($data){
	// 	$remarks = $this->input->post('remarks');
	// 	$date_added = date('Y-m-d H:i:s T', time());

	// 	$remarks_result=$this->docutrackingmodel->add_PRremarks($data,$remarks,$date_added,$_SESSION['admin_user_ID']);
	// 	if($remarks_result){
	// 		echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
	// 		$this->enduser_details($data);
	// 	}
	// 	else{
	// 		echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
	// 	}

	// }
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
			if('1' == $verify[0]->user_type_ID ){ #BAC(user type: ADMIN)
				$verify = $this->docutrackingmodel->adlogin($username,$password);
				if(isset($verify)){
					$userdata = array( 
						'user_ID' => $verify[0]->user_ID,
						'username' => $verify[0]->username,
						'admin_office_ID' => $verify[0]->admin_office_ID,
						'admin_office_name' => $verify[0]->admin_office_name,
						'admin_user_ID' => $verify[0]->admin_user_ID,
						'admin_user_name' => $verify[0]->admin_user_name 
					);
				}
				$this->session->set_userdata($userdata);
				if('1' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID ){
					echo "<script type='text/javascript'>alert('BAC!');  window.location.href = 'http://localhost/docutracking/bac'; </script>";
				}
				if('2' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID){
					echo "<script type='text/javascript'>alert('PROC!');  window.location.href = 'http://localhost/docutracking/procurement'; </script>";
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
					echo "<script type='text/javascript'>alert('ENDUSER!'); window.location.href = 'http://localhost/docutracking/enduser';</script>";
			}
		}
		else{
			echo "<script type='text/javascript'>alert('Username and Password Mismatch!'); window.location.href = 'http://localhost/docutracking';</script>";
		}
	}	

	#ADD PR in Enduser dashboard
	public function addPR(){
		// 
		$projname = $this->input->post('projname');
		$projdesc = $this->input->post('projdesc');
		$newQR = $this->docutrackingmodel->newQR();
		$date_added = date('Y-m-d H:i:s T', time());
		$this->docutrackingmodel->addPR_route1($newQR);
		$this->docutrackingmodel->addPR_details($newQR,$projname,$projdesc, $_SESSION['end_user_ID'],$date_added);
		echo "<script type='text/javascript'>alert('Successfully Added!'); </script>";
		redirect('enduser', 'refresh');

	}

	#READ PR details of scanned PR
	public function scanPR(){
		$bona = $_POST['scanPR'];
		$data['prinfo'] = $this->docutrackingmodel->scanned_PRdetails($bona);
		$lyle = $this->docutrackingmodel->func1($bona);
		if($data['prinfo']['result']== 0){
			echo "<script type='text/javascript'>alert('No Data Found!');</script>";
			redirect('bac', 'refresh');
		}
		else{
			$this->docutrackingmodel->update_scannedPR($this->input->post('scanPR'),$_SESSION["admin_user_ID"],$_SESSION["admin_office_ID"]);
			$data['bacpending'] = $this->docutrackingmodel->bac_pending(); 
			$data['procpending'] = $this->docutrackingmodel->proc_pending();
			$data['bacongoing'] = $this->docutrackingmodel->bac_ongoing(); 
			$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
			$data['pr_done'] = $this->docutrackingmodel->PRdone();
			$this->load->view('bac/nav');
			$this->load->view('bac/bac',$data);
		}
	}
	public function func1(){
		$lyle = $this->docutrackingmodel->func1();
		$madelind = $this->docutrackingmodel->func2($lyle[0]->ad_id, $lyle[0]->mo_id);
	}
}
?>
