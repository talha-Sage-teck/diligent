<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Services extends Front_Controller
{
    function __construct()
    {
        parent::__construct();
		$group = array( 'admin' );
		if ( !$this->ion_auth->in_group( $group ) ) {
			$this->session->set_flashdata( 'error', 'You must be a Admin to view Services page' );
			redirect( '/' );
		}
		
		$this->data['page_title'] = 'Services';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'services';
        $this->load->model('services_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $services = $this->services_model->get_all();

        $data = array(
            'services_data' => $services
        );

        $this->renderView('services/list', $data);
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
        $row = $this->services_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'title' => $row->title,
			'description' => $row->description,
			'created_at' => $row->created_at,
	    );
            $this->renderView('services/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('services'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => site_url('services/create_action'),
		    'id' => set_value('id'),
		    'title' => set_value('title'),
		    'description' => set_value('description'),
		    'created_at' => set_value('created_at'),
		);
        $this->renderView('services/form', $data);
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
	    );

            $this->services_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('services'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->services_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => site_url('services/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('services/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('services'));
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
	    );

            $this->services_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('services'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->services_model->get_by_id($id);

        if ($row) {
            $this->services_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('services'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('services'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'Title', 'trim');
	$this->form_validation->set_rules('description', 'Description', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file Services.php */
/* Location: ./application/controllers/Services.php */