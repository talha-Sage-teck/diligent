<?php defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends CI_Controller 
{
 public function __construct() 
 {
    parent::__construct(); 
 } 

 public function index() 
 { 
 	$data = array('page_title' => 'My Coin Pay | 404 - Page not found');
    $this->output->set_status_header('404'); 
    $this->load->view('err404', $data);//loading in custom error view
 } 
} 