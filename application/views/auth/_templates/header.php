<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
      <link href="<?= base_url('assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css') ?>" rel="stylesheet" />
      <!-- Style css -->
      <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" />
      <link href="<?= base_url('assets/css/default.css') ?>" rel="stylesheet" />
      <link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet" />
   </head>
   <body class="app h-100vh">
