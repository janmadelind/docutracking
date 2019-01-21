<?php

class docutrackingmodel extends CI_Model {
	public function __construct()
	{
		parent::__construct();				
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

	##################################################################################################
	##############################################BAC#################################################
	##################################################################################################
	#COUNT of BAC pending PR
	public function bac_pending(){
		$query = $this->db->query(
			"SELECT COUNT(DISTINCT PR_No) as bacpendingcount
			FROM route_per_scanned 
			WHERE (PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 1 ) 
			AND PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 2 )
			AND PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 )
			AND PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )
			AND PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ))
			OR  admin_office_ID = 1 AND status_if_scanned = 'NS'

			"
			);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#COUNT of BAC ongoing PR
	public function bac_ongoing(){
		$query = $this->db->query(
			"SELECT COUNT(DISTINCT PR_No) as bacongoingcount
			FROM route_per_scanned rps
			WHERE 
			(
				(
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 2 )
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )	
				)
			OR 
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			OR 
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2)
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			OR 
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			)"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#READ BAC pending document details....................................
	public function read_bacpending(){
		$query = $this->db->query (
			"SELECT DISTINCT doc.*, mp.*,co.*,de.*
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID
			INNER JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			WHERE (rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 ))
			OR  rps.admin_office_ID = 1 AND rps.status_if_scanned = 'NS'
			ORDER BY doc.PR_No ASC"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#READ BAC pending document details....................................
	public function read_bacongoing(){
		$query = $this->db->query (
			"SELECT DISTINCT doc.*, mp.*,co.*,de.*
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID
			INNER JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			WHERE
			(
				(
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 2 )
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )	
				)
			OR 
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			OR 
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2)
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			OR 
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			)"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}

	##################################################################################################
	#############################################PROC#################################################
	##################################################################################################
	
	#COUNT of PROC pending PR  ### NOTE FOR MADZ
	public function proc_pending(){
		$query = $this->db->query(
			"SELECT COUNT(DISTINCT PR_No) as procpendingcount
			FROM route_per_scanned 
			WHERE PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 2 )
			AND PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 )
			AND PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )
			AND PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )"
			);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	#COUNT of PROC ongoing PR
	public function proc_ongoing(){
		$query = $this->db->query(
			"SELECT COUNT(DISTINCT PR_No) as procongoingcount
			FROM route_per_scanned rps
			WHERE
			(
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			OR 
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2)
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			OR 
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			)"
			);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	
	#READ PROC pending document details....................................
	public function read_procpending(){
		$query = $this->db->query (
			"SELECT DISTINCT doc.*, mp.*,co.*,de.*
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID
			INNER JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			WHERE rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
			ORDER BY doc.PR_No ASC"
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
			"SELECT DISTINCT doc.*, mp.*,co.*,de.*
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID
			INNER JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			WHERE
			(
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			OR 
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2)
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			OR 
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			)
			ORDER BY doc.PR_No ASC"
		);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}

	##################################################################################################
	####################################OTHER DETAILS#################################################
	##################################################################################################

	#COUNT of ALL finished QR 
	public function PRdone(){
		$query = $this->db->query(
			"SELECT COUNT(DISTINCT PR_No) as prdone
			FROM route_per_scanned
			WHERE PR_No != ALL (SELECT PR_No 
			FROM route_per_scanned
			WHERE admin_office_ID <=3 AND status_if_scanned = 'NS')"
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
			"SELECT COUNT(DISTINCT PR_No)
			FROM document
			WHERE status = 'F'"
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
			"SELECT doc.PR_No, doc.date_submitted,doc.proj_name, doc.proj_description,doc.ref_no, doc.amount, doc.mode_ID, eu.end_user_name, co.college_name, de.department_name, mp.mode_of_procurement
			FROM document doc
			INNER JOIN mode_of_procurement mp ON mp.mode_ID = doc.mode_ID
			INNER JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			WHERE  doc.PR_No = ".$prno." 
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
			"SELECT bt.amount, bd.bidders_name, bd.contact_no, bd.email 
			FROM bidder_transaction bt
			INNER JOIN document ON document.PR_No = bt.PR_No
			INNER JOIN bidders bd ON bd.bidders_ID = bt.bidders_ID
			WHERE document.PR_NO = ".$prno."
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
			WHERE doc.PR_No = ".$prno."
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

	#INSERT bidders of PR
	public function add_PRbidders($data,$bidders,$contact,$email){
		$query = $this->db->query (
			"INSERT INTO bidders(bidders_name,contact_no,email)
			VALUES('$bidders','$contact','$email')
			");
		return $query;
	}

	#INSERT bidders of PR
	public function add_PRbidderstrans($data,$bidderID,$amount,$date_added){
		$query = $this->db->query (
			"INSERT INTO bidder_transaction(PR_No,bidders_ID,amount,date_added)
			VALUES('$data','$bidderID','$amount','$date_added')
			");
		return $query;
	}

	#INSERT attached files of PR
	public function add_PRattachments($prno,$attachedfile,$date_added){
		$query = $this->db->query (
			"INSERT attached_files(PR_No,date_attached,file_name)
			VALUES ('$prno','$date_added','$attachedfile')
			");
		return $query;
	}

	#READ remarks of PR
	public function read_PRremarks($prno){
		$query = $this->db->query (
			"SELECT re.remarks, au.admin_user_name, ao.admin_office_name,re.date_added
			FROM remarks re
			INNER JOIN document doc ON doc.PR_No = re.PR_NO
			INNER JOIN admin_user au ON re.admin_user_ID = au.admin_user_ID
			INNER JOIN admin_office ao ON au.admin_office_ID = ao.admin_office_ID
			WHERE doc.PR_No = ".$prno."
			");
		if($query->num_rows() >0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	#INSERT remarks of PR
	public function add_PRremarks($prno,$remarks,$date_added,$added_by){
		$query = $this->db->query (
			"INSERT remarks(PR_No,date_added,remarks,admin_user_ID)
			VALUES ('$prno','$date_added','$remarks','$added_by')
			");
		return $query;
	}


	#READ ALL PR done in process
	public function read_PRdone(){
		$query = $this->db->query ("
			SELECT DISTINCT doc.PR_No, doc.date_submitted, doc.proj_description, mp.mode_of_procurement,doc.ref_no, doc.amount
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID 
			WHERE rps.PR_No != ALL (SELECT PR_No 
			FROM route_per_scanned
			WHERE admin_office_ID <=3 AND status_if_scanned = 'NS')
			ORDER BY doc.PR_No ASC
		");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
 	}

	##################################################################################################
	##############################################QR##################################################
	##################################################################################################
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
			"SELECT doc.PR_No, doc.date_submitted,doc.proj_name, doc.proj_description,doc.ref_no, doc.amount, eu.end_user_name, co.college_name, de.department_name
			FROM document doc
			INNER JOIN end_user eu ON eu.end_user_ID = doc.end_user_ID
			LEFT JOIN colleges co ON co.college_ID = eu.college_ID 
			LEFT JOIN department de ON de.department_ID = eu.department_ID
			WHERE doc.PR_No = ".$prno."
			");
		
		$try = $query->row();
		if($query->num_rows() == 0){
			$t['result'] = 0;
		}
		else{
			$t['PR_No'] = $try->PR_No;
			$t['date_submitted'] = $try->date_submitted;
			$t['date_scanned'] = date('Y-m-d H:i:s T', time());;
			$t['proj_description'] = $try->proj_description;
			$t['ref_no'] = $try->ref_no;
			$t['amount'] = $try->amount;
			$t['result'] = 1;
		}
		return $t;
	}
	#UPDATE details of scanned PR 
	public function update_scannedPR($prno,$scanned_by,$scanned_where){
		$date_scanned = date('Y-m-d H:i:s T', time());
		$this->db->query (
			"UPDATE route_per_scanned
			SET admin_user_ID = '$scanned_by', date_scanned = '$date_scanned', status_if_scanned = 'S'
			WHERE PR_No = '$prno' AND admin_office_ID = '$scanned_where'"
		);
	}

	#ADD mode of PR 
	public function addPR_mode($mode,$prno){
		$this->db->query (
			"UPDATE document
			SET mode_ID = '$mode'
			WHERE PR_No = '$prno'"
		);
	}
	#ADD new PR into Route
	public function addPR_route1($prno){
		$this->db->query (
			"INSERT INTO route_per_scanned(PR_No,admin_office_ID)
			VALUE ('$prno','1')"
		);
	}
	#ADD new PR info to documetn table
	public function addPR_details($prno,$projname,$projdesc,$submitted_by,$date_added){
		$this->db->query (
			"INSERT INTO document(PR_No,proj_name,proj_description,end_user_ID,date_submitted)
			VALUE ('$prno','$projname','$projdesc','$submitted_by','$date_added')"
		);
	}
	#ADD sequence in route_per_scanned
	public function addPR_seq($modeID,$prno){
		$this->db->query (
			"INSERT INTO route_per_scanned (PR_No, admin_office_ID)
			SELECT doc.PR_No, fr.admin_office_ID
			FROM document doc
			INNER JOIN fixed_route fr ON doc.mode_ID= fr.mode_ID
			WHERE fr.mode_ID = '$modeID'  AND doc.PR_No = '$prno'"
		);
	}
	##################################################################################################
	############################################END USER##############################################
	##################################################################################################

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
	#COUNT all done PR submitted by END USER
	public function PRdone_eu($id){
		$query = $this->db->query (
			"SELECT COUNT(DISTINCT rps.PR_No) as prdone
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN end_user eu ON doc.end_user_ID = eu.end_user_ID
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID 
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
	
	#COUNT all pending PR submitted by END USER
	public function euser_pending($id){
		$query = $this->db->query (
			"SELECT COUNT(DISTINCT rps.PR_No) as prpending
			FROM route_per_scanned rps
			INNER JOIN document doc ON doc.PR_No = rps.PR_No
			INNER JOIN end_user eu ON doc.end_user_ID = eu.end_user_ID
			INNER JOIN mode_of_procurement mp ON doc.mode_ID = mp.mode_ID 
			WHERE doc.end_user_ID = '$id' 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
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
			AND 
			(
				(
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 2 )
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )	
				)
			OR 
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			OR 
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2)
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			OR 
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			)
			ORDER BY doc.PR_No ASC"
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
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 1 ) 
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 2 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 )
			AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
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
			AND 
			(
				(
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 2 )
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )	
				)
			OR 
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			OR 
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2)
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			OR 
				(	
					rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 1 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 2 )
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 6 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'S' AND admin_office_ID = 3 ) 
					AND rps.PR_No IN (Select PR_No From route_per_scanned where status_if_scanned = 'NS' AND admin_office_ID = 7 )
				)
			)
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
}
?>