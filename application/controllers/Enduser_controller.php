<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enduser_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('docutrackingmodel');
	}
	public function enduser(){
		$data['euserpending'] = $this->docutrackingmodel->euser_pending($_SESSION['end_user_ID']);
		$data['euserongoing'] = $this->docutrackingmodel->euser_ongoing($_SESSION['end_user_ID']); 
		$data['pr_done'] = $this->docutrackingmodel->PRdone_eu($_SESSION['end_user_ID']); 
		$data['euserPR'] = $this->docutrackingmodel->countPR_eu($_SESSION['end_user_ID']);
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
		$data['title'] = "Failed";
		$this->load->view('enduser/eu_nav');
		$this->load->view('enduser/enduser_table');
		$this->load->view('footer');
	}
	public function enduser_notif(){
		$this->load->view('enduser/eu_nav');
		$this->load->view('notif');
		$this->load->view('footer');
	}
	public function enduser_details($data){
		$det['prdetails'] = $this->docutrackingmodel->read_PRdetails($data);	
		$det['prbidders'] = $this->docutrackingmodel->read_PRbidders($data);	
		$det['prattachements'] = $this->docutrackingmodel->read_PRattachments($data);
		$det['prremarks'] = $this->docutrackingmodel->read_PRremarks($data);	
		$this->load->view('enduser/eu_nav');
		$this->load->view('enduser/eu_details',$det);
		$this->load->view('footer');
	}

}
?>
