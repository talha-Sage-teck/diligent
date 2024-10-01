<?php
/**
 * Class : Admin (Admin_Controller)
 * Admin Class to control all admin related operations.
 * @author : Arshad Bashir
 * @version : 1.1
 * @since : 28 March 2019
 */
 
class Admin_Controller extends MY_Controller
{
  public $url_prefix = 'admin/';
  public $admin_id;
   
  function __construct()
  {
    parent::__construct();
	$this->load->library('ion_auth');
	$this->load->model('inbox_model');
    if (!$this->ion_auth->in_group('admin'))
    {
	  $this->session->set_userdata('referrer_url', $this->agent->referrer() ); 
      //redirect them to the login page
      redirect('admin/login', 'refresh');
    }
	$this->admin_id = $this->ion_auth->get_user_id();
	$this->data['current_user'] = $this->ion_auth->user()->row();
	$this->data['current_user_group'] = $this->ion_auth->get_users_groups($this->data['current_user']->id)->row()->description;
	$this->data['page_title'] = get_option('site_title').' - Admin Dashboard';
  }
  
  ///Render view by combining header footer and body content
  protected function renderView($viewName = "", $data = array(), $include_header_footer = TRUE){
		$this->template_view = 'admin';
        parent::renderView($viewName, $data, $include_header_footer );
    }


}