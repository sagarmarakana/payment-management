<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<div class="app-content icon-content">
    <div class="section">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard');?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url('admin/banks');?>">Banks</a></li>
                <li class="breadcrumb-item active"><?=$title?></li>
            </ol>
        </div>
        <?php if ($this->session->flashdata('message') !== null) {?>
        <div
            class="alert alert-<?php echo $this->session->flashdata('message')['0'] == 1 ? 'success' : 'danger'; ?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php print_r($this->session->flashdata('message')['1']);?>
        </div>
        <?php }?>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?=$title?></h4>
                    </div>
                    <?php $attr = array('id' => 'add_bank', 'validate' => true);?>
                    <?php echo form_open_multipart(current_url(), $attr); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Bank name (type)</label>
                                    <input type="text" name="bank_name" class="form-control" value="<?php echo set_value('bank_name'); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Account type</label>
                                    <input type="text" name="account_type" class="form-control"
                                        value="<?php echo set_value('account_type'); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Login / Username</label>
                                    <input type="text" name="login_username" class="form-control" value="<?=set_value('login_username');?>">
                                    <?php echo form_error('login_username'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control" value="<?=set_value('password');?>">
                                    <?php echo form_error('password'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Account owner name</label>
                                    <input type="text" name="owner_name" class="form-control" value="<?=set_value('owner_name');?>">
                                    <?php echo form_error('owner_name'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Internal account number</label>
                                    <input type="text" name="internal_account_number" class="form-control" value="<?=set_value('internal_account_number');?>">
                                    <?php echo form_error('internal_account_number'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Linked phone</label>
                                    <input type="text" name="linked_phone" class="form-control" value="<?=set_value('linked_phone');?>">
                                    <?php echo form_error('linked_phone'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Linked e-mail</label>
                                    <input type="text" name="linked_email" class="form-control" value="<?=set_value('linked_email');?>">
                                    <?php echo form_error('linked_email'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>E-mail password</label>
                                    <input type="text" name="email_password" class="form-control" value="<?=set_value('email_password');?>">
                                    <?php echo form_error('email_password'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Login details</label>
                                    <textarea name="login_details" class="form-control" cols="30" rows="5"><?=set_value('login_details');?></textarea>
                                    <?php echo form_error('login_details'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Test transaction date</label>
                                    <input type="text" name="test_transaction_date" class="form-control" value="<?=set_value('test_transaction_date');?>">
                                    <?php echo form_error('test_transaction_date'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Test transaction UTR</label>
                                    <input type="text" name="test_transaction_utr" class="form-control" value="<?=set_value('test_transaction_utr');?>">
                                    <?php echo form_error('test_transaction_utr'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Test transaction Amount</label>
                                    <input type="text" name="test_transaction_amount" class="form-control" value="<?=set_value('test_transaction_amount');?>">
                                    <?php echo form_error('test_transaction_amount'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success mt-1">Submit</button>
                        <a href="<?=base_url('admin/users')?>" class="btn btn-danger mt-1">Cancel</a>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>