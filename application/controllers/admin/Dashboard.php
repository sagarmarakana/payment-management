<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('id');
        $this->form_validation->set_error_delimiters("<div class='error'>", "</div>");
    }

    public function index()
    {
        $this->data['title']      = 'Dashboard';
        $user_id = $this->user_id;
        $time = strtotime(date('Y-m-d').'01:01:00');
        $this->template->admin_render('admin/dashboard/index', $this->data);
    }
}
