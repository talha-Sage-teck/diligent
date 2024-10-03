<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Items extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'items';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'items';
        $this->load->model('items_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $items = $this->items_model->get_all();

        $data = array(
            'items_data' => $items
        );

        $this->renderView('items/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'title' ,
		'description' ,
		'created_at' ,);
				
	}

    public function read($id) 
    {
        $row = $this->items_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'title' => $row->title,
			'description' => $row->description,
			'created_at' => $row->created_at,
	    );
            $this->renderView('items/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('items'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => admin_url('items/create_action'),
		    'id' => set_value('id'),
		    'title' => set_value('title'),
		    'description' => set_value('description'),
		    'created_at' => set_value('created_at'),
		);
        $this->renderView('items/form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'title' => $this->input->post('title',TRUE),
				'description' => $this->input->post('description',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
	    );

            $this->items_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(admin_url('items'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->items_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => admin_url('items/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('items/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('items'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'title' => $this->input->post('title',TRUE),
				'description' => $this->input->post('description',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
	    );

            $this->items_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(admin_url('items'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->items_model->get_by_id($id);

        if ($row) {
            $this->items_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(admin_url('items'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('items'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'Title', 'trim');
	$this->form_validation->set_rules('description', 'Description', 'trim');
	$this->form_validation->set_rules('created_at', 'Created_at', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file items.php */
/* Location: ./application/controllers/items.php */