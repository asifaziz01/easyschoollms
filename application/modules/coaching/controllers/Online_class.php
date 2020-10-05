 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Online_class extends MX_Controller {	

	var $toolbar_buttons = [];

	public function __construct () {		
	    // Load Config and Model files required throughout Users sub-module
	    $config = ['config_coaching', 'config_virtual_class', 'config_course'];
	    $models = ['online_class_model', 'users_model', 'subscription_model', 'courses_model', 'enrolment_model'];
	    $this->common_model->autoload_resources ($config, $models);

	    $this->load->helper ('string'); 

	    $cid = $this->uri->segment (4);
	    $course_id = $this->uri->segment (5);
	    $batch_id = $this->uri->segment (6);
        $this->toolbar_buttons['<i class="fa fa-add"></i> Add Class']= 'coaching/online_class/add_class/'.$cid.'/'.$course_id;
        
        if ($this->session->userdata ('is_admin') == TRUE) {
        } else {
        	// Security step to prevent unauthorized access through url
            if ($cid == true && $this->session->userdata ('coaching_id') <> $cid) {
                $this->message->set ('Direct url access not allowed', 'danger', true);
                redirect ('coaching/home/dashboard');
            }

        	// Check subscription plan expiry
            $coaching = $this->subscription_model->get_coaching_subscription ($cid);
            $today = time ();
            $current_plan = $coaching['subscription_id'];
            if ($today > $coaching['ending_on'] && $this->session->userdata ('role_id') != USER_ROLE_STUDENT) {
            	$this->message->set ('Your subscription has expired. Choose a plan to upgrade', 'danger', true);
            	redirect ('coaching/subscription/browse_plans/'.$cid.'/'.$current_plan);
            }
        }
	}
	
	public function index ($coaching_id=0, $course_id=0, $batch_id=0) {
		
		$is_admin = USER_ROLE_COACHING_ADMIN === intval($this->session->userdata('role_id'));

		$data['is_admin'] 		= $is_admin;
		$data['coaching_id'] 	= $coaching_id;
		$data['course_id'] 		= $course_id;
		$data['batch_id'] 		= $batch_id;
		$member_id 				= $this->session->userdata ('member_id');
		$data['page_title'] 	= 'Online Classes';

		$data['toolbar_buttons'] = $this->toolbar_buttons;
		
		$data['bc'] = array('Manage'=>'coaching/courses/manage/'.$coaching_id.'/'.$course_id);

		$data['class'] = $this->online_class_model->get_all_classes ($coaching_id, $course_id, $batch_id);

		$data['course'] = $this->courses_model->get_course_by_id ($course_id);

        $data['script'] = $this->load->view('virtual_class/scripts/index', $data, true);
		$data['right_sidebar'] = $this->load->view ('courses/inc/manage_course', $data, true);
        $this->load->view(INCLUDE_PATH . 'header', $data);
        $this->load->view('online_class/index', $data);
        $this->load->view(INCLUDE_PATH . 'footer', $data);		
	}

	public function add_class ($coaching_id=0, $course_id=0, $class_id=0) {
		
        if ($this->session->userdata ('role_id') == USER_ROLE_TEACHER ) {
        	$this->message->set ('Not allowed', 'danger', true);
        	redirect ('coaching/online_class/index/'.$coaching_id.'/'.$course_id.'/'.$class_id);
        }

		$data['coaching_id'] = $coaching_id;
		$data['course_id'] = $course_id;
		$data['class_id'] = $class_id;
		$data['page_title'] = 'Add Class';
		$data['bc'] = array('Online Class'=>'coaching/online_class/index/'.$coaching_id.'/'.$course_id.'/'.$class_id);

		$data['toolbar_buttons'] = $this->toolbar_buttons;
		$data['class'] = $this->online_class_model->get_class ($coaching_id, $class_id);

        $this->load->view(INCLUDE_PATH . 'header', $data);
        $this->load->view('online_class/create_class', $data);
        $this->load->view(INCLUDE_PATH . 'footer', $data);
	}
}