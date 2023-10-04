<div class="page">
    <!-- Container opened -->
    <div class="container">
        <div class="row">
            <div class="col-xl-4 justify-content-center mx-auto text-center">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
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
                                        <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control" placeholder="Email">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control" placeholder="Password">
                                        <?php echo form_error('password'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="code" min="6" max="6" class="form-control" placeholder="Enter 2FA code" autocomplete="false">
                                        <?php echo form_error('code'); ?>
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
