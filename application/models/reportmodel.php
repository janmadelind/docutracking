<?php

class reportmodel extends CI_Model {
	public function __construct()
	{
		parent::__construct();	
		date_default_timezone_set('Asia/Kuala_Lumpur');		
		
	}
	public function monthly(){
		$query = $this->db->query (
			"SELECT count(document.PR_No) as c, month(document.date_submitted) as m
			FROM document
			GROUP BY month(document.date_submitted)
			ORDER BY document.date_submitted ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function quarterly(){
		$query = $this->db->query (
			"SELECT count(document.PR_No) as c, quarter(document.date_submitted) as m
			FROM document
			GROUP BY quarter(document.date_submitted)
			ORDER BY document.date_submitted ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function pr_per_mode(){ 
		$query = $this->db->query (
			"SELECT count(document.PR_No) as c,  mp.mode_ID  as mp
			FROM document
			INNER JOIN mode_of_procurement mp ON mp.mode_ID = document.mode_ID
			GROUP BY mp.mode_ID 
			ORDER BY document.date_submitted ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function pr_per_college(){ 
		$query = $this->db->query (
			"SELECT count(document.PR_No) as c, c.college_ID as college
			FROM document
			INNER JOIN end_user eu ON eu.end_user_ID = document.end_user_ID
			INNER JOIN colleges c ON eu.college_ID = c.college_ID
			GROUP BY c.college_ID
			ORDER BY document.date_submitted ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function pr_per_dept(){ // all pr
		$query = $this->db->query (
			"SELECT count(document.PR_No) as c, d.department_ID as d
			FROM document
			INNER JOIN end_user eu ON eu.end_user_ID = document.end_user_ID
			INNER JOIN colleges c ON eu.college_ID = c.college_ID
			INNER JOIN department d ON d.department_ID = eu.department_ID
			GROUP BY d.department_ID
			ORDER BY d.department_ID ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	
	public function COS_monthly(){ 
		$query = $this->db->query (
			"SELECT count(document.PR_No) as c, month(document.date_submitted) as m
			FROM document
			INNER JOIN end_user eu ON eu.end_user_ID = document.end_user_ID
			INNER JOIN colleges c ON eu.college_ID = c.college_ID
			WHERE c.college_ID = 1
			GROUP BY month(document.date_submitted)
			ORDER BY document.date_submitted ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function CLA_monthly(){ 
		$query = $this->db->query (
			"SELECT count(document.PR_No) as c, month(document.date_submitted) as m
			FROM document
			INNER JOIN end_user eu ON eu.end_user_ID = document.end_user_ID
			INNER JOIN colleges c ON eu.college_ID = c.college_ID
			WHERE c.college_ID = 2
			GROUP BY month(document.date_submitted)
			ORDER BY document.date_submitted ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function CIE_monthly(){ 
		$query = $this->db->query (
			"SELECT count(document.PR_No) as c, month(document.date_submitted) as m
			FROM document
			INNER JOIN end_user eu ON eu.end_user_ID = document.end_user_ID
			INNER JOIN colleges c ON eu.college_ID = c.college_ID
			WHERE c.college_ID = 3
			GROUP BY month(document.date_submitted)
			ORDER BY document.date_submitted ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function CIT_monthly(){ 
		$query = $this->db->query (
			"SELECT count(document.PR_No) as c, month(document.date_submitted) as m
			FROM document
			INNER JOIN end_user eu ON eu.end_user_ID = document.end_user_ID
			INNER JOIN colleges c ON eu.college_ID = c.college_ID
			WHERE c.college_ID = 4
			GROUP BY month(document.date_submitted)
			ORDER BY document.date_submitted ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function COE_monthly(){ 
		$query = $this->db->query (
			"SELECT count(document.PR_No) as c, month(document.date_submitted) as m
			FROM document
			INNER JOIN end_user eu ON eu.end_user_ID = document.end_user_ID
			INNER JOIN colleges c ON eu.college_ID = c.college_ID
			WHERE c.college_ID = 5
			GROUP BY month(document.date_submitted)
			ORDER BY document.date_submitted ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function CAFA_monthly(){ 
		$query = $this->db->query (
			"SELECT count(document.PR_No) as c, month(document.date_submitted) as m
			FROM document
			INNER JOIN end_user eu ON eu.end_user_ID = document.end_user_ID
			INNER JOIN colleges c ON eu.college_ID = c.college_ID
			WHERE c.college_ID = 6
			GROUP BY month(document.date_submitted)
			ORDER BY document.date_submitted ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	
	
	public function SVPmonthly(){
		$query = $this->db->query (
			"SELECT count(document.PR_No) as c, month(document.date_submitted) as m
			FROM document
			INNER JOIN mode_of_procurement mp ON mp.mode_ID = document.mode_ID
			WHERE mp.mode_ID =1 
			GROUP BY month(document.date_submitted)
			ORDER BY document.date_submitted ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	
	public function Smonthly(){
		$query = $this->db->query (
			"SELECT count(document.PR_No) as c, month(document.date_submitted) as m
			FROM document
			INNER JOIN mode_of_procurement mp ON mp.mode_ID = document.mode_ID
			WHERE mp.mode_ID = 2
			GROUP BY month(document.date_submitted)
			ORDER BY document.date_submitted ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function NPmonthly(){
		$query = $this->db->query (
			"SELECT count(document.PR_No) as c, month(document.date_submitted) as m
			FROM document
			INNER JOIN mode_of_procurement mp ON mp.mode_ID = document.mode_ID
			WHERE mp.mode_ID = 3
			GROUP BY month(document.date_submitted)
			ORDER BY document.date_submitted ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	
	public function DCmonthly(){
		$query = $this->db->query (
			"SELECT count(document.PR_No) as c, month(document.date_submitted) as m
			FROM document
			INNER JOIN mode_of_procurement mp ON mp.mode_ID = document.mode_ID
			WHERE mp.mode_ID = 4
			GROUP BY month(document.date_submitted)
			ORDER BY document.date_submitted ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	
	
}
?>
