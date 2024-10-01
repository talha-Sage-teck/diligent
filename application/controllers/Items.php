<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Items extends Front_Controller
{
    function __construct()
    {
        parent::__construct();
		$group = array( 'admin' );
		if ( !$this->ion_auth->in_group( $group ) ) {
			$this->session->set_flashdata( 'error', 'You must be a Admin to view Services page' );
			redirect( '/' );
		}
		
		$this->data['page_title'] = 'Items';
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
        echo json_encode( $data );
        $this->renderView('items/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'name' ,
        'description' ,
        'category' ,
		'brand' ,
	);
				
	}

    public function read($id) 
    {
        $row = $this->items_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'name' => $row->name,
			'description' => $row->description,
            'category' => $row->category,
		    'brand' => $row->brand,
	    );
            $this->renderView('items/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => site_url('items/create_action'),
		    'id' => set_value('id'),
		    'name' => set_value('name'),
		    'description' => set_value('description'),
            'category' => set_value('category'),
		    'brand' => set_value('brand'),
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
				
                'name' => $this->input->post('name',TRUE),
				'description' => $this->input->post('description',TRUE),
                'category' => $this->input->post('category',TRUE),
				'brand' => $this->input->post('brand',TRUE),
	    );
            $this->items_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('items'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->items_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => site_url('items/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('items/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'name' => $this->input->post('name',TRUE),
				'description' => $this->input->post('description',TRUE),
                'category' => $this->input->post('category',TRUE),
				'brand' => $this->input->post('brand',TRUE),
	    );

            $this->items_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('items'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->items_model->get_by_id($id);

        if ($row) {
            $this->items_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('items'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim');
        $this->form_validation->set_rules('category', 'Category', 'trim');
        $this->form_validation->set_rules('brand', 'Brand', 'trim');  
        $this->form_validation->set_rules('id', 'ID', 'trim');
        $this->form_validation->set_error_delimiters('<div>', '</div>');
    }
    
};

/* End of file items.php */
/* Location: ./application/controllers/items.php */