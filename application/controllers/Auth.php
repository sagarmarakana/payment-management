<?php
defined('BASEPATH') or exit('No direct script access allowed');
include APPPATH . '/third_party/PHPMailer/PHPMailerAutoload.php';
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_error_delimiters("<div class='error'>", "</div>");
    }

    public function index()
    {
        if ($this->session->userdata('id')) {
            redirect('admin/dashboard', 'refresh');
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() === true) {
            $password = md5($this->input->post('password'));
            $email    = $this->input->post('email');
            $where    = array('email' => $email, 'password' => $password);
            $user     = $this->general_model->getOne('users', $where);
            if ($user) {
                if ($user->isActive == 1) {
                $session = array(
                    'id' => $user->id,
                    'name' => $user->name,
                    'user_type' => $user->user_type,
                    'lang' => 'en',
                );
                    if ($user->user_type == 1) {
                        $this->session->set_userdata($session);
                        $this->session->set_flashdata('message', array('1', 'Successfully login'));
                        redirect('admin/dashboard', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('message', array('0', 'Your account is inactive.'));
                    redirect('auth/login', 'refresh');
                }
            } else {
                $this->session->set_flashdata('message', array('0', 'Invalid email or password.'));
                redirect('auth/login', 'refresh');
            }
        }
        $this->data['title'] = 'Login';
        $this->template->auth_render('auth/login', $this->data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', array('1', 'Successfully logout.'));
        redirect('auth/login', 'refresh');
    }

    public function user_login($id) {
        $id = id_crypt($id, 'd');
        $user = $this->general_model->getOne('users', array('id' => $id));
        $session = array(
            'id' => $user->id,
            'name' => $user->name,
            'company_name' => $user->company_name,
            'user_type' => $user->user_type,
            'lang' => 'en',
        );
        if ($user->isActive == 1) {
            $this->session->set_userdata($session);
            $this->session->set_flashdata('message', array('1', 'Successfully login'));
            redirect('admin/dashboard', 'refresh');
        } else {
            $this->session->set_flashdata('message', array('0', 'Your account is inactive.'));
            redirect('auth/login', 'refresh');
        }
    }
}
