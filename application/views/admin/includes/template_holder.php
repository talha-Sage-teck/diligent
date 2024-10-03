<?php defined('BASEPATH') OR exit('No direct script access allowed');

if($includehf == TRUE)
$this->load->view($template_view.'/includes/header'); ?>
<!--<div id="wrapper">-->
<!-- Sidebar -->
<?php //$this->load->view('common/navigation'); ?>      

<?php $this->load->view($template_view.'/'.$pagecontent); ?> 

<!--</div>-->
<!-- /#wrapper -->

<?php 
if($includehf == TRUE)
$this->load->view($template_view.'/includes/footer'); ?>
    
