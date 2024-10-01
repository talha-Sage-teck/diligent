<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Groups (GroupsController)
 * User Groups Class to control all user-groups related operations.
 * @author : Arshad Bashir
 * @version : 1.1
 * @since : 28 March 2019
 */ 
class Groups extends Admin_Controller
{ 
  function __construct()
  {
    parent::__construct();

	$this->data['page_title'] = 'Groups';
	$this->data['ptitle'] = 'Groups'; // parent title
	$this->data['action'] = 'list';
	$this->data['pslug'] = 'groups';
	
	if(!$this->ion_auth->in_group('admin'))
    {
      $this->session->set_flashdata('error','You are not allowed to visit the Groups page');
      redirect('admin','refresh');
    }
  }
 
  public function index()
  {
	$this->data['groups'] = $this->ion_auth->groups()->result();
	$this->renderView('groups/list_groups');
  }
  
  public function create()
  {
	$this->data['action'] = 'Create';
	
	$this->form_validation->set_rules('group_name','Group name','trim|required|is_unique[groups.name]');
	$this->form_validation->set_rules('group_description','Group description','trim|required');
   $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div> ');
			
	if($this->form_validation->run()===FALSE)
	{
	  $this->renderView('groups/create_group');
	}
	else
	{
	  $group_name = $this->input->post('group_name');
	  $group_description = $this->input->post('group_description');
	  /// create ion group
	  $this->ion_auth->create_group($group_name, $group_description);
	  $this->session->set_flashdata('error',$this->ion_auth->messages());
	  redirect('admin/groups');
	}
  }
  
  public function edit($group_id = NULL)
  {
	  $this->data['action'] = 'Edit';
	  
	$group_id = $this->input->post('group_id') ? $this->input->post('group_id') : $group_id;
		 
	$this->form_validation->set_rules('group_name','Group name','trim|required');
	$this->form_validation->set_rules('group_description','Group description','trim|required');
	$this->form_validation->set_rules('group_id','Group id','trim|integer|required');
   
	if($this->form_validation->run() === FALSE)
	{
	  if($group = $this->ion_auth->group((int) $group_id)->row())
	  {
		$this->data['group'] = $group;
	  }
	  else
	  {
		$this->session->set_flashdata('error', 'The group doesn\'t exist.');
		redirect('admin/groups');
	  }
	  $this->load->helper('form');
	  $this->renderView('groups/edit_group');
	}
	else
	{
	  $group_name = $this->input->post('group_name');
	  $group_description = $this->input->post('group_description');
	  $group_id = $this->input->post('group_id');
	  $this->ion_auth->update_group($group_id, $group_name, $group_description);
	  $this->session->set_flashdata('error',$this->ion_auth->messages());
	  redirect('admin/groups');
	}
  }
  
  public function delete($group_id = NULL)
  {
	if(is_null($group_id))
	{
	  $this->session->set_flashdata('error','There\'s no group to delete');
	}
	else
	{
	  $this->ion_auth->delete_group($group_id);
	  $this->session->set_flashdata('error',$this->ion_auth->messages());
	}
	redirect('admin/groups');
  }
  
}

?>