<!doctype html>
<html lang="en" class="default-style layout-fixed layout-navbar-fixed">
    <head>
    <?php echo $before_head_top ?>
    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/feather.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-material.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/shreerang-material.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/uikit.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pages/authentication.css')?>">
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
    
    <style>
    body{
		background: #fff;
		}
    </style>
    </head>
    <body>
<div class="page-loader">
      <div class="bg-primary"></div>
    </div>
    
    <div class="authentication-wrapper authentication-2 px-4">
<div class="authentication-inner py-5">
<div class="p-4 p-sm-5">
  
  <div class="d-flex justify-content-center align-items-center pb-2 mb-4">
  <div class="row">
  <div class="col-sm-12">
  <h1 class="display-2 text-center">ERROR!</h1>
  <hr class="mt-0 mb-4">
  
<div class="lead text-center error-description text-danger"><?php echo $error ?></div>
<div class="text-center"><a href="<?php echo site_url() ?>" class="btn btn-primary btn-lg"><i class="feather icon-home"></i> Go to Dashboard</a></div>

<img src="<?php echo base_url('assets/public/images/error-page.png') ?>" class="mx-auto" alt="Error" />
</div>
</div>
  </div>
  
  
</div>

</div>
</div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
	
</body>
</html>







