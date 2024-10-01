<!DOCTYPE html>
<html lang="en" class="default-style">
<head>
<title><?php echo $page_title; ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Empire is one of the unique admin template built on top of Bootstrap 4 framework. It is easy to customize, flexible code styles, well tested, modern & responsive are the topmost key factors of Empire Dashboard Template" />
<meta name="keywords" content="bootstrap admin template, dashboard template, backend panel, bootstrap 4, backend template, dashboard template, saas admin, CRM dashboard, eCommerce dashboard">
<meta name="author" content="" />
<link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/public/images/favicon.png')?>">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/ionicons.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/linearicons.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/open-iconic.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/pe-icon-7-stroke.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/feather.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-material.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/shreerang-material.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/uikit.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/libs/datatables/datatables.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/libs/flot/flot.css'); ?>">
<link rel="stylesheet" href="<?=base_url('assets/libs/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>">
<script src="<?php echo base_url('assets/js/jquery-3.4.1.min.js') ?>"></script>
</head>
<body>
<div class="page-loader">
  <div class="bg-primary"></div>
</div>
<div class="layout-wrapper layout-2">
<div class="layout-inner">
<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark logo-dark">
  <div class="app-brand demo"> <span class="app-brand-logo demo"> <img src="<?php echo base_url('assets/public/images/logo/logo-admin.png') ?>" alt="Brand Logo" width="150" class="img-fluid"> </span> <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto"> <i class="ion ion-md-menu align-middle"></i> </a> </div>
  <div class="sidenav-divider mt-0"></div>
  <ul class="sidenav-inner py-1">
    <li class="sidenav-item "> <a href="<?php echo admin_url() ?>" class="sidenav-link"> <i class="sidenav-icon feather icon-home"></i>
      <div>Dashboards</div>
      </a> </li>
    <li class="sidenav-item"> <a href="<?php echo admin_url('users') ?>" class="sidenav-link"> <i class="sidenav-icon feather icon-users"></i>
      <div>Users</div>
      </a> </li>
      
      <li class="sidenav-item"> <a href="javascript:" class="sidenav-link sidenav-toggle"> <i class="sidenav-icon feather icon-settings"></i>
      <div>Options</div>
      </a>
      <ul class="sidenav-menu">
        <li class="sidenav-item"> <a href="<?php echo admin_url('options') ?>" class="sidenav-link">
          <div>General</div>
          </a> </li>
          <li class="sidenav-item"> <a href="<?php echo admin_url('options/payment') ?>" class="sidenav-link">
          <div>Payment</div>
          </a> </li>
      </ul>
    </li>
      
      
    <li class="sidenav-item"> <a href="javascript:" class="sidenav-link sidenav-toggle"> <i class="sidenav-icon feather icon-help-circle"></i>
      <div>FAQs</div>
      </a>
      <ul class="sidenav-menu">
        <li class="sidenav-item"> <a href="<?php echo admin_url('faq') ?>" class="sidenav-link">
          <div>List Faq</div>
          </a> </li>
      </ul>
    </li>
    <li class="sidenav-item"> <a href="<?php echo admin_url('inbox') ?>" class="sidenav-link <?php menu_active('inbox')?>"> <i class="sidenav-icon feather icon-mail"></i>
      <div>Inbox Messages
		<?php 
	 $total_notify = $this->inbox_model->notify_admin_chat($this->admin_id);	
		  ?>
		  <span class="badge badge-pill badge-danger"><?php echo $total_notify?></span>
		</div>
      </a> </li>
    <li class="sidenav-item"> <a href="<?php echo admin_url('news') ?>" class="sidenav-link <?php menu_active('news')?>"> <i class="sidenav-icon feather icon-info"></i>
      <div>News</div>
      </a> </li>
      
      <li class="sidenav-item"> <a href="javascript:" class="sidenav-link sidenav-toggle"> <i class="sidenav-icon feather icon-help-circle"></i>
      <div>Withdraw</div>
      </a>
      <ul class="sidenav-menu">
        <li class="sidenav-item"> <a href="<?php echo admin_url('withdraw/?status=2') ?>" class="sidenav-link">
          <div>Approved</div>
          </a> </li>
          <li class="sidenav-item"> <a href="<?php echo admin_url('withdraw/?status=1') ?>" class="sidenav-link">
          <div>Pending Requests</div>
          </a> </li>
      </ul>
    </li>
	  
	  <li class="sidenav-item"> <a href="javascript:" class="sidenav-link sidenav-toggle"> <i class="sidenav-icon feather icon-help-circle"></i>
      <div>Reports</div>
      </a>
      <ul class="sidenav-menu">
        <li class="sidenav-item"> <a href="<?php echo admin_url('reports/deposit') ?>" class="sidenav-link">
          <div>Deposit</div>
          </a> </li>
      </ul>
    </li>
      
      
    <li class="sidenav-divider mb-1"></li>
    <li class="sidenav-header small font-weight-semibold">Pages</li>
    <li class="sidenav-item"> <a href="<?php echo admin_url('pages') ?>" class="sidenav-link"> <i class="sidenav-icon feather icon-file-text"></i>
      <div>Manage Pages</div>
      </a> </li>
    <li class="sidenav-item"> <a href="javascript:" class="sidenav-link sidenav-toggle"> <i class="sidenav-icon feather icon-file-text"></i>
      <div>Home page</div>
      </a>
      <ul class="sidenav-menu">
        <li class="sidenav-item"> <a href="<?php echo admin_url('page_home/update/1') ?>" class="sidenav-link"> <i class="sidenav-icon feather icon-edit"></i>
          <div>Update Home Page</div>
          </a> </li>
        <li class="sidenav-item"> <a href="<?php echo admin_url('testimonials') ?>" class="sidenav-link"> <i class="sidenav-icon feather icon-users"></i>
          <div>Testimonials</div>
          </a> </li>
      </ul>
    </li>
    <li class="sidenav-item"> <a href="<?php echo admin_url('page_about/update/1') ?>" class="sidenav-link"> <i class="sidenav-icon feather icon-file-text"></i>
      <div>Update About Page</div>
      </a> </li>
    <li class="sidenav-item"> <a href="<?php echo admin_url('page_contact/update/1') ?>" class="sidenav-link"> <i class="sidenav-icon feather icon-file-text"></i>
      <div>Update Contact Page</div>
      </a> </li>
    <li class="sidenav-item"> <a href="<?php echo admin_url('investment_packages') ?>" class="sidenav-link"> <i class="sidenav-icon feather icon-settings"></i>
      <div>Manage Packages</div>
      </a> </li>
  </ul>
