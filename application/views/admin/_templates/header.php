<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <!-- Meta data -->
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Favicon-->
        <link rel="icon" href="<?= base_url('assets/images/brand/favicon.png') ?>" type="image/x-icon"/>

        <!-- Title -->
        <title><?php if (isset($title)) {echo $title .' | ';}?> <?php echo $this->config->item('site_title'); ?> </title>
        
        <!-- Bootstrap css -->
        <link href="<?= base_url('assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css'); ?>" rel="stylesheet" />
       
        <!-- Bootstrap-datepicker css -->
        <link rel="stylesheet" href="<?=base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css')?>">

        <!-- Style css -->
        <link href="<?= base_url('assets/css/style.css?v='.time()); ?>" rel="stylesheet" />
        <link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet" />

        <!-- Default css -->
        <link href="<?= base_url('assets/css/default.css'); ?>" rel="stylesheet">
         <link href="<?=base_url('assets/plugins/datatable/dataTables.bootstrap4.min.css')?>" rel="stylesheet" />
        <link href="<?=base_url('assets/plugins/datatable/css/dataTables.bootstrap4.min.css');?>" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
        <link href="<?=base_url('assets/plugins/datatable/responsive.bootstrap4.min.css');?>" rel="stylesheet" />
        <!-- Bootstrap-datepicker css -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css'); ?>">

        <!-- Sidemenu css-->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/sidemenu/icon-sidemenu.css'); ?>">

        <!-- Sidemenu-responsive-tabs css -->
        <link href="<?= base_url('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css'); ?>" rel="stylesheet">

        <!-- P-scroll css -->
        <link href="<?= base_url('assets/plugins/p-scroll/p-scroll.css'); ?>" rel="stylesheet" type="text/css'); ?>">

        <!-- Custom scroll bar css -->
        <link href="<?= base_url('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css'); ?>" rel="stylesheet"/>

        <!-- Select2 Plugin -->
        <link href="<?= base_url('assets/plugins/select2/select2.min.css'); ?>" rel="stylesheet"/>
        
        <!-- Font icons css-->
        <link  href="<?= base_url('assets/css/icons.css'); ?>" rel="stylesheet">

        <!-- Rightsidebar css -->
        <link href="<?= base_url('assets/plugins/sidebar/sidebar.css'); ?>" rel="stylesheet">

        <!-- Color-palette css-->
        <link rel="stylesheet" href="<?= base_url('assets/css/skins.css'); ?>"/>
        <script src="<?=base_url('assets/js/vendors/jquery-3.2.1.min.js');?>"></script>
    </head>
    <body class="app sidebar-mini">

        <!-- Loader -->
        <div id="loading">
            <img src="<?= base_url('assets/images/other/loader.svg'); ?>" class="loader-img" alt="Loader">
        </div>

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">