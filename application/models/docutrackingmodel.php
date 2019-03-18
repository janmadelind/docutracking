<?php

class docutrackingmodel extends CI_Model {
	public function __construct()
	{
		parent::__construct();		
		date_default_timezone_set('Asia/Kuala_Lumpur');		
	}
	#LOGIN verification 
	public function login($username,$password) {
		$query = $this->db->query(
		"SELECT *
		FROM user_type ut
		LEFT JOIN user us ON us.user_type_ID = ut.user_type_ID
		WHERE us.username = '$username' AND us.password = '$password' "
		);
		if($query->num_rows() > 0){		
				return $query->result();
		}
		else{ 
			return NULL;
		}
	}
	#LOGIN for admin
	public function adlogin($username,$password) {
		$query = $this->db->query(
		"SELECT *
		FROM user us 
		INNER JOIN admin_user au ON au.user_ID = us.user_ID
		LEFT JOIN admin_office ao ON ao.admin_office_ID = au.admin_office_ID 
		WHERE us.username = '$username' AND us.password = '$password' "
		);
		if($query->num_rows() > 0){		
				return $query->result();
		}
		else{ 
			return NULL;
		}
	}

	//gawa ko
	public function func1($PR_No) {
		$query = $this->db->query("
			SELECT rps.admin_office_ID ad_id, do.mode_ID mo_id
			FROM route_per_scanned rps 
			INNER JOIN document do ON rps.PR_No = do.PR_No
			WHERE do.PR_No = '$PR_No'
		");
		if($query->num_rows() > 0){		
			return $query->result();
		}
		else{ 
			return NULL;
		}
	}

	public function func2($var1,$var2){
		$query = $this->db->query("
			SELECT fr.ID fr_id, 
			FROM fixed_route fr
			WHERE fr.mode_ID  = '$var1' AND fr.admin_office_ID = '$var2'
		");
		if($query->num_rows() > 0){		
			return $query->result();
		}
		else{ 
			return NULL;
		}
	}

	#LOGIN for end users
	public function eulogin($username,$password) {
		$query = $this->db->query(
		"SELECT *
		FROM user_type ut
		LEFT JOIN user us ON us.user_type_ID = ut.user_type_ID
		INNER JOIN end_user eu ON eu.user_ID = us.user_ID
		LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
		LEFT JOIN department de ON de.department_ID = eu.department_ID
		WHERE ut.user_type_ID = 2 AND us.username = '$username' AND us.password = '$password' "
		);
		if($query->num_rows() > 0){		
				return $query->result();
		}
		else{ 
			return NULL;
		}
	}

	############################################################################### BAC MODEL #########################################################################################

	#COUNT of BAC ongoing PR
	public function bac_ongoing(){
		$query = $this->db->query(
			"SELECT COUNT(DISTINCT rps.PR_No) as bacongoingcount
			FROM route_per_scanned rps
			left JOIN document doc ON doc.PR_No = rps.PR_No
			WHERE doc.status != 'failed' AND 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 2 )
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )		
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )		
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	
	#READ BAC ongoing document details....................................
	public function read_bacongoing(){
		$query = $this->db->query (
			"SELECT DISTINCT doc.*, mp.*,co.*,de.*,tp.*
			FROM route_per_scanned rps
			LEFT JOIN document doc ON doc.PR_No = rps.PR_No
			LEFT JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID
			LEFT JOIN type_of_pr tp ON doc.type_ID = tp.type_ID
			LEFT JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			WHERE doc.status != 'failed' AND 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 2 )
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )		
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}


	#ADD status of PR 
	public function addPR_status($status,$prno){
		$query = $this->db->query (
			"UPDATE document
			SET status = '$status'
			WHERE PR_No = '$prno'"
		);
		return $query;
	}

	#ADD mode and type of PR 
	public function addPR_modetype($mode,$type,$prno){
		$query = $this->db->query (
			"UPDATE document
			SET mode_ID = '$mode', type_ID = '$type'
			WHERE PR_No = '$prno'"
		);
		return $query;
	}
	#ADD new PR into Route
	public function addPR_route1($prno){
		$query = $this->db->query (
			"INSERT INTO route_per_scanned(PR_No,admin_office_ID)
			VALUEs ('$prno','1')"
		);
		return $query;
	}
	#ADD new PR into Route
	public function addPR_route2($prno){
		$query = $this->db->query (
			"INSERT INTO route_per_scanned(PR_No,admin_office_ID)
			VALUEs ('$prno','2')"
		);
		return $query;
	}

	#ADD new PR into Route
	public function addPR_duration($prno,$bac,$proc,$ico,$op,$bdgt,$cashier,$acctg){
		$query = $this->db->query ("INSERT INTO duration(PR_No,admin_office_ID, days)VALUEs ('$prno','1', '$bac')");
		$query = $this->db->query ("INSERT INTO duration(PR_No,admin_office_ID, days)VALUEs ('$prno','4', '$bac')");
		$query = $this->db->query ("INSERT INTO duration(PR_No,admin_office_ID, days)VALUEs ('$prno','2', '$proc')");
		$query = $this->db->query ("INSERT INTO duration(PR_No,admin_office_ID, days)VALUEs ('$prno','3', '$op')");
		$query = $this->db->query ("INSERT INTO duration(PR_No,admin_office_ID, days)VALUEs ('$prno','5', '$proc')");
		$query = $this->db->query ("INSERT INTO duration(PR_No,admin_office_ID, days)VALUEs ('$prno','6', '$ico')");
		$query = $this->db->query ("INSERT INTO duration(PR_No,admin_office_ID, days)VALUEs ('$prno','7', '$bdgt')");
		$query = $this->db->query ("INSERT INTO duration(PR_No,admin_office_ID, days)VALUEs ('$prno','8', '$acctg')");
		$query = $this->db->query ("INSERT INTO duration(PR_No,admin_office_ID, days)VALUEs ('$prno','9', '$cashier')");
		return $query;
	}
	#ADD new PR into Route
	public function addPR_duration1($prno,$bac,$ico,$op,$bdgt,$cashier,$acctg){
		$query = $this->db->query ("INSERT INTO duration(PR_No,admin_office_ID, days)VALUEs ('$prno','1', '$bac')");
		$query = $this->db->query ("INSERT INTO duration(PR_No,admin_office_ID, days)VALUEs ('$prno','4', '$bac')");
		$query = $this->db->query ("INSERT INTO duration(PR_No,admin_office_ID, days)VALUEs ('$prno','3', '$op')");
		$query = $this->db->query ("INSERT INTO duration(PR_No,admin_office_ID, days)VALUEs ('$prno','6', '$ico')");
		$query = $this->db->query ("INSERT INTO duration(PR_No,admin_office_ID, days)VALUEs ('$prno','7', '$bdgt')");
		$query = $this->db->query ("INSERT INTO duration(PR_No,admin_office_ID, days)VALUEs ('$prno','8', '$acctg')");
		$query = $this->db->query ("INSERT INTO duration(PR_No,admin_office_ID, days)VALUEs ('$prno','9', '$cashier')");
		return $query;
	}

	#ADD sequence in route_per_scanned
	public function addPR_seq($modeID,$type,$prno){
		$query = $this->db->query (
			"INSERT INTO route_per_scanned (PR_No, admin_office_ID)
			SELECT doc.PR_No, fr.admin_office_ID
			FROM document doc
			INNER JOIN fixed_route fr ON doc.mode_ID= fr.mode_ID
			WHERE fr.mode_ID = '$modeID' AND fr.type_ID = '$type'  AND doc.PR_No = '$prno'"
		);
		return $query;
	}

	####################################################################### PROCUREMENT MODEL #########################################################################################
	
	#COUNT of PROC ongoing PR
	public function proc_ongoing(){
		$query = $this->db->query(
			"SELECT COUNT(DISTINCT rps.PR_No) as procongoingcount
			FROM route_per_scanned rps
			left JOIN document doc ON doc.PR_No = rps.PR_No
			WHERE doc.status != 'failed'  
			AND 	
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			"
			);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	
	#READ PROC ongoing document details....................................
	public function read_procongoing(){
		$query = $this->db->query (
			"SELECT DISTINCT doc.*, mp.*,co.*,de.*,tp.*
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID
			INNER JOIN type_of_pr tp ON doc.type_ID = tp.type_ID
			INNER JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			WHERE doc.status != 'failed'  
			AND 	
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			ORDER BY doc.PR_No ASC"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}

	#READ new bidders of PR
	public function checkPR_newbidders_transac($bidders,$prno){
		$query = $this->db->query (
			"SELECT *
			FROM bidder_transaction			
			WHERE bidders_ID = (SELECT bidders_ID FROM bidders WHERE bidders_name = '$bidders') AND PR_No = '$prno'
			");
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#READ new bidders of PR
	public function checkPR_oldbidders_transac($bidders,$prno){
		$query = $this->db->query (
			"SELECT *
			FROM bidder_transaction			
			WHERE bidders_ID = '$bidders' AND PR_No = '$prno'
			");
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#READ new bidders of PR
	public function getPR_newbidders_ID($bidders){
		$query = $this->db->query (
			"SELECT bidders_ID FROM bidders WHERE bidders_name = '$bidders'
			");
		
		if($query->num_rows() > 0){
			return $query->result()[0]->bidders_ID;
		}
		else{
			return NULL;
		}
	}
	#READ new bidders of PR
	public function checkPR_newbidders($bidders){
		$query = $this->db->query (
			"SELECT *
			FROM bidders	
			WHERE bidders_name = '$bidders' 
			");
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}

	#INSERT old bidders transac of PR
	public function addPR_oldbidderstrans($data,$bidder,$amount,$date_added){
		$query = $this->db->query (
			"INSERT INTO bidder_transaction(PR_No,bidders_ID,amount,date_added)
			VALUES('$data','$bidder','$amount','$date_added')
			");
		return $query;
	}

	#INSERT new bidders of PR
	public function addPR_newbidders($data,$bidders,$contact,$email){
		$query = $this->db->query (
			"INSERT INTO bidders(bidders_name,contact_no,email)
			VALUES('$bidders','$contact','$email')
			");
		return $query;
	}

	#INSERT new bidder transaction of PR
	public function addPR_newbidderstrans($data,$bidderID,$amount,$date_added){
		$query = $this->db->query (
			"INSERT INTO bidder_transaction(PR_No,bidders_ID,amount,date_added)
			VALUES('$data','$bidderID','$amount','$date_added')
			");
		return $query;
	}

	#INSERT new bidder transaction of PR
	public function updateFinalStatus($data){
		$query = $this->db->query (
			"UPDATE document
			SET status = 'Approved'
			WHERE PR_No = '$data'
			");
		return $query;
	}

	########################################################################## OP MODEL ###############################################################################################

	
	#COUNT of OP PENDING PR   
	public function op_ongoing(){
		$query = $this->db->query(
			"SELECT COUNT(DISTINCT rps.PR_No) as opongoingcount
			FROM route_per_scanned rps
			left JOIN document doc ON doc.PR_No = rps.PR_No
			WHERE doc.status != 'failed' AND 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )		
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )		
			"
			);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#READ of OP PENDING PR
	public function read_opongoing(){
		$query = $this->db->query (
			"SELECT DISTINCT doc.*, mp.*,co.*,de.*,tp.*
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID
			INNER JOIN type_of_pr tp ON doc.type_ID = tp.type_ID
			INNER JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			WHERE doc.status != 'failed' AND 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )		
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )		
			ORDER BY doc.PR_No ASC"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	
	}
	########################################################################## Cashier MODEL ##########################################################################################

	
	#COUNT of cashier ONGOING PR   
	public function cashier_ongoing(){
		$query = $this->db->query(
			"SELECT COUNT(DISTINCT rps.PR_No) as cashierongoingcount
			FROM route_per_scanned rps
			left JOIN document doc ON doc.PR_No = rps.PR_No
			WHERE doc.status != 'failed' AND
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 9 )	
			"
			);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#READ of cashier ONGOING PR
	public function read_cashierongoing(){
		$query = $this->db->query (
			"SELECT DISTINCT doc.*, mp.*,co.*,de.*,tp.*
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID
			INNER JOIN type_of_pr tp ON doc.type_ID = tp.type_ID
			INNER JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			WHERE doc.status != 'failed' AND 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 9 )	
			ORDER BY doc.PR_No ASC"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	
	}
	##################################################################### Accounting MODEL ############################################################################################

	
	#COUNT of Accounting ONGOING PR   
	public function accounting_ongoing(){
		$query = $this->db->query(
			"SELECT COUNT(DISTINCT rps.PR_No) as accountingongoingcount
			FROM route_per_scanned rps
			left JOIN document doc ON doc.PR_No = rps.PR_No
			WHERE doc.status != 'failed' AND 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )		
			"
			);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#READ of Accounting ONGOING PR
	public function read_accountingongoing(){
		$query = $this->db->query (
			"SELECT DISTINCT doc.*, mp.*,co.*,de.*,tp.*
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID
			INNER JOIN type_of_pr tp ON doc.type_ID = tp.type_ID
			INNER JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			WHERE doc.status != 'failed' AND 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			ORDER BY doc.PR_No ASC"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	
	}
	########################################################################## ICO MODEL ##############################################################################################

	
	#COUNT of ICO ONGOING PR   
	public function ICO_ongoing(){
		$query = $this->db->query(
			"SELECT COUNT(DISTINCT rps.PR_No) as ICOongoingcount
			FROM route_per_scanned rps
			left JOIN document doc ON doc.PR_No = rps.PR_No
			WHERE doc.status != 'failed' AND 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			"
			);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#READ of ICO ONGOING PR
	public function read_ICOongoing(){
		$query = $this->db->query (
			"SELECT DISTINCT doc.*, mp.*,co.*,de.*,tp.*
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID
			INNER JOIN type_of_pr tp ON doc.type_ID = tp.type_ID
			INNER JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			WHERE doc.status != 'failed' AND 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			
			ORDER BY doc.PR_No ASC"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	
	}
	##################################################### Budget MODEL ###########################################################################################

	
	#COUNT of Budget ONGOING PR   
	public function budget_ongoing(){
		$query = $this->db->query(
			"SELECT COUNT(DISTINCT rps.PR_No) as budgetongoingcount
			FROM route_per_scanned rps
			left JOIN document doc ON doc.PR_No = rps.PR_No
			WHERE doc.status != 'failed' AND 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			"
			);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#READ of OP ONGOING PR
	public function read_budgetongoing(){
		$query = $this->db->query (
			"SELECT DISTINCT doc.*, mp.*,co.*,de.*,tp.*
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID
			INNER JOIN type_of_pr tp ON doc.type_ID = tp.type_ID
			INNER JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			WHERE doc.status != 'failed' AND 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 5 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )	
			OR 
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )
			OR
			rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 )  
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 )	
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 4 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 7 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 8 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 9 )
			
			ORDER BY doc.PR_No ASC"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	
	}
	######################################################## OTHER FUNCTIONS #####################################################################################

	#COUNT of ALL finished QR 
	public function PRdone(){
		$query = $this->db->query(
			"SELECT  COUNT(DISTINCT r.PR_No) as prdone
			FROM route_per_scanned r
			LEFT JOIN document d ON d.PR_No = r.PR_No
			WHERE r.PR_No != ALL (SELECT PR_No 
			FROM route_per_scanned
			WHERE admin_office_ID <= 9 AND status_if_scanned = 'NS') 
			-- AND d.status = 'Delivered'"
			);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#COUNT FAILED PR
	public function PRfail(){
		$query = $this->db->query(
			"SELECT COUNT(DISTINCT PR_No) as prfail
			FROM document
			WHERE status = 'failed'"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#READ PR details
	public function read_PRdetails($prno){
		$query = $this->db->query (
			"SELECT doc.*, eu.end_user_name, co.college_name, de.department_name, mp.*, tp.*, b.bidders_name
			FROM document doc
			LEFT JOIN mode_of_procurement mp ON mp.mode_ID = doc.mode_ID
			LEFT JOIN type_of_pr tp ON tp.type_ID = doc.type_ID
			LEFT JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			LEFT JOIN bidders b ON doc.bidders_ID = b.bidders_ID
			WHERE  doc.PR_No = '$prno' 
			");
		if($query->num_rows() >0){
			return $query->result();
		}
		else{
			return false;
		}
	}
	#READ bidders of PR
	public function read_PRbidders($prno){
		$query = $this->db->query (
			"SELECT document.PR_No, bt.bidders_ID,bt.amount, bd.bidders_name, bd.contact_no, bd.email, bt.status 
			FROM bidder_transaction bt
			INNER JOIN document ON document.PR_No = bt.PR_No
			INNER JOIN bidders bd ON bd.bidders_ID = bt.bidders_ID
			WHERE document.PR_NO = '$prno'
			");
		if($query->num_rows() >0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	#READ attached files of PR
	public function read_PRattachments($prno){
		$query = $this->db->query (
			"SELECT *
			FROM attached_files af
			INNER JOIN document doc ON doc.PR_No = af.PR_NO
			INNER JOIN admin_office ao ON af.admin_office_ID = ao.admin_office_ID
			INNER JOIN admin_user au ON au.admin_user_ID = af.admin_user_ID
			WHERE doc.PR_No = '$prno'
			");
		if($query->num_rows() >0){
			return $query->result();
		}
		else{
			return false;
		}
	}
	#READ attached files of PR
	public function read_allbidders(){
		$query = $this->db->query (
			"SELECT *
			FROM bidders
			");
		if($query->num_rows() >0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	#READ remarks of PR
	public function read_PRremarks($prno){
		$query = $this->db->query (
			"SELECT re.remarks, au.admin_user_name, ao.admin_office_name,re.date_added
			FROM remarks re
			INNER JOIN document doc ON doc.PR_No = re.PR_NO
			INNER JOIN admin_user au ON re.admin_user_ID = au.admin_user_ID
			INNER JOIN admin_office ao ON au.admin_office_ID = ao.admin_office_ID
			WHERE doc.PR_No = '$prno'
			ORDER BY date_added DESC
			");
		if($query->num_rows() >0){
			return $query->result();
		}
		else{
			return false;
		}
	}


	#READ ALL PR done in process +++++++++++++++++ LYLE+++++++++++++++++++++++
	public function read_PRdone(){
		$query = $this->db->query ("
			SELECT DISTINCT doc.*, mp.*, tp.*, eu.*, de.*, co.*
			FROM route_per_scanned rps
			LEFT JOIN document doc ON doc.PR_No = rps.PR_No
			LEFT JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID
			LEFT JOIN type_of_pr tp ON doc.type_ID = tp.type_ID
			LEFT JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			WHERE rps.PR_No != ALL (SELECT PR_No 
			FROM route_per_scanned
			WHERE admin_office_ID <=7 AND status_if_scanned = 'NS')
			ORDER BY doc.PR_No ASC
		");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
 	}

 	#READ ALL PR done in process
	public function readPR_failed(){
		$query = $this->db->query ("
			SELECT doc.*, eu.end_user_name, co.college_name, de.department_name, mp.mode_of_procurement, tp.type_name
			FROM document doc
			LEFT JOIN mode_of_procurement mp ON mp.mode_ID = doc.mode_ID
			LEFT JOIN type_of_pr tp ON tp.type_ID = doc.type_ID
			INNER JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			WHERE status = 'failed'
			ORDER BY PR_No ASC
		");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
 	}

 	#READ reso num of PR
	public function read_PRresomode($prno){
		$query = $this->db->query ("
			SELECT reso_num
			FROM resolution
			WHERE PR_No='$prno' AND type = 'Mode'
		");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
 	}
 	#READ reso num of PR
	public function getDays($prno,$officeID){
		$query = $this->db->query ("
			SELECT days
			FROM duration
			WHERE PR_No='$prno' AND admin_office_ID = '$officeID'
		");
		if($query->num_rows() > 0){
			return $query->result()[0]->days;
		}
		else{
			return NULL;
		}
 	}
 	#READ reso award of PR
	public function read_PRresoaward($prno){
		$query = $this->db->query ("
			SELECT reso_num
			FROM resolution
			WHERE PR_No='$prno' AND type = 'Award'
		");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
 	}

	#INSERT attached files of PR
	public function add_PRattachments($prno,$attachedfile,$date_added,$added_byoffice,$added_by){
		$query = $this->db->query (
			"INSERT INTO attached_files(PR_No,date_attached,file_name,admin_office_ID,admin_user_ID)
			VALUES ('$prno','$date_added','$attachedfile',$added_byoffice,$added_by)
			");
		return $query;
	}


	#INSERT remarks of PR
	public function add_PRremarks($prno,$remarks,$date_added,$added_by){
		$query = $this->db->query (
			"INSERT INTO remarks(PR_No,date_added,remarks,admin_user_ID)
			VALUES ('$prno','$date_added','$remarks','$added_by')
			");
		return $query;
	}
	#UPDATE amount of PR bidder
	public function updatePR_location($prno,$officeID){
		$query = $this->db->query (
			"UPDATE route_per_scanned
			SET status_if_returned = 'R'
			WHERE PR_No = '$prno' AND admin_office_ID = '$officeID'
			");
		return $query;
	}
	#UPDATE amount of PR bidder
	public function updatePR_location1($prno,$officeID,$date){
		$query = $this->db->query (
			"UPDATE eu_route_per_scanned
			SET status_if_returned = 'R', date_added = '$date', end_user_name = '$officeID'
			WHERE PR_No = '$prno'
			");
		return $query;
	}
	#UPDATE amount of PR bidder
	public function updatePR_bidderamount($prno,$bidderID,$amount){
		$query = $this->db->query (
			"UPDATE bidder_transaction
			SET amount = '$amount'
			WHERE PR_No = '$prno' AND bidders_ID = '$bidderID'
			");
		return $query;
	}
	#UPDATE status of PR bidder
	public function updatePR_bidderstatus($prno,$bidderID,$status){
		$query = $this->db->query (
			"UPDATE bidder_transaction
			SET status = '$status'
			WHERE PR_No = '$prno' AND bidders_ID = '$bidderID'
			");
		return $query;
	}
	#UPDATE status of PR bidder
	public function updatePRdoc_bidderstatus($prno,$bidderID){
		$query = $this->db->query (
			"UPDATE document
			SET bidders_ID = '$bidderID'
			WHERE PR_No = '$prno' 
			");
		return $query;
	}
	#ADD Resolution for Mode of PR bidder
	public function addPR_resomode($prno,$resomode,$date_added,$type){
		$query = $this->db->query (
			"INSERT INTO resolution(reso_num,type,PR_No,date_created)
			VALUES ('$resomode','$type','$prno','$date_added')
			");
		return $query;
	}
	#ADD Resolution for Mode of PR bidder
	public function addPR_resoaward($prno,$resoaward,$date_added,$type){
		$query = $this->db->query (
			"INSERT INTO resolution(reso_num,type,PR_No,date_created)
			VALUES ('$resoaward','$type','$prno','$date_added')
			");
		return $query;
	}

	public function getMode($prno){ //LYLE LYLE
		$query = $this->db->query (
			"SELECT mp.*
			FROM mode_of_procurement mp
			INNER JOIN document doc ON doc.mode_ID = mp.mode_ID
			WHERE doc.PR_No = '$prno'
			ORDER BY doc.PR_No ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result()[0]->admin_office_ID;
		}
		else{
			return NULL;
		}
	}
	public function getModetype($prno){
		$query = $this->db->query (
			"SELECT mp.*,t.*
			FROM mode_of_procurement mp
			INNER JOIN document doc ON doc.mode_ID = mp.mode_ID
			INNER JOIN type_of_pr t ON doc.type_ID = t.type_ID
			WHERE doc.PR_No = '$prno'
			ORDER BY doc.PR_No ASC
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}

	public function getHistoDate($officeID,$prno){
		$query = $this->db->query (
			"SELECT date_scanned, admin_office_ID,PR_No
			FROM route_per_scanned
			WHERE admin_office_ID = $officeID AND PR_No = $prno	"
		);
		if($query->num_rows() > 0){
			return $query->result()[0]->date_scanned;
		}
		else{
			return NULL;
		}
	}
	public function checkHistoSequence($prno){
		$query = $this->db->query (
			"SELECT admin_office_ID,fr.sequence
			FROM fixed_route fr
			WHERE fr.sequence = (SELECT count(status_if_scanned)
			FROM route_per_scanned
			WHERE PR_No = '$prno' AND status_if_scanned = 'S') -1
			AND fr.mode_ID = (SELECT mode_ID FROM document WHERE PR_No = '$prno')
			AND fr.type_ID = (SELECT type_ID FROM document WHERE PR_No = '$prno')
			"
		);
		if($query->num_rows() > 0){
			return $query->result()[0]->admin_office_ID;
		}
		else{
			return NULL;
		}
	}
	public function checkHistoSequence2($prno){
		$query = $this->db->query (
			"SELECT admin_office_ID,fr.sequence
			FROM fixed_route fr
			WHERE fr.sequence = (SELECT count(status_if_scanned)
			FROM route_per_scanned
			WHERE PR_No = '$prno' AND status_if_scanned = 'S') 
			AND fr.mode_ID = (SELECT mode_ID FROM document WHERE PR_No = '$prno')
			AND fr.type_ID = (SELECT type_ID FROM document WHERE PR_No = '$prno')
			"
		);
		if($query->num_rows() > 0){
			return $query->result()[0]->admin_office_ID;
		}
		else{
			return NULL;
		}
	}
	public function histogram($prno){
		$query = $this->db->query (
			"SELECT date_scanned, ao.admin_office_name,PR_No
			FROM route_per_scanned
			INNER JOIN admin_office ao ON ao.admin_office_ID = route_per_scanned.admin_office_ID 
			INNER JOIN fixed_route fr ON ao.admin_office_ID = fr.admin_office_ID 
			WHERE PR_No = $prno 
			AND fr.mode_ID = (SELECT mode_ID FROM document WHERE PR_No = $prno)
			AND fr.type_ID = (SELECT type_ID FROM document WHERE PR_No = $prno)
			ORDER By fr.sequence ASC
"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function addHistoDays($prno,$officeID,$days){
		$query = $this->db->query (
			"UPDATE route_per_scanned
			SET days = $days
			WHERE PR_No = $prno AND admin_office_ID = $officeID"
		);
		return $query;
	}
	public function checkSequence($prno){
		$query = $this->db->query (
			"SELECT admin_office_ID
			FROM fixed_route fr
			WHERE fr.sequence = (SELECT count(status_if_scanned)
			FROM route_per_scanned
			WHERE PR_No = '$prno' AND status_if_scanned = 'S') 
			AND fr.mode_ID = (SELECT mode_ID FROM document WHERE PR_No = '$prno')
			AND fr.type_ID = (SELECT type_ID FROM document WHERE PR_No = '$prno')
			"
		);
		if($query->num_rows() > 0){
			return $query->result()[0]->admin_office_ID;
		}
		else{
			return NULL;
		}
	}
	public function dueDateReport($officeID){
		$query = $this->db->query (
			"SELECT *
			FROM remarks r
			INNER JOIN notification n ON n.PR_No = r.PR_No 
			WHERE remarks LIKE concat('%','(Due Date Notification)','%')
			AND n.admin_office_ID = '$officeID'
			ORDER BY created_at
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function checkIfReturned($prno){
		$query = $this->db->query (
			"SELECT route_per_scanned.admin_office_ID, admin_office.admin_office_name
			FROM route_per_scanned
			INNER JOIN admin_office ON route_per_scanned.admin_office_ID = admin_office.admin_office_ID
			WHERE PR_No = '$prno' AND status_if_returned = 'R'
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function checkIfReturned1($prno){
		$query = $this->db->query (
			"SELECT rps.end_user_name, college_name, department_name
			FROM eu_route_per_scanned rps
			INNER JOIN end_user eu ON eu.end_user_name = rps.end_user_name 
			INNER JOIN colleges c ON eu.college_ID = c.college_ID
			INNER JOIN department d ON d.department_ID = eu.department_ID
			WHERE  rps.PR_No = '$prno' AND status_if_returned = 'R'
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function readIfReturned($prno){
		$query = $this->db->query (
			"SELECT *
			FROM route_per_scanned			
			WHERE PR_No = '$prno' AND status_if_returned = 'R'
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function readIfReturned1($prno){
		$query = $this->db->query (
			"SELECT *
			FROM eu_route_per_scanned			
			WHERE PR_No = '$prno' AND status_if_returned = 'R'
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function updateReturned($prno){
		$query = $this->db->query (
			"UPDATE route_per_scanned
			SET status_if_returned = 'NR'
			WHERE PR_No = '$prno'
			"
		);
		return $query;
		
	}
	public function updateReturned1($prno){
		$query = $this->db->query (
			"UPDATE eu_route_per_scanned
			SET status_if_returned = 'NR'
			WHERE PR_No = '$prno'
			"
		);
		return $query;
		
	}

	public function getDateStart($prno){
		$query = $this->db->query (
			"SELECT date_scanned
			FROM route_per_scanned
			WHERE PR_No = '$prno' AND admin_office_ID = 1
			"
		);
		if($query->num_rows() > 0){
			return $query->result()[0]->date_scanned;
		}
		else{
			return NULL;
		}
	}
	public function getDateEnd($prno){
		$query = $this->db->query (
			"SELECT date_scanned
			FROM route_per_scanned
			WHERE PR_No = '$prno' AND admin_office_ID = 1
			"
		);
		if($query->num_rows() > 0){
			return $query->result()[0]->date_scanned;
		}
		else{
			return NULL;
		}
	}

	public function checkIfReturned_ID($prno){
		$query = $this->db->query (
			"SELECT route_per_scanned.admin_office_ID, admin_office.admin_office_name
			FROM route_per_scanned
			INNER JOIN admin_office ON route_per_scanned.admin_office_ID = admin_office.admin_office_ID
			WHERE PR_No = '$prno' AND status_if_returned = 'R'
			"
		);
		if($query->num_rows() > 0){
			return $query->result()[0]->admin_office_ID;
		}
		else{
			return NULL;
		}
	}
	public function getLoc($officeID){
		$query = $this->db->query (
			"SELECT admin_office_name,admin_office_ID
			FROM admin_office
			WHERE admin_office_ID = '$officeID'
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function checkPR_route($prno){
		$query = $this->db->query (
			"SELECT *
			FROM route_per_scanned
			WHERE PR_No = '$prno' and admin_office_ID <= 2 
			-- AND status_if_scanned = 'NS'
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}

	public function deletePR_route($prno){
		
		$query = $this->db->query (
			"DELETE
			FROM route_per_scanned
			WHERE PR_No = '$prno' and admin_office_ID = 1 AND status_if_scanned = 'NS'
			"
		);
		return $query;
	}
	public function delALL($prno){			
		$this->db->query ("DELETE FROM bidder_transaction WHERE PR_No = '$prno'");		
		$this->db->query ("DELETE FROM attached_files WHERE PR_No = '$prno'");		
		$this->db->query ("DELETE FROM remarks WHERE PR_No = '$prno'");		
		$this->db->query ("DELETE FROM resolution WHERE PR_No = '$prno'");		
	}
	public function deletePR_route1($prno){
		
		$query = $this->db->query (
			"DELETE
			FROM route_per_scanned
			WHERE PR_No = '$prno' and admin_office_ID = 2 AND status_if_scanned = 'NS'
			"
		);
		return $query;
	}
	public function deletePR_oldroute($prno){
		
		$query = $this->db->query (
			"DELETE
			FROM route_per_scanned
			WHERE PR_No = '$prno' and admin_office_ID != 1 
			"
		);
		return $query;
	}
	public function getDEPT($prno){
		$query = $this->db->query (
			"SELECT d.department_ID
			FROM department d
			INNER JOIN end_user eu ON eu.department_ID = d.department_ID
			INNER JOIN document dc ON dc.end_user_ID = eu.end_user_ID
			WHERE dc.PR_No = '$prno'
			"
		);
		if($query->num_rows() > 0){
			return $query->result()[0]->department_ID;
		}
		else{
			return NULL;
		}
	}

	#ADD new PR info to documetn table
	public function addPR_details($prno,$amt,$projdesc,$submitted_by,$date_added){
		$query = $this->db->query (
			"INSERT INTO document(PR_No,amount,proj_description,end_user_ID,date_submitted)
			VALUES ('$prno','$amt','$projdesc','$submitted_by','$date_added')"
		);
		return $query;
	}
	#update to be returned to BAC/PROC
	// public function updatePR_returnScan($prno,$officeID){
	// 	$query = $this->db->query (
	// 		"UPDATE route_per_scanned
	// 		SET status_if_scanned = 'NS'
	// 		WHERE PR_No = '$prno' AND admin_office_ID = '$officeID'"
	// 	);
	// 	return $query;
	// }
	#update to be returned to BAC
	public function updatePR_ICOscan($prno,$officeID){
		$query = $this->db->query (
			"UPDATE route_per_scanned
			SET status_if_scanned = 'NS'
			WHERE PR_No = '$prno' AND admin_office_ID = '$officeID'"
		);
		return $query;
	}
	public function update_BAC_dateEnd($prno,$days){
		$query = $this->db->query (
			"SELECT date_scanned
			FROM route_per_scanned
			WHERE PR_No = $prno"
		);
		$date_scanned = $query->result()[0]->date_scanned;
		$date_end = date('Y-m-d H:i:s T', strtotime($date_scanned.' + '.$days.' days')); 
		$query = $this->db->query (
			"UPDATE route_per_scanned
			SET date_end = '$date_end'
			WHERE PR_No = '$prno'"
		);
		return $query;
	}
	############################################################################ QR MODEL #############################################################################################
 	#COUNT all PR_No for New QR
 	public function newQR(){
		$query = $this->db->query (
			"SELECT count(DISTINCT PR_No)+1 as newQR
			FROM document "
		);
		if($query->num_rows() > 0){
			return $query->result()[0]->newQR;
		}
		else{
			return NULL;
		}
	}

 	#READ details of scanned PR ++++++++LYLE+++++++
	public function scanned_PRdetails($prno){
		$query = $this->db->query (
			"SELECT doc.*, eu.end_user_name, co.college_name, de.department_name
			FROM document doc
			INNER JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			WHERE doc.PR_No = '$prno'
			");
		
		$try = $query->row();
		if($query->num_rows() == 0){
			$t['result'] = 0;
		}
		else{
			$t['PR_No'] = $try->PR_No;
			$t['date_submitted'] = $try->date_submitted;
			$t['date_scanned'] = date('Y-m-d H:i:s T');
			$t['proj_description'] = $try->proj_description;
			$t['proj_name'] = $try->proj_name;
			$t['ref_no'] = $try->ref_no;
			$t['department_name'] = $try->department_name;
			$t['college_name'] = $try->college_name;
			$t['amount'] = $try->amount;
			$t['end_user_name'] = $try->end_user_name;
			$t['result'] = 1;
		}
		return $t;
	}
	#UPDATE details of scanned PR 
	public function update_scannedPR($prno,$scanned_by,$scanned_where,$days){
		$date_scanned = date('Y-m-d H:i:s T');
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$date_end = date('Y-m-d H:i:s T', strtotime($date_scanned.' + '.$days.' days')); 
		$query = $this->db->query (
			"UPDATE route_per_scanned
			SET admin_user_ID = '$scanned_by', date_scanned = '$date_scanned', date_end = '$date_end', status_if_scanned = 'S' 
			WHERE PR_No = '$prno' AND admin_office_ID = '$scanned_where'"
		);
		return $query;
	}
	
	########################################################### END USER MODEL ############################################################################
	#COUNT PR submitted by END USER
	public function countPR_eu($id){
		$query = $this->db->query (
			"SELECT COUNT(DISTINCT docu.PR_No) as prsubmitted
 			FROM document docu
			LEFT JOIN mode_of_procurement mp ON docu.mode_ID = mp.mode_ID
			LEFT JOIN end_user eu ON docu.end_user_ID = eu.end_user_ID
			WHERE docu.end_user_ID = '$id'"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}

	#COUNT all done PR submitted by END USER
	public function PRdone_eu($id){
		$query = $this->db->query (
			"SELECT COUNT(DISTINCT rps.PR_No) as prdone
			FROM route_per_scanned rps
			LEFT JOIN document doc ON doc.PR_No = rps.PR_No
			LEFT JOIN end_user eu ON doc.end_user_ID = eu.end_user_ID
			LEFT JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID 
			WHERE rps.PR_No != ALL (SELECT PR_No 
			FROM route_per_scanned
			WHERE admin_office_ID <=3 AND status_if_scanned = 'NS') AND doc.end_user_ID = '$id'
			ORDER BY doc.PR_No ASC"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#COUNT all done PR submitted by END USER
	public function PRfail_eu($id){
		$query = $this->db->query (
			"SELECT COUNT(DISTINCT doc.PR_No) as prfail
			FROM document doc 
			LEFT JOIN end_user eu ON doc.end_user_ID = eu.end_user_ID
			LEFT JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID 
			WHERE doc.status = 'failed' AND doc.end_user_ID = '$id'
			ORDER BY doc.PR_No ASC"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	
	#COUNT all pending PR submitted by END USER
	public function euser_pending($id){
		$query = $this->db->query (
			"SELECT COUNT(DISTINCT rps.PR_No) as prpending
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN end_user eu ON doc.end_user_ID = eu.end_user_ID
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID 
			WHERE doc.end_user_ID = '$id' 
			AND rps.PR_No != ALL (SELECT PR_No 
			FROM route_per_scanned
			WHERE admin_office_ID <=7 AND status_if_scanned = 'S')
			AND doc.status != 'failed' 
			ORDER BY doc.PR_No ASC"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#COUNT all ongoing PR submitted by END USER
	public function euser_ongoing($id){
		$query = $this->db->query (
			"SELECT COUNT(DISTINCT rps.PR_No) as prongoing
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN end_user eu ON doc.end_user_ID = eu.end_user_ID
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID 
			WHERE doc.end_user_ID = '$id' 
			
			ORDER BY doc.PR_No ASC"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#READ PR submitted by END USER
	public function readPR($id){
		$query = $this->db->query (
			"SELECT *
			FROM document docu
			LEFT JOIN mode_of_procurement mp ON docu.mode_ID = mp.mode_ID
			LEFT JOIN end_user eu ON docu.end_user_ID = eu.end_user_ID
			WHERE docu.end_user_ID = '$id'"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#READ all pending PR submitted by END USER
	public function read_PRpending_eu($id){
		$query = $this->db->query (
			"SELECT DISTINCT doc.*, mp.*
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN end_user eu ON doc.end_user_ID = eu.end_user_ID
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID 
			WHERE doc.end_user_ID = '$id' 
			
			ORDER BY doc.PR_No ASC"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}

	#READ all ongoing PR submitted by END USER
	public function read_PRongoing_eu($id){
		$query = $this->db->query (
			"SELECT DISTINCT doc.*, mp.*
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN end_user eu ON doc.end_user_ID = eu.end_user_ID
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID 
			WHERE doc.end_user_ID = '$id' 
			
			ORDER BY doc.PR_No ASC"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}

	#READ all done PR submitted by END USER
	public function read_PRdone_eu($id){
		$query = $this->db->query (
			"SELECT DISTINCT doc.*, mp.*
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN end_user eu ON doc.end_user_ID = eu.end_user_ID
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID 
			WHERE rps.PR_No != ALL (SELECT PR_No 
			FROM route_per_scanned
			WHERE admin_office_ID <=7 AND status_if_scanned = 'NS') AND doc.end_user_ID = '$id'
			ORDER BY doc.PR_No ASC"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#READ all done PR submitted by END USER
	public function read_PRfailed_eu($id){
		$query = $this->db->query (
			"SELECT DISTINCT doc.*, mp.*
			FROM document doc 
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID 
			INNER JOIN end_user eu ON doc.end_user_ID = eu.end_user_ID
			WHERE doc.status ='failed' AND doc.end_user_ID = '$id'
			ORDER BY doc.PR_No ASC"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}

	############################################################# ADMIN OFFICE NOTIFICATION ###########################################################################################
	// INSERT notif 
	public function addNotif($prno,$subj,$officeName,$officeID,$date){		
		if($subj == "Due Date"){
			$message_description = "PR"."$prno"." is due at "."$officeName";
		}
		else if($subj == 'Wrong Sequence'){
			$message_description = "PR "."$prno"." did not went to proper office";
		}
		else if($subj == 'PR Returned'){
			$message_description = "PR "."$prno"." is to be returned to the processing office.";
		}
		$query = $this->db->query (
			"INSERT INTO notification(PR_No, message_subject, message_description,admin_office_ID,created_at)
			VALUES ('$prno', '$subj', '$message_description', '$officeID','$date')

			"
		);
		return $query;
	}
	public function addNotif1($prno,$subj,$officeName,$officeID,$date){
		if($subj == "Due Date"){
			$message_description = "PR"."$prno"." is due at "."$officeName";
		}
		else if($subj == 'Wrong Sequence'){
			$message_description = "PR "."$prno"." did not went to proper office";
		}
		else if($subj == 'PR Returned'){
			$message_description = "PR "."$prno"." is to be returned to the processing office.";
		}
		$query = $this->db->query (
			"INSERT INTO notification(PR_No, message_subject, message_description,admin_office_ID,created_at)
			SELECT '$prno', '$subj', '$message_description', '$officeID','$date' FROM notification WHERE notification.got = 0

			"
		);
		return $query;
	}
	//READ all unseen NOTIF
	public function readNotif($officeID){
		if($officeID!=1 && $officeID!=4){
			$query = $this->db->query (
				"SELECT *
				FROM notification
				WHERE admin_office_ID = '$officeID' 
				AND department_ID = 0 
				AND NOT EXISTS (select * from seen_notif as s INNER JOIN notification ON s.notif_ID = notification.notif_ID where s.notif_ID = notification.notif_ID and s.admin_office_ID = $officeID)
				ORDER BY created_at"
			);
		}
		else{
			$query = $this->db->query (
				"SELECT *
				FROM notification 
				WHERE department_ID = 0 
				AND NOT EXISTS (select * from seen_notif as s INNER JOIN notification ON s.notif_ID = notification.notif_ID where s.notif_ID = notification.notif_ID and s.admin_office_ID = $officeID)
				ORDER BY created_at"
			);
		}
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	
	// READ all NOTIF
	public function readALLNotifBAC($officeID){
		$query = $this->db->query (
			"SELECT *
			FROM notification
			WHERE admin_office_ID = 1 and message_subject != 'Due Date' 	
			ORDER BY created_at"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	// READ all NOTIF
	public function readALLNotif($officeID){
		$query = $this->db->query (
			"SELECT *
			FROM notification
			WHERE admin_office_ID =$officeID
			ORDER BY created_at"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}

	//COUNT all NOTIF
	public function checkNotif($officeID){
		if($officeID!=1 && $officeID!=4){
			$query = $this->db->query (
				"SELECT COUNT(*) as unseenNotif 
				FROM notification as n 
				where department_ID = 0 AND admin_office_ID =$officeID 
				AND NOT EXISTS (select * from seen_notif as s INNER JOIN notification ON s.notif_ID = notification.notif_ID where s.notif_ID = notification.notif_ID and s.admin_office_ID = $officeID)"
			);
		}
		else{
			$query = $this->db->query (
				"SELECT COUNT(*) as unseenNotif 
				FROM notification as n 
				where department_ID = 0 
				AND NOT EXISTS (select * from seen_notif as s INNER JOIN notification ON s.notif_ID = notification.notif_ID where s.notif_ID = notification.notif_ID  and s.admin_office_ID = $officeID)"
			);
		}

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}

	#UPDATE to seen notif
	public function update_notif(){
		$admin_office_ID=$this->session->userdata('admin_office_ID');
		if($admin_office_ID!=1 && $admin_office_ID!=4){
			$query = $this->db->query (
				"SELECT notif_ID as id FROM notification WHERE department_ID = 0 AND admin_office_ID = $admin_office_ID"
			);
		}
		else{
			$query = $this->db->query (
				"SELECT notif_ID as id FROM notification WHERE  department_ID = 0 "
			);
		}
		foreach ($query->result() as $key => $notif) {
			$this->db->query("INSERT INTO seen_notif(notif_ID,admin_office_ID) SELECT $notif->id,$admin_office_ID from seen_notif WHERE not exists( SELECT * from seen_notif where notif_ID=$notif->id AND admin_office_ID=$admin_office_ID) LIMIT 1");
		}
		return true;
	}

	
	public function getDuePR($officeID){
		$query = $this->db->query (
			"SELECT PR_No
			FROM route_per_scanned rps
			WHERE date_end < curdate() AND admin_office_ID = '$officeID' 
			AND status_if_scanned = 'S' 
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function getDuePR1($officeID){
		$query = $this->db->query (
			"SELECT distinct rps.PR_No
			FROM route_per_scanned rps
			INNER JOIN notification ON notification.PR_No = rps.PR_No
			WHERE rps.date_end < curdate() AND rps.admin_office_ID = '$officeID' 
			AND rps.status_if_scanned = 'S' AND notification.got = 0
			"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function updateDuePR(){
		$query = $this->db->query (
			"UPDATE notification
			SET got = 1
			WHERE message_subject = 'Due Date'
			"
		);
		return $query;
	}

	###################################################################END USER NOTIFICATION ##########################################################################################
	// INSERT notif PROC
	public function euser_addNotif($prno,$subj,$deptID,$date){
		$deptName = $this->getDname($deptID);
		$message_description = "PR"."$prno"." of "."$deptName";		
		$query = $this->db->query (
			"INSERT INTO notification(PR_No, message_subject, message_description,department_ID,created_at)
			VALUES ('$prno', '$subj', '$message_description', '$deptID','$date')
			"
		);
		return $query;
	}
	public function getDname($deptID){
		$query = $this->db->query("SELECT department_name FROM department WHERE department_ID = '$deptID'");		
		if($query->num_rows() > 0){
			return $query->result()[0]->department_name;
		}
		else{
			return NULL;
		}
	}
	#READ all unseen euser notif
	public function eu_readNotif($deptID){
		$query = $this->db->query (
			"SELECT *
			FROM notification
			WHERE admin_office_ID = 0 AND department_ID = '$deptID'
			ORDER BY created_at DESC "
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}

	public function eu_checkNotif($deptID){
		$query = $this->db->query (
			"SELECT COUNT(*) as unseenNotif FROM notification as n where department_ID = $deptID AND admin_office_ID = 0 AND NOT EXISTS (select * from eu_seen_notif as s where s.notif_ID = n.notif_ID and s.department_ID = $deptID)"
		);

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#UPDATE to seen notif
	public function eu_update_notif($deptID){
		$query = $this->db->query (
			"SELECT notif_ID as id FROM notification WHERE admin_office_ID = 0 AND department_ID = $deptID"
		);
		foreach ($query->result() as $key => $notif) {
			$this->db->query("INSERT INTO eu_seen_notif(notif_ID,department_ID) SELECT $notif->id,$deptID from eu_seen_notif WHERE not exists( SELECT * from eu_seen_notif where notif_ID=$notif->id AND department_ID=$deptID) LIMIT 1");
		}
		return true;
	}

}
?>
	