<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<div class="app-content icon-content">
    <div class="section">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard');?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url('admin/wallet');?>">Wallet</a></li>
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
                    <?php $attr = array('id' => 'add_wallet');?>
                    <?php echo form_open_multipart(current_url(), $attr); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Account</label>
                                    <select name="account_id" class="form-control select2">
                                        <option value="">Select account</option>
                                        <?php
                                            if($accounts){
                                                foreach ($accounts as $key => $account) {
                                                    echo '<option value="'.$account->id.'">'.$account->bank_name .' - '.$account->owner_name .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type of wallet</label>
                                    <input type="text" name="wallet_type" class="form-control" value="<?php echo set_value('wallet_type'); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Internal Name</label>
                                    <input type="text" name="internal_name" class="form-control" value="<?=set_value('internal_name');?>">
                                    <?php echo form_error('internal_name'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select image to be displayed (QR code)</label>
                                    <input type="file" name="qr_image" class="form-control">
                                    <?php echo form_error('qr_image'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>BHIM UPI ID (भीम यूपीआई आईडी)</label>
                                    <input type="text" name="bhim_upi_id" class="form-control" value="<?=set_value('bhim_upi_id');?>">
                                    <?php echo form_error('bhim_upi_id'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>BHIM UPI Name (भीम यूपीआई आईडी पर नाम)</label>
                                    <input type="text" name="bhim_upi_name" class="form-control" value="<?=set_value('bhim_upi_name');?>">
                                    <?php echo form_error('bhim_upi_name'); ?>
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