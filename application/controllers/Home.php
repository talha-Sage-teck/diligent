<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Home extends Front_Controller
{
//	protected $loopcount;
//	protected $repeatloop = TRUE;
//	public $loopreturn = TRUE;
 
  function __construct()
  {
    parent::__construct();
			
  }
 
  public function index()
  {
	$data = array();	
	
	  if(!$this->user_id){
		  redirect('login');
	  }
	  elseif($this->ion_auth->in_group('admin')){
		  redirect('admin');
	  }
	  elseif($this->ion_auth->in_group('agent')){
		  if($this->session->userdata("error")){
			  $this->session->set_flashdata( 'error', $this->session->userdata("error") );
		  }
		  redirect('agent');
	  }
	  elseif($this->ion_auth->in_group('inspector')){
		  if($this->session->userdata("error")){
			  $this->session->set_flashdata( 'error', $this->session->userdata("error") );
		  }
		  redirect('inspector');
	  }
	  
  }
  
  
  
}