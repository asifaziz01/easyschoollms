<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

    public function __construct () {
        $config = ['config_student', 'config_virtual_class', 'config_course'];
        $models = ['virtual_class_model', 'courses_model', 'lessons_model', 'tests_reports', 'tests_model', 'announcements_model', 'enrolment_model', 'online_class_model'];
        $this->common_model->autoload_resources ($config, $models);

        $cid = $this->uri->segment (4);        
        
        // Security step to prevent unauthorized access through url
        if ($this->session->userdata ('is_admin') == TRUE) {
        } else {
            if ($cid == true && $this->session->userdata ('coaching_id') <> $cid) {
                $this->message->set ('Direct url access not allowed', 'danger', true);
                redirect ('student/home/dashboard');
            }
        }
	}

    public function dashboard ($coaching_id=0, $member_id=0) {
		$data['page_title'] = 'Dashboard';
        if ($coaching_id==0) {
            $coaching_id = $this->session->userdata ('coaching_id');
        }
        if ($member_id==0){
            $member_id = $this->session->userdata ('member_id');
        }
        $role_id = $this->session->userdata ('role_id');

        $data['coaching_id'] = $coaching_id;
        $data['member_id'] = $member_id;
        $data['role_id'] = $role_id; 

        $data['batches'] = $batches = $this->enrolment_model->my_batches ($coaching_id, $member_id);

        // Get courses
        $courses = [];
        if (! empty ($batches)) {
            foreach ($batches as $batch) {
                $bc = $this->courses_model->get_courses ($coaching_id, $batch['batch_id']);
                if (! empty ($bc)) {
                    $courses = array_merge( $courses, $bc);
                }
            }
        }
        $data['courses'] = $courses;

        // Get tests
        $my_tests = [];
        if (! empty ($courses)) {
            foreach ($courses as $row) {
                $tests = $this->tests_model->get_all_tests ($coaching_id, $row['course_id']);
                if (! empty ($tests)) {
                    $my_tests = array_merge( $my_tests, $tests);
                }
            }
        }
        $data['my_tests'] = $my_tests;

        // Online Classes
        $oc = [];
        $num_oc = 0;
        if (! empty ($courses)) {
            foreach ($courses as $course) {
                $classes = $this->online_class_model->get_all_classes ($coaching_id, $course['course_id']);
                $count_oc = count ($classes);
                $num_oc = $num_oc + $count_oc;
                $oc[] = $classes;
            }
        }
        $data['online_class'] = $oc;


        $data['classrooms'] = $this->virtual_class_model->my_classroom ($coaching_id, $member_id);
        
        $data['annc'] = $this->announcements_model->get_announcements ($coaching_id);

		$data['dashboard_menu'] = $this->common_model->load_acl_menus ($role_id, 0, MENUTYPE_DASHBOARD);

        $this->load->view (INCLUDE_PATH . 'header', $data);
        $this->load->view ( 'home/dashboard', $data);
        $this->load->view (INCLUDE_PATH . 'footer', $data);
    }
}