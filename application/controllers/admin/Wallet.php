<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Wallet extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('id');
        $this->form_validation->set_error_delimiters("<div class='error'>", "</div>");
    }

    public function index(){
        $this->data['title'] = "Wallet";
        $this->template->admin_render('admin/wallet/index', $this->data);
    }

    public function getWallets(){
        $action = '$1';
        $this->load->library('datatables');
        $this->datatables   
            ->select('wallet.id, banks.bank_name ,wallet.wallet_type, wallet.internal_name, wallet.bhim_upi_id, wallet.bhim_upi_name')
            ->from('wallet')
            ->join('banks', 'banks.id = wallet.account_id');
        $this->datatables->add_column("Actions", $action, "wallet.id");
        echo $this->datatables->generate();
    }

    public function add(){
        if($_POST){
            $data = array(
                'account_id' => $this->input->post('account_id'),
                'wallet_type' => $this->input->post('wallet_type'),
                'internal_name' => $this->input->post('internal_name'),
                'bhim_upi_id' => $this->input->post('bhim_upi_id'),
                'bhim_upi_name' => $this->input->post('bhim_upi_name'),
                'created_on' => time(),
            );
            if($this->general_model->insert('wallet', $data)){
                $this->session->set_flashdata('message', array('1', 'Wallet Successfully Added'));
            }else{
                $this->session->set_flashdata('message', array('0', 'Something went wrong please try latter'));
            }
            redirect('admin/wallet', 'refresh');
        }
        $this->data['title'] = "Add Wallet";
        $this->data['accounts'] = $this->general_model->getAll('banks');
        $this->template->admin_render('admin/wallet/add', $this->data);
    }

    public function edit($id){
        $id = id_crypt($id, 'd');
        if($_POST){
            $data = array(
                'account_id' => $this->input->post('account_id'),
                'wallet_type' => $this->input->post('wallet_type'),
                'internal_name' => $this->input->post('internal_name'),
                'bhim_upi_id' => $this->input->post('bhim_upi_id'),
                'bhim_upi_name' => $this->input->post('bhim_upi_name'),
                'created_on' => time(),
            );
            if($this->general_model->update('wallet', array('id' => $id), $data)){
                $this->session->set_flashdata('message', array('1', 'Wallet Successfully updated'));
            }else{
                $this->session->set_flashdata('message', array('0', 'Something went wrong please try latter'));
            }
            redirect('admin/wallet', 'refresh');
        }
        $this->data['title'] = "Edit Wallet";
        $this->data['wallet'] = $this->general_model->getOne('wallet', array('id' =>  $id));
        $this->data['accounts'] = $this->general_model->getAll('banks');
        $this->template->admin_render('admin/wallet/edit', $this->data);
    }
}