<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Classes_actions extends MX_Controller {
	
	public function __construct () { 
	    $config = ['config_coaching'];
	    $models = ['coaching_model', 'classes_model'];
	    $this->common_model->autoload_resources ($config, $models);
	    $this->load->helper ('file');
	}


	public function create_classroom ($coaching_id=0, $room_id=0) {
		$this->form_validation->set_rules ('title', 'Room Title ', 'required');

		if ($this->input->post ('room_id')) {
			$room_id = $this->input->post ('room_id');
		}

		if ($this->form_validation->run () == true) {				
			$id = $this->classes_model->create_classroom ($coaching_id, $room_id);
			$message = 'Classroom created successfully';
			$redirect = site_url('coaching/users/classes/'.$coaching_id);
			$this->message->set ($message, 'success', true) ;
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>true, 'message'=>$message, 'redirect'=>$redirect)));		
		} else {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors() )));
		}
	}

	public function delete_classroom ($coaching_id=0, $room_id=0) {		
		$this->classes_model->delete_classroom ($coaching_id, $room_id);
		$this->message->set ("Classroom deleted successfully", 'success', true);
		redirect('coaching/users/classess/'.$coaching_id);
	}


}
