<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enrolment_model extends CI_Model {
    
	
	// Get Batches
	public function get_batches ($coaching_id=0, $course_id=0) {
		$today = time ();
	    $this->db->select ('CB.*');
	    $this->db->from ('coaching_course_batches CB');
	    $this->db->where ('CB.coaching_id', $coaching_id);
    	$this->db->where ('CB.course_id', $course_id);
    	$this->db->where ('CB.end_date >', $today);
	    $sql = $this->db->get ();
	    $batches = $sql->result_array ();

	    $result = [];
	    if (! empty ($batches)) {
	    	foreach ($batches as $batch) {
			    $this->db->select ('COUNT(BU.member_id) AS num_users');
			    $this->db->from ('coaching_course_batch_users BU');
			    $this->db->where ('BU.coaching_id', $coaching_id);
		    	$this->db->where ('BU.course_id', $course_id);
		    	$this->db->where ('BU.batch_id', $batch['batch_id']);
			    $sql = $this->db->get ();
			    $row = $sql->row_array ();
			    $num_users = $row['num_users'];
			    $batch['num_users'] = $num_users;
			    $result[] = $batch;
	    	}
	    }

	    return $result;
	}
	
	// Get single batch details
	public function get_batch ($coaching_id=0, $course_id=0, $batch_id=0) {
	    $this->db->where ('coaching_id', $coaching_id);
	    if ($course_id > 0) {
	    	$this->db->where ('course_id', $course_id);
		}
	    $this->db->where ('batch_id', $batch_id);
	    $sql = $this->db->get ('coaching_course_batches');
	    return $sql->row_array ();
	}
	
	public function my_batches ($coaching_id=0, $member_id=0) {
		$this->db->select ('B.*');
		$this->db->from ('coaching_course_batch_users MB');
		$this->db->join ('coaching_course_batches B', 'B.batch_id=MB.batch_id');
		$this->db->where ('MB.member_id', $member_id);
		$this->db->where ('MB.coaching_id', $coaching_id);
		$sql = $this->db->get ();
		//$this->db->last_query ();
		//exit;
		if  ($sql->num_rows () > 0 ) {
			$result = $sql->result_array ();
		}else{
			$result = false;
		}

		return $result;
	}


	public function batch_users ($coaching_id=0, $course_id=0, $batch_id=0) {
		$this->db->select ('M.*, SR.description, MB.enroled_on');
		$this->db->from ('coaching_course_batch_users MB, sys_roles SR');
		$this->db->join ('members M', 'MB.member_id=M.member_id');
		$this->db->where ('SR.role_id=M.role_id');
		$this->db->where ('MB.batch_id', $batch_id);
		$this->db->where ('MB.course_id', $course_id);
		$this->db->where ('MB.coaching_id', $coaching_id);
		$sql = $this->db->get ();
		if  ($sql->num_rows () > 0 ) {
			$result = $sql->result_array ();
		}else{
			$result = false;
		}		
		return $result;
	}
	

	// Check if user in batch
	public function user_in_batch ($coaching_id=0, $course_id=0, $member_id=0, $batch_id=0) {
	    $this->db->where ('coaching_id', $coaching_id);
	    $this->db->where ('course_id', $course_id);
	    $this->db->where ('batch_id', $batch_id);
	    $this->db->where ('member_id', $member_id);
	    $sql = $this->db->get ('coaching_batch_users');
	    return $sql->row_array ();
	}	
	
	public function get_course_instructors ($coaching_id=0, $course_id=0) {
		$this->db->select ('M.member_id, M.first_name, M.last_name, M.role_id');
		$this->db->from ('coaching_course_teachers CC');
		$this->db->join ('members M', 'CC.member_id=M.member_id');
		$this->db->where ('CC.coaching_id', $coaching_id);
		$this->db->where ('CC.course_id', $course_id);
		$sql = $this->db->get ();
		return $sql->result_array ();
	}

	public function get_course_schedule ($coaching_id=0, $course_id=0, $batch_id=0) {
		$this->db->select ('CC.*, CONCAT (M.first_name, M.last_name) AS name'); 
		$this->db->from ('coaching_course_schedules CC');
		$this->db->join ('members M', 'CC.member_id=M.member_id');
		$this->db->where ('CC.coaching_id', $coaching_id);
		$this->db->where ('CC.course_id', $course_id);
		$this->db->where ('CC.batch_id', $batch_id);
		$sql = $this->db->get ();
		return $sql->result_array ();
	}

	public function get_schedule_data ($coaching_id=0, $course_id=0, $batch_id=0, $dow=0) {
		$this->db->select ('CCL.title AS room_name, CC.*, CONCAT (M.first_name, M.last_name) AS name'); 
		$this->db->from ('coaching_course_schedules CC, coaching_classrooms CCL');
		$this->db->join ('members M', 'CC.member_id=M.member_id');
		$this->db->where ('CCL.id=CC.room_id');
		$this->db->where ('CC.coaching_id', $coaching_id);
		$this->db->where ('CC.course_id', $course_id);
		$this->db->where ('CC.batch_id', $batch_id);
		$this->db->where ('CC.dow', $dow);
		$sql = $this->db->get ();
		return $sql->result_array ();
	}


	
	public function get_progress ($member_id=0, $coaching_id=0, $course_id=0){
		$this->db->select ('count(page_id) as total_pages');
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$sql = $this->db->get ('coaching_course_lesson_pages');
		$total_pages = $sql->row_array();
		$this->db->select ('count(progress_id) as total_progress');
		$this->db->where ('member_id', $member_id);
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$sql = $this->db->get ('coaching_course_progress');
		$total_progress = $sql->row_array();
		return array_merge($total_pages, $total_progress);
	}

	public function get_course_progress ($coaching_id=0, $member_id=0, $course_id=0) {
		$result = [];
		$this->db->select ('COUNT(page_id) as total_pages');
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$sql = $this->db->get ('coaching_course_lesson_pages');
		$row = $sql->row_array();
		$result['total_pages'] = $row['total_pages'];

		$this->db->select ('COUNT(progress_id) as total_progress');
		$this->db->where ('member_id', $member_id);
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$sql = $this->db->get ('coaching_course_progress');
		$row = $sql->row_array();
		$result['total_progress'] = $row['total_progress'];
		return $result;
	}

	public function get_lesson_progress ($coaching_id=0, $member_id=0, $course_id=0, $lesson_id=0) {
		$result = [];
		$this->db->select ('COUNT(page_id) as total_pages');
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$this->db->where ('lesson_id', $lesson_id);
		$sql = $this->db->get ('coaching_course_lesson_pages');
		$row = $sql->row_array();
		$result['total_pages'] = $row['total_pages'];

		$this->db->select ('COUNT(progress_id) as total_progress');
		$this->db->where ('member_id', $member_id);
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$this->db->where ('lesson_id', $lesson_id);
		$sql = $this->db->get ('coaching_course_progress');
		$row = $sql->row_array();
		$result['total_progress'] = $row['total_progress'];
		return $result;
	}
}