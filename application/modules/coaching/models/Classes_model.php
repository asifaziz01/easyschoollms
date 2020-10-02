<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes_model extends CI_Model {
    
	
	// Classrooms
	public function get_classrooms ($coaching_id=0, $limit=0) {
		$this->db->where ('coaching_id', $coaching_id);
		if ($limit > 0) {
			$this->db->limit ($limit);
		}
		$sql = $this->db->get ('coaching_classes');
		return $sql->result_array ();
	}

	public function create_classroom ($coaching_id=0, $id=0) {
		$data['title'] = $this->input->post ('title');
		if ($id > 0) {
			$this->db->set ($data);
			$this->db->where ('id', $id);
			$this->db->where ('coaching_id', $coaching_id);
			$this->db->update ('coaching_classes');
		} else {
			$data['coaching_id'] = $coaching_id;
			$data['created_on'] = time ();
			$data['created_by'] = $this->session->userdata ('member_id');
			$sql = $this->db->insert ('coaching_classes', $data);
		}
	}

	public function delete_classroom ($coaching_id=0, $id=0) {
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('id', $id);
		$sql = $this->db->delete ('coaching_classes');

		$this->db->set ('id', 0);
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('id', $id);
		$sql = $this->db->update ('coaching_class_schedule');
	}

	/*
	// Classrooms
	public function get_classrooms ($coaching_id=0, $limit=0) {
		$this->db->where ('coaching_id', $coaching_id);
		if ($limit > 0) {
			$this->db->limit ($limit);
		}
		$sql = $this->db->get ('coaching_classrooms');
		return $sql->result_array ();
	}

	public function create_classroom ($coaching_id=0, $id=0) {
		$data['title'] = $this->input->post ('title');
		if ($id > 0) {
			$this->db->set ($data);
			$this->db->where ('id', $id);
			$this->db->where ('coaching_id', $coaching_id);
			$this->db->update ('coaching_classrooms');
		} else {
			$data['coaching_id'] = $coaching_id;
			$data['created_on'] = time ();
			$data['created_by'] = $this->session->userdata ('member_id');
			$sql = $this->db->insert ('coaching_classrooms', $data);
		}
	}

	public function delete_classroom ($coaching_id=0, $id=0) {
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('id', $id);
		$sql = $this->db->delete ('coaching_classrooms');

		$this->db->set ('id', 0);
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('id', $id);
		$sql = $this->db->update ('coaching_course_schedules');
	}
	*/
	
} 