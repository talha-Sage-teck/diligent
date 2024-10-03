<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container justify-content-center">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-9 col-md-8 customer-author">
      <div class="text-center"> <i class="fa fa-exclamation-triangle fa-5x text-danger"></i>
        <h1><?php echo (isset($heading)) ? $heading : 'Page Not Found' ?></h1>
        <p>The page you are looking for is not found.</p>
        <p>Try another page or go to home page. <a href="<?php echo site_url() ?>">Home page</a></p>
      </div>
      <!-- /.text-center --> 
    </div>
    <!-- ./col-12 col-lg-9 col-md-8  --> 
  </div>
  <!-- ./row --> 
</div>
