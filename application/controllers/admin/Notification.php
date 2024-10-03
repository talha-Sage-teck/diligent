<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notification extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Notification';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'notification';
        $this->load->model('notification_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $notification = $this->notification_model->get_all();

        $data = array(
            'notification_data' => $notification
        );

        $this->renderView('notification/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'type' ,
		'description' ,
		'subject' ,
		'user_id' ,
		'read_status' ,
		'date' ,);
				
	}

    public function read($id) 
    {
        $row = $this->notification_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'type' => $row->type,
			'description' => $row->description,
			'subject' => $row->subject,
			'user_id' => $row->user_id,
			'read_status' => $row->read_status,
			'date' => $row->date,
	    );
            $this->renderView('notification/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('notification'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => admin_url('notification/create_action'),
		    'id' => set_value('id'),
		    'type' => set_value('type'),
		    'description' => set_value('description'),
		    'subject' => set_value('subject'),
		    'user_id' => set_value('user_id'),
		    'read_status' => set_value('read_status'),
		    'date' => set_value('date'),
		);
        $this->renderView('notification/form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'type' => $this->input->post('type',TRUE),
				'description' => $this->input->post('description',TRUE),
				'subject' => $this->input->post('subject',TRUE),
				'user_id' => $this->input->post('user_id',TRUE),
				'read_status' => $this->input->post('read_status',TRUE),
				'date' => $this->input->post('date',TRUE),
	    );

            $this->notification_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(admin_url('notification'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->notification_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => admin_url('notification/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('notification/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('notification'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'type' => $this->input->post('type',TRUE),
				'description' => $this->input->post('description',TRUE),
				'subject' => $this->input->post('subject',TRUE),
				'user_id' => $this->input->post('user_id',TRUE),
				'read_status' => $this->input->post('read_status',TRUE),
				'date' => $this->input->post('date',TRUE),
	    );

            $this->notification_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(admin_url('notification'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->notification_model->get_by_id($id);

        if ($row) {
            $this->notification_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(admin_url('notification'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('notification'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('type', 'Type', 'trim');
	$this->form_validation->set_rules('description', 'Description', 'trim');
	$this->form_validation->set_rules('subject', 'Subject', 'trim');
	$this->form_validation->set_rules('user_id', 'User_id', 'trim|required|numeric');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file Notification.php */
/* Location: ./application/controllers/Notification.php */