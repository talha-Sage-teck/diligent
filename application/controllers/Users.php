<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends Front_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Users';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'users';
        $this->load->model('users_model');
    }

    public function index()
    {
        $users = $this->users_model->get_list();

        $data = array(
            'users_data' => $users
        );

        $this->renderView('users/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'ip_address' ,
		'username' ,
		'password' ,
		'salt' ,
		'email' ,
		'created_on' ,
		'last_login' ,
		'active' ,
		'first_name' ,
		'last_name' ,
		'company' ,
		'phone' ,
		'oauth_provider' ,);
				
	}

    public function read($id) 
    {
        $row = $this->users_model->get_by_id($id);
        if ($row) {			 
			$data['user_info'] = $row;
			$data['user_additional'] = [];
			$data['referred_users'] = $this->users_model->get_all(array('referrer_id' => $row->id));
			$data['cur_packages'] = [];
			$data['cur_earnings'] = [];
			$data['cur_bonus'] = [];
			$data['deposit_history'] = [];
			$data['withdraw_history'] = [];
			
            $this->renderView('users/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => site_url('users/create_action'),
		    'id' => set_value('id'),
		    'ip_address' => set_value('ip_address'),
		    'username' => set_value('username'),
		    'password' => set_value('password'),
		    'salt' => set_value('salt'),
		    'email' => set_value('email'),
		    'created_on' => set_value('created_on'),
		    'last_login' => set_value('last_login'),
		    'active' => set_value('active'),
		    'first_name' => set_value('first_name'),
		    'last_name' => set_value('last_name'),
		    'company' => set_value('company'),
		    'phone' => set_value('phone'),
		    'oauth_provider' => set_value('oauth_provider'),
		);
		$data["listGroups"] = $this->ion_auth->groups()->result();
		
        $this->renderView('users/form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'username' => $this->input->post('username',TRUE),  // put email as username
				'password' => $this->input->post('password',TRUE),
				'email' => $this->input->post('email',TRUE),
				);
		$additional_data = array(
				'active' => $this->input->post('active',TRUE),
				'first_name' => $this->input->post('first_name',TRUE),
				'last_name' => $this->input->post('last_name',TRUE),
				'company' => $this->input->post('company',TRUE),
				'phone' => $this->input->post('phone',TRUE),
				'oauth_provider' => 'web',
				'refcode' => generate_ref_code(),
				);
			$group = $this->input->post('usergroups');	
			$ionauth = $this->config->load('ion_auth', TRUE);
			$this->config->set_item('email_activation', FALSE);
			
            $last_id = $this->ion_auth->register($data['username'], $data['password'], $data['email'], $additional_data, $group);
			if($last_id == FALSE){
				$this->session->set_flashdata('error', $this->ion_auth->errors());
				redirect(site_url('users/create'));
				}
			else{
			  $this->ion_auth->activate($last_id['id']);
//			  $this->postRegister($last_id['id']);
			  $this->session->set_flashdata('message', 'Create Record Success');
			  redirect(site_url('users'));
			}
        }
    }
    
    public function update($id) 
    {
        $row = $this->users_model->get_by_id($id);
		

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => site_url('users/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);
				}	
		$data["listGroups"] = $this->ion_auth->groups()->result();
		$this->renderView('users/form', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
		$this->form_validation->set_rules('password', 'Password', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
			$user_id = $this->input->post('id', TRUE);
            $data = array(
				'username' => $this->input->post('username',TRUE),
				'email' => $this->input->post('email',TRUE),
				'first_name' => $this->input->post('first_name',TRUE),
				'last_name' => $this->input->post('last_name',TRUE),
				'company' => $this->input->post('company',TRUE),
				'phone' => $this->input->post('phone',TRUE),
	    );
		
		if($this->input->post('password') != ''){
			$data['password'] = $this->input->post('password');
			}

            $this->ion_auth->update($user_id, $data);
			
			$groups = $this->input->post('usergroups');
			 $this->ion_auth->remove_from_group(array(1,2,3), $user_id);
			 $a = $this->ion_auth->add_to_group($groups, $user_id);
			 if(!$a){
				 $this->session->set_flashdata('error', $this->ion_auth->errors());
				 }
			
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        }
    }
	
	function ajax_approve_user(){
		$user_id = $this->input->get('user_id');
		$status = $this->input->get('approve');
		
		$userdata = $this->users_model->get_by_id($user_id);
		
		if($userdata){
		
		$r = $this->users_model->update($user_id, array('approve_status' => $status));
		if($r){
			$result = array('status' => true, 'approve_status' => $status);
			
			///// send notification to user
			$notdata = array('subject' => ($status == 1) ? 'Account approved' : 'Account disapproved',
									'detail' => 'You account status is changed by admin on Dated: '.date(DATE_SHORT).'. If you have any queries then contact Admin.',
									'users' => $user_id,
									'date' => date(DATE_MYSQL),
									);
					$this->inbox_model->insert($notdata);			
			
			}
		else{
			$result = array('status' => false, 'error' => 'Database Error');
			}	
		}
		else{
			$result = array('status' => false, 'error' => 'No user found');
			}
			
		echo json_encode($result);	
		}
	
	function ajax_approve_doc(){
		$user_id = $this->input->get('user_id');
		$userdata = $this->users_model->get_by_id($user_id);
		
		if($userdata){
		
		$r = $this->users_model->update($user_id, array('approve_status' => 1));
		if($r){
			$result = array('status' => true);
			
			///// send notification to user
			$notdata = array('subject' => $this->lang->line('nf_doc_approved_subject'),
									'description' => $this->lang->line('nf_doc_approved_detail').' Dated: '.date(DATE_SHORT),
									'type' => NTYPE_SUCCESS,
									'read_status' => 0,
									'user_id' => $user_id,
									'date' => time());
					$this->notification_model->insert($notdata);			
			
			///// send email to user
			$emailnfo = array('subject' => $this->lang->line('nf_doc_approved_subject'),
							'to' => $userdata->email);			
			
			$template = 'email_templates/user_doc_approved';					
			$sent = $this->send_email($emailnfo, $userdata, $template);
			
			}
		else{
			$result = array('status' => false, 'error' => 'Database Error');
			}	
		}
		else{
			$result = array('status' => false, 'error' => 'No user found');
			}
			
		echo json_encode($result);	
		}
		
	function ajax_disapprove_doc(){
		$user_id = $this->input->get('user_id');
		$userdata = $this->users_model->get_by_id($user_id);
		
		if($userdata){
		
		$r = $this->users_model->update($user_id, array('approve_status' => 0));
		$result = array('status' => true);
		}
		else{
			$result = array('status' => false, 'error' => 'No user found');
			}
			
		echo json_encode($result);	
		}	
    
// undormant user
/* 
 - change db status
 - send email to user
 - initialize work streak 
 - extend bount till date
*/ 	
public function ajax_undormant_user(){
	$this->load->model('work_streaks_model');
	$this->load->model('investment_model');
	
	$user_id = $this->input->post('user_id');
	if(!$user_id){
		$result = array('status' => false,
						'error' => 'User Id is not defined.');
		}
	else{
		$userdata = $this->users_model->get_by_id($user_id);
		
		$r = $this->users_model->update($user_id, array('dormant' => 0));
		if($r){
			$this->work_streaks_model->update($user_id, array('worked' => 0, 'absent' => 0));
			
			if($userdata->dormant_reason == 2){ // dormanted because of absent
			  ///// extend Inv bound till date
			  $past_inv = $this->investment_model->investmentAtDormant($userdata->id, $userdata->dormant_date);
			  //echo $this->db->last_query();
//			var_dump($past_inv);
			  if(!empty($past_inv)){
				  
				  foreach($past_inv as $pinv){
					  $lastinv_date = $pinv->bound_till;
					  $d_date = strtotime($userdata->dormant_date);					  
					  $d_diff_days =  strtotime($lastinv_date) - $d_date;
					  $days = floor($d_diff_days/(3600*24));
					  
					  $this->investment_model->update($pinv->id, array('bound_till' => date(DATE_MYSQL, strtotime("$lastinv_date +$days days"))));
					  }
				  
			  }
			}
			
			///////// send email
			$emailnfo = array('subject' => 'Account functional',
						'to' => $userdata->email);			
		
			$template = 'email_templates/user_ac_undormant';					
			$sent = $this->send_email($emailnfo, $userdata, $template);
			
			}
		
		}	
	
	
	$result['csrfhash'] = $this->security->get_csrf_hash();
	
	echo json_encode($result);
	}
	
    public function delete($id) 
    {
        $row = $this->ion_auth->delete_user($id);

        if ($row) {
			$this->db->where('user_id', $id);
		
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
	
	function logout(){
		$this->ion_auth->logout();
		redirect(site_url('login'));
	}	

    public function _rules() 
    {
	$this->form_validation->set_rules('password', 'Password', 'trim|required');
	$this->form_validation->set_rules('email', 'Email', 'trim|required');
	$this->form_validation->set_rules('username', 'Username', 'trim|required');
	$this->form_validation->set_rules('active', 'Active', 'trim');
	$this->form_validation->set_rules('first_name', 'First_name', 'trim');
	$this->form_validation->set_rules('last_name', 'Last_name', 'trim');
	$this->form_validation->set_rules('company', 'Company', 'trim');
	$this->form_validation->set_rules('phone', 'Phone', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */