<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Broadcast_email extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Broadcast';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'broadcast';
		$this->load->model('users_model');
    }

    public function index()
    {
        $data = array();
		
		$data = array(
            'button' => 'Send',
			'action' => 'Send',
            'frm_action' => admin_url('broadcast_email/broadcast'),
		    'id' => set_value('id'),
		);
		
		$data['users_list'] = $this->users_model->get_all();

        $this->renderView('broadcast_email/form', $data);
    }
	
	function broadcast(){
		$this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
			//echo '<pre>';
//			var_dump($this->input->post());
//			echo '</pre>';
			$emailcontent = array('messagebody' => $this->input->post('email_message'));
			$subject =  $this->input->post('subject');
			$users = $this->input->post('users'); 
		  	////// send email to email address	
			foreach($users as $user){	
			$b64dcode = base64_decode($user);
			$udata = json_decode($b64dcode); // [0] => email, [1] => firstname, [2] => lastname
			$emailcontent['member_name'] = $udata[1].' '.$udata[2];
			  $emailnfo = array('subject' => $subject,
								  'to' => $udata[0]);
			  $template = 'email_templates/broadcast';					
			  $respose = $this->send_email($emailnfo, $emailcontent, $template);
			}
			
			if($respose){
				$this->session->set_flashdata('message', 'Emails sent to members');
				redirect(admin_url('broadcast_email'));
				}
			}
		}

    public function _rules() 
    {
	$this->form_validation->set_rules('email_message', 'Email Message', 'trim|required');
	$this->form_validation->set_rules('subject', 'Subject', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file Users_tree.php */
/* Location: ./application/controllers/Users_tree.php */