<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Announcements extends MX_Controller {

    var $toolbar_buttons = []; 

	public function __construct () {
	    // Load Config and Model files required throughout Users sub-module
	    $config = [ 'config_coaching', 'config_course'];
	    $models = ['announcements_model', 'courses_model'];

	    $this->common_model->autoload_resources ($config, $models);
	    
        $cid = $this->uri->segment (4);
        
        // Security step to prevent unauthorized access through url
        if ($this->session->userdata ('is_admin') == TRUE) {
        } else {
            if ($cid == true && $this->session->userdata ('coaching_id') <> $cid) {
                $this->message->set ('Direct url access not allowed', 'danger', true);
                redirect ('coaching/home/dashboard');
            }
        }
	}


	public function index ($coaching_id=0, $course_id=0) { 

		$data['coaching_id'] = $coaching_id;
		$data['course_id'] = $course_id;
		$data['page_title']  = 'Announcements';

		
		/*---=== Back Link ===---*/
		if ($course_id > 0) {
			$data['bc'] = array ('Manage'=>'coaching/courses/manage/'.$coaching_id.'/'.$course_id);
		} else {
			if ( USER_ROLE_COACHING_ADMIN === intval($this->session->userdata('role_id')) ):
				$data['bc'] = array ('Dashboard'=>'coaching/home/dashboard/'.$coaching_id);
			else:
				$data['bc'] = array ('Dashboard'=>'coaching/home/teacher/'.$coaching_id);
			endif;
		}

		$data['results'] = $this->announcements_model->get_announcements ($coaching_id, $course_id);
		
		/* --==// Toolbar //==-- */
        $data['toolbar_buttons']['<i class="fa fa-puzzle-piece"></i> All Announcements']= 'coaching/announcements/index/'.$coaching_id.'/'.$course_id;
        $data['toolbar_buttons']['<i class="fa fa-plus-circle"></i> Create Announcement']= 'coaching/announcements/create_announcement/'.$coaching_id.'/'.$course_id;
		
		$data['is_admin'] = $is_admin = USER_ROLE_COACHING_ADMIN === intval($this->session->userdata('role_id'));

		if ($course_id > 0) {
			$data['course'] = $this->courses_model->get_course_by_id ($course_id);
			$data['right_sidebar'] = $this->load->view ('courses/inc/manage_course', $data, true);
		}

		$data['script'] = $this->load->view('announcements/scripts/index', $data, true);
		$this->load->view ( INCLUDE_PATH  . 'header', $data);
		$this->load->view ( 'announcements/index', $data);
		$this->load->view ( INCLUDE_PATH  . 'footer', $data);	
	}

	public function create_announcement ($coaching_id=0, $course_id=0, $announcement_id=0) {

		$data['page_title']  = 'Create Announcements';

		/*Check submit button */
		$data['coaching_id']=$coaching_id;
		$data['announcement_id']=$announcement_id;
		$data['result'] = $this->announcements_model->get_announcement($coaching_id, $course_id, $announcement_id);
		
		/* --==// Toolbar //==-- */
        $data['toolbar_buttons']['<i class="fa fa-puzzle-piece"></i> All Announcements']= 'coaching/announcements/index/'.$coaching_id.'/'.$course_id;
        $data['toolbar_buttons']['<i class="fa fa-plus-circle"></i> Create Announcement']= 'coaching/announcements/create_announcement/'.$coaching_id.'/'.$course_id;
		
		$data['is_admin'] = $is_admin = USER_ROLE_COACHING_ADMIN === intval($this->session->userdata('role_id'));

		$data['bc'] = array ('Coaching Dashboard'=>'coaching/announcements/index/'.$coaching_id.'/'.$course_id);

		if ($course_id > 0) {
			$data['course'] = $this->courses_model->get_course_by_id ($course_id);
			$data['right_sidebar'] = $this->load->view ('courses/inc/manage_course', $data, true);
		}

		/*load registration view form*/
		$data['script'] = $this->load->view('announcements/scripts/create', $data, true);
		$this->load->view ( INCLUDE_PATH  . 'header', $data);
		$this->load->view ( 'announcements/create_announcement',$data);
		$this->load->view ( INCLUDE_PATH  . 'footer', $data);
	}

	public function view_announcement ($coaching_id=0, $announcement_id=0) {

		$data['page_title']  = 'View Announcement';
		$data['bc'] = array ('Dashboard'=>'coaching/announcements/index/'.$coaching_id);
		
		/* Check submit button */
		$data['coaching_id']		= $coaching_id;
		$data['announcement_id']	= $announcement_id;
		$data['result']				= $this->announcements_model->get_announcement($coaching_id, $announcement_id);
		
		/*load registration view form*/
		$data['script'] = $this->load->view('announcements/scripts/create', $data, true);
		$this->load->view ( INCLUDE_PATH  . 'header', $data);
		$this->load->view ( 'announcements/view_announcement',$data);
		$this->load->view ( INCLUDE_PATH  . 'footer', $data);
	}

} 
	
   
	
	
	
	
	
