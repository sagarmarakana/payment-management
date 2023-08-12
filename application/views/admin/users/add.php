<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<div class="app-content icon-content">
    <div class="section">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard');?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url('admin/users');?>">Users</a></li>
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
                    <?php $attr = array('id' => 'add_user');?>
                    <?php echo form_open_multipart(current_url(), $attr); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="<?php echo set_value('email'); ?>" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group overflow-hidden">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" value="<?=set_value('password');?>" autocomplete="new-password" id="passwords">
                                    <?php echo form_error('password'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group overflow-hidden">
                                    <label>Confirm Password</label>
                                    <input type="password" name="cpassword" class="form-control" value="<?=set_value('cpassword');?>">
                                    <?php echo form_error('cpassword'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success mt-1">Add User</button>
                        <a href="<?=base_url('admin/users')?>" class="btn btn-danger mt-1">Cancel</a>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>