<div class="app-content icon-content">
    <div class="section">
        <!-- Page-header opened -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard');?>"><i class="fa fa-cutlery mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </div>
        <!-- Page-header closed -->
        <?php if ($this->session->flashdata('message') !== null) {?>
            <div class="alert alert-<?php echo $this->session->flashdata('message')['0'] == 1 ? 'success' : 'danger'; ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php print_r($this->session->flashdata('message')['1']);?>
            </div>
        <?php }?>
        <!-- row opened -->
        <div class="row">
            <div class="col-md">
                <div class="card overflow-hidden">
                    <div class="card-header">
                        <h3 class="card-title">Edit Profile</h3>
                    </div>
                    <div class="card-body">
                        <?php $attr = array('id' => 'profile');?>
                        <?php echo form_open_multipart(current_url(), $attr); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group overflow-hidden">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="<?=$user->name?>">
                                    <?php echo form_error('name'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group overflow-hidden">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" readonly value="<?=$user->email?>">
                                    <?php echo form_error('email'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group overflow-hidden">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" value="<?=set_value('password');?>" autocomplete="new-password">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Profile Image</label>
                                    <input type="file" name="profile" class="form-control" placeholder="Select image">
                                    <?php echo form_error('profile'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div><!-- col end -->
        </div>
    </div>
</div>
