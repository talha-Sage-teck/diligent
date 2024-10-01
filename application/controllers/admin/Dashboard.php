<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends Front_Controller
{
 
  function __construct()
  {
    parent::__construct();
	$this->load->model('users_model');
	$this->load->model('quotation_model');
  }
 
  public function index()
  {
	$data = array();
	
	$data['reg_users'] = $this->users_model->get_all(array('id <> ' => 1));	
	$data['total_quotations'] = $this->quotation_model->total_records();
	$data['total_accepted'] = $this->quotation_model->total_records(array("status" => "accepted"));
	$data['total_rejected'] = $this->quotation_model->total_records(array("status" => "rejected"));
	$data['total_reprice'] = $this->quotation_model->total_records(array("status" => "reprice"));
		  
    $this->renderView('agent/dashboard', $data);
  }
}