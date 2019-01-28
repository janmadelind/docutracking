<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Op_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('docutrackingmodel');
	}
	
	public function op(){
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
		$this->load->view('footer');
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
		$data['title'] = "Failed";
		$this->load->view('procurement/proc_nav');
		$this->load->view('procurement/proc_admin_table');
		$this->load->view('footer');
	}
	public function procurement_notif(){
		$this->load->view('procurement/proc_nav');
		$this->load->view('notif');
		$this->load->view('footer');
	}
	public function procurement_details($data){
		$det['prremarks'] = $this->docutrackingmodel->read_PRremarks($data);	
		$det['prdetails'] = $this->docutrackingmodel->read_PRdetails($data);	
		$det['prbidders'] = $this->docutrackingmodel->read_PRbidders($data);	
		$det['prattachements'] = $this->docutrackingmodel->read_PRattachments($data);
		$det['allbidders'] = $this->docutrackingmodel->read_allbidders();
		$this->load->view('procurement/proc_nav');
		$this->load->view('procurement/proc_details',$det);
		$this->load->view('footer');
	}
	#ADD Reso of Mode of PR
	public function proc_addPR_mode($data){
	
	}

	#ADD Reso of Awards of PR
	public function proc_addPR_awards($data){
	
	}

	#ADD update amount of Bidders
	public function proc_updatePR_amount($data){
	
	}

	#ADD new PR bidders for PR
	public function proc_addPR_oldbidders($data){
		$bidder =$this->input->post('bidder');
		$amount = $this->input->post('amount');	
		$date_added = date('Y-m-d H:i:s T', time());
		$bidderstrans_result = $this->docutrackingmodel->addPR_oldbidderstrans($data,$bidder,$amount,$date_added);
		if($bidderstrans_result){
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
		$bidders_result = $this->docutrackingmodel->addPR_newbidders($data,$bidders,$contact,$email);
		$bidderID = $this->db->insert_id();
		$bidderstrans_result = $this->docutrackingmodel->addPR_newbidderstrans($data,$bidderID,$amount,$date_added);
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

	#READ PR details of scanned PR
	public function proc_scanPR(){
		$data['prinfo'] = $this->docutrackingmodel->scanned_PRdetails($this->input->post('scanPR'));

		if($data['prinfo']['result']== 0){
			echo "<script type='text/javascript'>alert('No Data Found!');</script>";
			redirect('procurement', 'refresh');
		}
		else{
			$sequence = $this->docutrackingmodel->checkSequence($this->input->post('scanPR'));
			// $sequence+1 to get the next location 

			if(($sequence+1) == $_SESSION["admin_office_ID"]){
				$this->docutrackingmodel->update_scannedPR($this->input->post('scanPR'),$_SESSION["admin_user_ID"],$_SESSION["admin_office_ID"]);
				$data['procpending'] = $this->docutrackingmodel->proc_pending();
				$data['procongoing'] = $this->docutrackingmodel->proc_ongoing(); 
				$data['pr_done'] = $this->docutrackingmodel->PRdone();
				echo "<script type='text/javascript'>alert('Scanned Successfully!'); </script>";
				$this->load->view('procurement/proc_nav');
				$this->load->view('procurement/procurement_qr',$data);
				$this->load->view('footer');

			}
			else{
				if($sequence == NULL)
				{
					echo "<script type='text/javascript'>alert('Wrong Sequence!! BAC Office was skipped!! :( '); </script>";
					redirect('procurement', 'refresh');
				}
				else{

					$admin_office_ID = $this->docutrackingmodel->checkSequence2($sequence, $this->input->post('scanPR'));
					echo "<script type='text/javascript'>alert('Wrong Sequence!! <?php echo $admin_office_ID;?>'); </script>";
					redirect('procurement', 'refresh');
				}
				//dagdag sa notif database
				// kung anong PR ung mali, at kung nakaninong office
			}
			
		}
	}
}
?>
