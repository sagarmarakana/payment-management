<style type="text/css">
    img.header-brand-img.desktop-logo.h-100.mb-5 {
    width: 150px;
}
</style>
<div class="page">
   <div class="login-page">
        <div class="col col-login mx-auto">
            <div class="text-center">
                <img src="<?= base_url('assets/images/logowhite.png') ?>" class="header-brand-img desktop-logo h-100 mb-5" alt="Dashlot logo">
            </div>
        </div>
    </div>
    <!-- Container opened -->
    <div class="container">
        <div class="row">
            <div class="col-xl-9 justify-content-center mx-auto text-center">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12 col-lg-7 pr-0 d-none d-lg-block">
                            <img src="<?= base_url('assets/images/photos/login.jpg'); ?>" alt="img" class="br-tl-2 br-bl-2 ">
                        </div>
                        <div class="col-md-12 col-lg-5 pl-0 ">
                            <div class="card-body p-6 about-con pabout">
                                <?php if ($this->session->flashdata('message') !== NULL) {?>
                                    <div class="alert alert-<?php echo $this->session->flashdata('message')['0'] == 1 ? 'success' : 'danger'; ?> alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <?php print_r($this->session->flashdata('message')['1']);?>
                                    </div>
                                <?php }?>
                                <?php $attr = array('id' => 'login-form');?>
                                <?php echo form_open(current_url(), $attr); ?>
                                    <div class="card-title text-center">LOGIN</div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        <?php echo form_error('password'); ?>
                                    </div>
                                    <div class="form-footer mt-1">
                                        <button class="btn btn-success btn-block" type="submit">Sign In</button>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container closed -->
</div>
