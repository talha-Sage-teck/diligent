<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Agent extends Front_Controller
{
//	protected $loopcount;
//	protected $repeatloop = TRUE;
//	public $loopreturn = TRUE;
 
  function __construct()
  {
    parent::__construct();
	$this->load->model('users_model');
	$this->load->model('quotation_model');		
  }
 
  public function index()
  {
	$data = array();	
	$data['total_quotations'] = $this->quotation_model->total_records(array("prepared_by" => $this->user_id));
	$data['total_accepted'] = $this->quotation_model->total_records(array("status" => "accepted", "prepared_by" => $this->user_id));
	$data['total_rejected'] = $this->quotation_model->total_records(array("status" => "rejected", "prepared_by" => $this->user_id));
	$data['total_reprice'] = $this->quotation_model->total_records(array("status" => "reprice", "prepared_by" => $this->user_id));
	
	$this->renderView('agent/dashboard', $data);
	  
  }
  
  
}