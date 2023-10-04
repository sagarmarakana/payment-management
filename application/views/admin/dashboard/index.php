<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="app-content icon-content">
    <div class="section">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard');?>">Dashboard</a>
                </li>
            </ol>
        </div>
        <?php if ($this->session->flashdata('message') !== NULL) {?>
            <div class="alert alert-<?php echo $this->session->flashdata('message')['0'] == 1 ? 'success' : 'danger'; ?> alert-dismissible">
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
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>