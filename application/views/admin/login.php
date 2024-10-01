<!DOCTYPE html>
<html lang="en" class="default-style layout-fixed layout-navbar-fixed">

<!-- Mirrored from html.phoenixcoded.net/empire/bootstrap/default/pages_authentication_login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Mar 2020 12:04:09 GMT -->
<head>
<title>Admin Panel </title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Empire is one of the unique admin template built on top of Bootstrap 4 framework. It is easy to customize, flexible code styles, well tested, modern & responsive are the topmost key factors of Empire Dashboard Template" />
<meta name="keywords" content="bootstrap admin template, dashboard template, backend panel, bootstrap 4, backend template, dashboard template, saas admin, CRM dashboard, eCommerce dashboard">
<meta name="author" content="" />
<link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon.ico') ?>">

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

<link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/ionicons.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/linearicons.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/open-iconic.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/pe-icon-7-stroke.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/feather.css') ?>">

<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-material.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/shreerang-material.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/uikit.css') ?>">

<link rel="stylesheet" href="<?php echo base_url('assets/libs/perfect-scrollbar/perfect-scrollbar.css') ?>">

<link rel="stylesheet" href="<?php echo base_url('assets/css/pages/authentication.css') ?>">
</head>
<body>

<div class="page-loader">
<div class="bg-primary"></div>
</div>



<div class="authentication-wrapper authentication-2 ui-bg-cover ui-bg-overlay-container px-4" style="background-image: url('<?php echo base_url('assets/img/bg/21.jpg') ?>');">
<div class="ui-bg-overlay bg-dark opacity-25"></div>
<div class="authentication-inner py-5">
<div class="card">
<div class="p-4 p-sm-5">

<div class="d-flex justify-content-center align-items-center pb-2 mb-4">
<div class="">
<div class="w-100 position-relative">
<img src="<?php echo base_url('assets/public/images/logo/footer-logo.png') ?>" alt="Brand Logo" class="img-fluid">
<div class="clearfix"></div>
</div>
</div>
</div>

<h5 class="text-center text-muted font-weight-normal mb-4">Admin System</h5>
<?php $this->load->helper('form'); ?>
<div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
        <?php
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>                    
            </div>
        <?php }
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>                    
            </div>
        <?php } ?>
<?php 
		  $attributes = array(
		  						'enctype' => "multipart/form-data",
		  						'role' => 'form');
		  echo form_open('', $attributes) ?> 
<div class="form-group">
<label class="form-label">Email</label>
<input type="email" class="form-control" placeholder="Email" name="email" required>
<div class="clearfix"></div>
</div>
<div class="form-group">
<label class="form-label d-flex justify-content-between align-items-end">
<span>Password</span>
</label>
<input type="password" class="form-control" placeholder="Password" name="password" required>
<div class="clearfix"></div>
</div>
<div class="d-flex justify-content-between align-items-center m-0">
<label class="custom-control custom-checkbox m-0">
 <input type="checkbox" class="custom-control-input">
<span class="custom-control-label">Remember me</span>
</label>
<button type="submit" class="btn btn-primary">Sign In</button>
</div>
</form>

</div>

</div>
</div>
</div>
















<script src="<?php echo base_url('assets/js/pace.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/libs/popper/popper.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/js/sidenav.js') ?>"></script>
<script src="<?php echo base_url('assets/js/layout-helpers.js') ?>"></script>
<script src="<?php echo base_url('assets/js/material-ripple.js') ?>"></script>

<script src="<?php echo base_url('assets/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>

<script src=""></script>
<script src="<?php echo base_url('assets/js/analytics.js') ?>"></script>
</body>

<!-- Mirrored from html.phoenixcoded.net/empire/bootstrap/default/pages_authentication_login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Mar 2020 12:04:09 GMT -->
</html>