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
		// print_r($data['bacpending'] );
		// print_r($data['procpending'] );
		// exit();
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
		$this->load->view('bac/nav');
		$this->load->view('notif');
		$this->load->view('footer');
	}
	public function bac_details($data){
		$det['prdetails'] = $this->docutrackingmodel->read_PRdetails($data);	
		$curloc= $this->docutrackingmodel->checkSequence($data);	
		$det['prcurloc'] = $this->docutrackingmodel->getLoc($curloc);	
		$det['prbidders'] = $this->docutrackingmodel->read_PRbidders($data);	
		$det['prattachements'] = $this->docutrackingmodel->read_PRattachments($data);
		$det['prremarks'] = $this->docutrackingmodel->read_PRremarks($data);	
		$this->load->view('bac/nav');
		$this->load->view('bac/bac_details',$det);
		$this->load->view('footer');
	}
	#ADD PR mode type in BAC
	public function bac_addPR_status($data){
		$status =$this->input->post('status');
		$add_status = $this->docutrackingmodel->addPR_status($status,$data);
		if($add_status){
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
			redirect('bac', 'refresh');
		}
		else{
			echo "<script type='text/javascript'>alert('ERROR!'); </script>";
			redirect('bac', 'refresh');
		}
	}

	#ADD PR mode type in BAC
	public function bac_addPR_modetype($data){
		$mode =$this->input->post('mode')[0];
		$type=$this->input->post('type')[0];
		// $submode =$this->input->post('submode');
		$add_mode = $this->docutrackingmodel->addPR_modetype($mode,$type,$data);
		$mode_result = $this->docutrackingmodel->addPR_seq($mode,$type,$data);
		if($mode_result){
			echo "<script type='text/javascript'>alert('Successfully Updated!'); </script>";
			$this->bac_details($data);
		}
		else{
			echo "<script type='text/javascript'>alert('ERROR!'); </script>";
			$this->bac_details($data);

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
			echo "<script type='text/javascript'>alert('ERROR!'); </script>";
			$this->bac_details($data);

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
			echo "<script type='text/javascript'>alert('ERROR!'); </script>";
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
						'admin_user_name' => $verify[0]->admin_user_name 
					);
				}
				$this->session->set_userdata($userdata);
				if('1' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID ){ //BAC
					echo "<script type='text/javascript'>alert('BAC!');  window.location.href = 'http://localhost/docutracking/bac'; </script>";
				}
				if('2' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID){ //PROC
					echo "<script type='text/javascript'>alert('PROC!');  window.location.href = 'http://localhost/docutracking/procurement'; </script>";
				}
				if('3' == $verify[0]->admin_office_ID && '1' == $verify[0]->user_type_ID){ // OP
					echo "<script type='text/javascript'>alert('OP!');  window.location.href = 'http://localhost/docutracking/officeOfThePresident'; </script>";
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
		$this->docutrackingmodel->addPR_route1($newQR); //add first routee (BAC) to route per scanned
		$this->docutrackingmodel->addPR_details($newQR,$projname,$projdesc, $_SESSION['end_user_ID'],$date_added); //add details to document table
		echo "<script type='text/javascript'>alert('Successfully Added!'); </script>";
		redirect('enduser', 'refresh');

	}

	#READ PR details of scanned PR
	public function bac_scanPR(){
		// $bona = $_POST['scanPR'];
		$data['prinfo'] = $this->docutrackingmodel->scanned_PRdetails($this->input->post('scanPR'));
		// $lyle = $this->docutrackingmodel->func1($bona);
		if($data['prinfo']['result']== 0){
			echo "<script type='text/javascript'>alert('No Data Found!');</script>";
			redirect('bac', 'refresh');
		}
		else{
			$sequence = $this->docutrackingmodel->checkSequence($this->input->post('scanPR'));
			// $sequence+1 to get the next location 

			if(($sequence+1) == $_SESSION["admin_office_ID"]){
				$this->docutrackingmodel->update_scannedPR($this->input->post('scanPR'),$_SESSION["admin_user_ID"],$_SESSION["admin_office_ID"]);
				$data['bacpending'] = $this->docutrackingmodel->bac_pending(); 
				$data['procpending'] = $this->docutrackingmodel->proc_pending();
				$data['bacongoing'] = $this->docutrackingmodel->bac_ongoing(); 
				$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
				$data['pr_done'] = $this->docutrackingmodel->PRdone(); 
				// 
				echo "<script type='text/javascript'>alert('Scanned Successfully at BAC Office!!'); </script>";				
				$this->load->view('bac/nav');
				$this->load->view('bac/bac_qr',$data);
				$this->load->view('footer_home');
			}
			else{
				if($sequence == NULL){
					// add here notificaion for bac
					$wrongSeq = 'Wrong Sequence';
					$result = $this->docutrackingmodel->bac_addNotif($this->input->post('scanPR'),$wrongSeq,$_SESSION["admin_office_ID"]);
					if($result){
						echo "<script type='text/javascript'>alert('Wrong Sequence! Return to BAC Office!!'); </script>";
						redirect('bac', 'refresh');
					}
					else{
						echo "<script type='text/javascript'>alert('ERROR!!'); </script>";		
						redirect('bac', 'refresh');
					}
				}
				else{
					$wrongSeq = 'Wrong Sequence';
					$result = $this->docutrackingmodel->bac_addNotif($this->input->post('scanPR'),$wrongSeq,$_SESSION["admin_office_ID"]);
					echo "<script type='text/javascript'>alert('Wrong Sequence! Return to previous office!!'); </script>";
					redirect('bac', 'refresh');
				}
				//dagdag sa notif database
				// kung anong PR ung mali, at kung nakaninong office
			}
			
		}
	}

	# NOTIFICATION
	public function notification(){
		if(isset($_POST['view'])){
			if($_POST["view"] != ''){
			    $this->docutrackingmodel->update_notif();
			}
		$result = $this->docutrackingmodel->readNotif();
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
		$count = $this->docutrackingmodel->checkNotif();
		$data = array(
		    'notification' => $output,
		    'unseen_notification'  => $count[0]->unseenNotif
		);
		echo json_encode($data);
		}
	}
}
?>
