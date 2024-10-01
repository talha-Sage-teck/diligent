<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Inspector extends Front_Controller
{
//	protected $loopcount;
//	protected $repeatloop = TRUE;
//	public $loopreturn = TRUE;
 
  function __construct()
  {
    parent::__construct();
	$this->load->model('users_model');
	$this->load->model('inspection_model');		
  }
 
  public function index()
  {
	$data = array();	
	$data['total_inspections'] = $this->inspection_model->total_records(array("prepared_by" => $this->user_id));
	$data['total_accepted'] = "";
	$data['total_rejected'] = "";
	$data['total_reprice'] = "";
	
	$this->renderView('inspector/dashboard', $data);
	  
  }
  
  
}