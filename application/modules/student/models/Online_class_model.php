<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Online_class_model extends CI_Model {

	/*--------------- // All Classes // ----------------------*/
	public function get_all_classes ($coaching_id=0, $course_id=0, $batch_id=0) {

		$result = [];
		$this->db->select ('OC.*, C.title');
		$this->db->from ('online_classes OC');
		$this->db->join ('coaching_courses C', 'C.course_id=OC.course_id');
		$this->db->where ('OC.coaching_id', $coaching_id);
		$this->db->where ('OC.course_id', $course_id);
		$sql = $this->db->get ();
		$result = $sql->result_array ();
		return $result;
	}

	public function get_class ($coaching_id=0, $course_id=0, $class_id=0) {
		$this->db->select ('OC.*');
		$this->db->from ('online_classes OC');
		$this->db->where ('OC.coaching_id', $coaching_id);
		$this->db->where ('OC.course_id', $course_id);
		$this->db->where ('OC.id', $class_id);
		$sql = $this->db->get ();
		return $sql->row_array ();
	}

	public function delete_class ($coaching_id=0, $course_id=0, $class_id=0) {
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$this->db->where ('id', $class_id);
		$this->db->delete ('online_classes');
	}

	public function add_class ($coaching_id=0, $course_id=0) {

		$data['coaching_id'] 	= $coaching_id;
		$data['course_id'] 		= $course_id;
		$data['app_type'] 		= $this->input->post ('app_type');
		$data['meeting_url'] 	= $this->input->post ('meeting_url');
		$data['meeting_password'] 	= $this->input->post ('meeting_password');
		$data['created_on'] 	= time ();
		$data['created_by'] 	= $this->session->userdata ('member_id');

		$sql = $this->db->insert ('online_classes', $data);
		$id = $this->db->insert_id ();

		return $id;
	}


}