<?php

class reportmodel extends CI_Model {
	public function __construct()
	{
		parent::__construct();				
	}
	
	public function countSVPpr(){
		$query = $this->db->query (
			"SELECT mp.mode_of_procurement,document.PR_No,month(document.date_submitted) as mon
			FROM document
			INNER JOIN mode_of_procurement mp ON mp.mode_ID = document.mode_ID
			WHERE mp.mode_ID =1
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function countNPpr(){
		$query = $this->db->query (
			"SELECT mp.mode_of_procurement, document.PR_No, month(document.date_submitted) as mon
			FROM document
			INNER JOIN mode_of_procurement mp ON mp.mode_ID = document.mode_ID
			WHERE mp.mode_ID = 2
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	
	public function monthlyPR(){
		$query = $this->db->query (
			"SELECT PR_No, month(date_submitted) as mon
			FROM document
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function deptcolPR(){
		$query = $this->db->query (
			"SELECT colleges.college_ID, colleges.college_name, department.department_name,department.department_ID, document.PR_No, month(document.date_submitted) as mon,year(curdate()) as yr , document.mode_ID
			FROM document
			INNER JOIN mode_of_procurement mp ON mp.mode_ID = document.mode_ID
			INNER JOIN end_user ON end_user.end_user_ID = document.end_user_ID
			INNER JOIN colleges ON end_user.college_ID = colleges.college_ID
			INNER JOIN department ON end_user.department_ID = department.department_ID
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function deptname(){
		$query = $this->db->query (
			"SELECT department.department_name,department.department_ID
			FROM department
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function colname(){
		$query = $this->db->query (
			"SELECT colleges.college_name,colleges.college_ID
			FROM colleges
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
