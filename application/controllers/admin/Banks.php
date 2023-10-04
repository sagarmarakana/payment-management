<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Banks extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('id');
        $this->form_validation->set_error_delimiters("<div class='error'>", "</div>");
    }

    public function index(){
        $this->data['title'] = 'Banks';
        $this->template->admin_render('admin/banks/index', $this->data);
    }

    public function getBanks(){
        $action = '$1';
        $this->load->library('datatables');
        $this->datatables
            ->select('id, bank_name, account_type, owner_name, internal_account_number')
            ->from('banks');
        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function add(){
        if($_POST){
            $bank = array(
                'bank_name' => $this->input->post('bank_name'),
                'account_type' => $this->input->post('account_type'),
                'login_username' => $this->input->post('login_username'),
                'password' => $this->input->post('password'),
                'owner_name' => $this->input->post('owner_name'),
                'internal_account_number' => $this->input->post('internal_account_number'),
                'linked_phone' => $this->input->post('linked_phone'),
                'linked_email' => $this->input->post('linked_email'),
                'email_password' => $this->input->post('email_password'),
                'login_details' => $this->input->post('login_details'),
                'test_transaction_date' => $this->input->post('test_transaction_date'),
                'test_transaction_utr' => $this->input->post('test_transaction_utr'),
                'test_transaction_amount' => $this->input->post('test_transaction_amount'),
                'created_on' => time()
            );
            if($this->general_model->insert('banks', $bank)){
                $this->session->set_flashdata('message', array('1', 'Bank Successfully Added'));
            }else{
                $this->session->set_flashdata('message', array('0', 'Something went wrong please try again!'));
            }
            redirect('admin/banks', 'refresh');
        }
        $this->data['title'] = "Add Bank";
        $this->template->admin_render('admin/banks/add', $this->data);
    }

    public function edit($id){
        $id = id_crypt($id, 'd');
        if($_POST){
            $bank = array(
                'bank_name' => $this->input->post('bank_name'),
                'account_type' => $this->input->post('account_type'),
                'login_username' => $this->input->post('login_username'),
                'password' => $this->input->post('password'),
                'owner_name' => $this->input->post('owner_name'),
                'internal_account_number' => $this->input->post('internal_account_number'),
                'linked_phone' => $this->input->post('linked_phone'),
                'linked_email' => $this->input->post('linked_email'),
                'email_password' => $this->input->post('email_password'),
                'login_details' => $this->input->post('login_details'),
                'test_transaction_date' => $this->input->post('test_transaction_date'),
                'test_transaction_utr' => $this->input->post('test_transaction_utr'),
                'test_transaction_amount' => $this->input->post('test_transaction_amount')
            );
            if($this->general_model->update('banks', array('id' => $id), $bank)){
                $this->session->set_flashdata('message', array('1', 'Bank Successfully Updated'));
            }else{
                $this->session->set_flashdata('message', array('0', 'Something went wrong please try again!'));
            }
            redirect('admin/banks', 'refresh');
        }
        $this->data['title'] = "Edit Bank";
        $this->data['bank'] = $this->general_model->getOne('banks', array('id' => $id));
        $this->template->admin_render('admin/banks/edit', $this->data);
    }

    public function delete($id){
        $id = id_crypt($id , 'd');
        $this->general_model->delete('banks', array('id' => $id));
        $this->session->set_flashdata('message', array('1', 'Bank Successfully deleted'));
        redirect('admin/banks', 'refresh');
    }
}