<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inbox extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Inbox';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'inbox';
        $this->load->model('inbox_model');
		$this->load->model('users_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $inbox = $this->inbox_model->get_admin_inbox();
        $data = array(
            'inbox_data' => $inbox
        );

        $this->renderView('inbox/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'subject' ,
		'detail' ,
		'status' ,
		'users' ,);
				
	}

    public function read($userid) 
    {
        $result = $this->inbox_model->get_user_chat($userid);
		$this->inbox_model->admin_chat_viewed();
        if ($result) {
            $data = array(
			'messages' => $result,
			'user_id' => $userid,
	    );
            $this->renderView('inbox/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('inbox'));
        }
    }
    
    public function create() 
    {
		$users_list = $this->users_model->get_all(array('id <>' => 1));
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => admin_url('inbox/create_action'),
		    'id' => set_value('id'),
		    'subject' => set_value('subject'),
		    'detail' => set_value('detail'),
		    'status' => set_value('status'),
		    'users' => set_value('users'),
			'users_list' => $users_list,
		);
        $this->renderView('inbox/form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'subject' => $this->input->post('subject',TRUE),
				'detail' => $this->input->post('detail',TRUE),
				'status' => $this->input->post('status',TRUE),
				'to_user' => $this->input->post('user_id',TRUE),
				'from_user' => 1,
				'date' => date(DATE_MYSQL),
	    );

            $this->inbox_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(admin_url('inbox'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->inbox_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => admin_url('inbox/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('inbox/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('inbox'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'subject' => $this->input->post('subject',TRUE),
				'detail' => $this->input->post('detail',TRUE),
				'status' => $this->input->post('status',TRUE),
				'users' => $this->input->post('users',TRUE),
	    );

            $this->inbox_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(admin_url('inbox'));
        }
    }
    
    public function delete_chat($id) 
    {
		$this->inbox_model->delete_chat($id);
		$this->session->set_flashdata('message', 'Delete Record Success');
		redirect(admin_url('inbox'));
       
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('subject', 'Subject', 'trim');
	$this->form_validation->set_rules('detail', 'Detail', 'trim');
	$this->form_validation->set_rules('status', 'Status', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file Inbox.php */
/* Location: ./application/controllers/Inbox.php */