 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Online_class_actions extends MX_Controller {	

	var $toolbar_buttons = [];

	public function __construct () {		
	    // Load Config and Model files required throughout Users sub-module
	    $config = ['config_coaching', 'config_virtual_class'];
	    $models = ['online_class_model', 'users_model', 'coaching_model', 'enrolment_model'];
	    $this->common_model->autoload_resources ($config, $models);
	    $this->load->helper ('string');

	    $cid = $this->uri->segment (4);
	}


	/*-----===== VC Categories =====-----*/
	public function add_class ($coaching_id=0, $course_id=0) {

		$this->form_validation->set_rules ('meeting_url', 'Meeting Url', 'required|valid_url');

		if ($this->form_validation->run () == true) {
			$id = $this->online_class_model->add_class ($coaching_id, $course_id);
			$message = 'Online class created successfully';
			$redirect = 'coaching/online_class/index/'.$coaching_id.'/'.$course_id;
			$this->message->set ($message, 'success', true);
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>true, 'message'=>$message, 'redirect'=>site_url ($redirect) )));
		} else {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors() )));
		}
	}
	
	// Delete VC Category
	public function delete_class ($coaching_id=0, $course_id=0, $id=0) {
		// Check if this plan is given to any coaching
		$this->online_class_model->delete_class ($coaching_id, $course_id, $id);
		$this->message->set ('Online class deleted successfully', 'success', true);
		redirect ('coaching/online_class/index/'.$coaching_id.'/'.$course_id);
	}


}