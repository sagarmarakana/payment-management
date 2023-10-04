<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profile extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('id');
        $this->form_validation->set_error_delimiters("<div class='error'>", "</div>");
    }

    
    public function index()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'password', 'required|min_length[5]|matches[cpassword]');
            $this->form_validation->set_rules('cpassword', 'confirm password', 'required');
        }
        $profile_image = '';
        if (isset($_POST) && !empty($_POST)) {

            if (!empty($_FILES['profile']['name'])) {
                /* Conf Image */
                $file_name                     = 'profile_' . time() . rand(100, 999);
                $configImg['upload_path']      = './uploads/profile/';
                $configImg['file_name']        = $file_name;
                $configImg['allowed_types']    = 'png|jpg|jpeg';
                $configImg['max_size']         = 2000;
                $configImg['max_width']        = 2000;
                $configImg['max_height']       = 2000;
                $configImg['file_ext_tolower'] = true;
                $configImg['remove_spaces']    = true;

                $this->load->library('upload', $configImg, 'profile');
                if ($this->profile->do_upload('profile')) {
                    $uploadData    = $this->profile->data();
                    $profile_image = 'uploads/profile/' . $uploadData['file_name'];
                } else {
                    $this->custom_errors['profile'] = $this->profile->display_errors('', '');
                }
            }
        }
        $this->form_validation->set_rules('profile', '', 'callback_image_validation');
        if ($this->form_validation->run() == true) {
            $update = array(
                'name' => $this->input->post('name'),
            );

            if (($this->input->post('password') !== null) && $this->input->post('password') !== "") {
                $update['password'] = md5($this->input->post('password'));
            }

            if (!empty($profile_image)) {
                $update['profile_image'] = $profile_image;
            }
            if ($id = $this->general_model->update('users', array('id' => $this->session->userdata('id')), $update)) {
                $this->session->set_flashdata('message', array('1', 'Profile successfully updated'));
            } else {
                $this->session->set_flashdata('message', array('0', 'Something went wrong please try again'));
            }
            redirect('admin/profile', 'refresh');
        } else {
            $this->data['title'] = "Profile";
            $this->data['user']  = $this->general_model->getOne('users', array('id' => $this->session->userdata('id')));
            $this->template->admin_render('admin/profile/index', $this->data);
        }
    }

    public function image_validation($str)
    {
        #unused $str
        if (isset($this->custom_errors['profile'])) {
            $this->form_validation->set_message('image_validation', $this->custom_errors['profile']);
            return false;
        }
        return true;
    }
}