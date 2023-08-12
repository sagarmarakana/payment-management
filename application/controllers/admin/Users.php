<?php
defined('BASEPATH') or exit('No direct script access allowed');
include APPPATH . '../vendor/autoload.php';
class Users extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('id');
        $this->form_validation->set_error_delimiters("<div class='error'>", "</div>");
    }

    public function index()
    {
        $this->data['title']      = 'Users';
        $user_id = $this->user_id;
        $this->template->admin_render('admin/users/index', $this->data);
    }

    public function getUsers()
    {
        $action = '$1';
        $this->load->library('datatables');
        $this->datatables
            ->select('users.id, users.name, users.email, users.qr_image')
            ->from('users')
            ->where('users.user_type !=', 1);
        $this->datatables->add_column("Actions", $action, "users.id");
        echo $this->datatables->generate();
    }

    public function add()
    {
        if ($_POST) {

            $google2fa = new \PragmaRX\Google2FA\Google2FA();
            $username = $this->input->post('email');
            $secret_key = $google2fa->generateSecretKey();
            $text = $google2fa->getQRCodeUrl(
            'localhost',
            $username,
            $secret_key
            );
                
            $image_url = 'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl='.$text;

            $data = array(
                'name'              => $this->input->post('name'),
                'user_type'         => 2,
                'email'             => $this->input->post('email'),
                'password'          => md5($this->input->post('password')),
                'qr_image'          => $image_url,
                'secret_key'        => $secret_key,
                'isActive'          => 1,
                'created_on'        => time(),
                'updated_on'        => time(),
            );
            if ($this->general_model->insert('users', $data)) {
                $this->session->set_flashdata('message', array('1', 'User Successfully Added'));
            } else {
                $this->session->set_flashdata('message', array('0', 'Something went wrong please try again'));
            }
            redirect('admin/users', 'refresh');
        }
        $this->data['title']      = 'Add User';
        $this->template->admin_render('admin/users/add', $this->data);
    }

    public function edit($id)
    {        
        $id = id_crypt($id, 'd');
        $user = $this->general_model->getOne('users',array('id'=>$id));
        if ($_POST) {
            $update = array(
                'name'              => $this->input->post('name'),
                'updated_on'        => time(),
            );
            if (($this->input->post('password') !== null) && $this->input->post('password') !== "") {
                $update['password'] = md5($this->input->post('password'));
            }
            if ($this->general_model->update('users', array('id' => $id), $update)) {
                $this->session->set_flashdata('message', array('1', 'User Successfully Updated'));
            } else {
                $this->session->set_flashdata('message', array('0', 'Something went wrong please try again'));
            }
            redirect('admin/users', 'refresh');
        }
        $this->data['title']      = 'Edit User';
        $this->data['user']      = $user;
        $this->template->admin_render('admin/users/edit', $this->data);
    }

    public function delete($id) {
        $where['id'] = id_crypt($id, 'd');
        $this->general_model->delete('users', $where);
        $this->session->set_flashdata('message', array('1', 'User Successfully deleted'));
        redirect('admin/users', 'refresh');
    }

    public function check_email() {
        $email = $this->input->post('email');
        $query = $this->general_model->getOne('users', array('email' => $email,"isActive" => 1));
        if ($query) {
            echo "false";
        } else {
            echo "true";
        }
    }
}