</div>
<div class="layout-container">
<nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x" id="layout-navbar"> <a href="index.html" class="navbar-brand app-brand demo d-lg-none py-0 mr-4"> <span class="app-brand-logo demo"> <img src="<?php echo base_url('assets/public/images/logo/logo-admin.png') ?>" alt="Brand Logo" width="100" class="img-fluid"> </span> </a>
  <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto"> <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:"> <i class="ion ion-md-menu text-large align-middle"></i> </a> </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse"> <span class="navbar-toggler-icon"></span> </button>
  <div class="navbar-collapse collapse" id="layout-navbar-collapse">
    <hr class="d-lg-none w-100 my-2">
    <div class="navbar-nav align-items-lg-center ml-auto">
      <div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|</div>
      <div class="demo-navbar-user nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle"> <img src="assets/img/avatars/1.png" alt class="d-block ui-w-30 rounded-circle"> <span class="px-1 mr-lg-2 ml-2 ml-lg-0"><?php echo $current_user->first_name.' '.$current_user->last_name; ?></span> </span> </a>
        <div class="dropdown-menu dropdown-menu-right"> <a href="#" class="dropdown-item"><i class="feather icon-clock"></i>
          <?= empty($current_user->last_login) ? "First Time Login" : date(DATE_SHORT,$current_user->last_login); ?>
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo admin_url('profile'); ?>" class="dropdown-item"><i class="feather icon-user"></i> &nbsp; Profile</a>
          <?php
                           if($this->ion_auth->is_admin()){
                           ?>
          <a href="<?php echo admin_url('groups'); ?>" class="dropdown-item"> <i class="feather icon-settings text-muted"></i> &nbsp; Groups</a> <a href="<?php echo admin_url('users'); ?>" class="dropdown-item"> <i class="feather icon-users text-muted"></i> &nbsp; Users</a>
          <?php
                           }
                           ?>
          <div class="dropdown-divider"></div>
          <a href="<?php echo admin_url('login/logout'); ?>" class="dropdown-item"> <i class="feather icon-power text-danger"></i> &nbsp; Log Out</a> </div>
      </div>
    </div>
  </div>
</nav>
<div class="layout-content">
