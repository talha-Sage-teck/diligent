<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Login extends MY_Controller
{
    /**
     * This is default constructor of the class
     */	 
    public function __construct()
    {
        parent::__construct();		
		$this->template_view = 'admin';
        $this->load->library('ion_auth');
    }
    
	public function index()
	{
	  $this->data['page_title'] = 'Login';
	  if($this->input->post())
	  {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('remember','Remember me','integer');
		if($this->form_validation->run() === TRUE)
		{
		  $remember = (bool) $this->input->post('remember');
		  if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember))
		  {
			$this->_redirect();
		  }
		  else
		  {
			$this->session->set_flashdata('error',$this->ion_auth->errors());
			redirect('admin/login', 'refresh');
		  }
		}
	  }
	  $this->renderView('login', $this->data, FALSE);
	
	}
	
	function _redirect(){
		// user is authenticated if referrer is there
		  if( $this->session->userdata('referrer_url') ) {
			  //Store in a variable so that can unset the session
			  $redirect_back = $this->session->userdata('referrer_url');
			  $this->session->unset_userdata('referrer_url');
			  redirect( $redirect_back );
		  }
		  else{
			  redirect('admin');
			  }
		}
	
	public function logout()
	{
		$this->ion_auth->logout();
		redirect('admin/login');
	}
}

?>