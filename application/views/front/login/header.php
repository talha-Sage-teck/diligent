<!doctype html>
<html lang="en" class="default-style layout-fixed layout-navbar-fixed">
    <head>
    <?php echo $before_head_top ?>
    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link href="<?php echo base_url('assets/public/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/public/css/datepicker3.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/public/css/styles.css')?>" rel="stylesheet">
    <!--[if lt IE 9]>
	<script src="<?php echo base_url('assets/public/js/html5shiv.js')?>"></script>
	<script src="<?php echo base_url('assets/public/js/respond.min.js')?>"></script>
	<![endif]-->
    <title>
    <?=$page_title ?>
    </title>
    <meta name="keywords" content="<?php echo $meta_keywords ?>">
    <meta name="description" content="<?php echo $meta_description ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon.png')?>">
    <script type="text/javascript">
    var siteUrl = '<?php echo site_url() ?>';
	var baseUrl = '<?php echo base_url() ?>';
    </script>
    <?php echo $before_head ?>
    </head>
    <body>