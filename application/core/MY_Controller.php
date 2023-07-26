<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* Load */
        $this->load->library(array('form_validation', 'template'));
        $this->load->helper(array('array', 'language', 'url', 'api'));
        $this->load->model('Model');
        $userData = $this->session->userdata("users");
        Auth_login();
    }

}

class Admin_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (empty($this->session->userdata('id'))) {
			redirect('auth/login', 'refresh');
		}

		$this->user = $this->general_model->getOne('users', array('id' => $this->session->userdata('id')));
	}

}

