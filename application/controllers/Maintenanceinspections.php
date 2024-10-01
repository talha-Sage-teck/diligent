<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Maintenanceinspections extends Front_Controller
{
    function __construct()
    {
        parent::__construct();
		  
		if (!$this->ion_auth->in_group(['admin', 'inspector']))
			{
			  $this->session->set_userdata('referrer_url', $this->agent->referrer() ); 
			  //redirect them to the login page
			  redirect('login', 'refresh');
			}

		$this->data['page_title'] = 'Maintenance Inspections';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'maintenanceinspections';
        $this->load->model('maintenance_inspections_model');
        $this->load->model('users_model');
		
    }

    public function index()
    {
        $maintenanceinspections = $this->maintenance_inspections_model->get_list();

        $data = array(
            'maintenanceinspections_data' => $maintenanceinspections
        );

        $this->renderView('maintenance_inspections/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'clientname' ,
		'attention' ,
		'project' ,
		'location' ,
		'created_at' ,
		'updated_at' ,
		'prepared_by' ,
		'service_details' ,
		'notes' ,);
				
	}

    public function read($id) 
    {
        $row = $this->maintenance_inspections_model->get_by_id($id);
		$user_info = $this->users_model->get_by_id($row->prepared_by);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'clientname' => $row->clientname,
			'attention' => $row->attention,
			'project' => $row->project,
			'location' => $row->location,
			'created_at' => $row->created_at,
			'updated_at' => $row->updated_at,
			'prepared_by' => $user_info->first_name.' '.$user_info->last_name,
			'service_details' => $row->service_details,
			'notes' => $row->notes,
	    );
            $this->renderView('maintenance_inspections/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('maintenanceinspections'));
        }
    }
    
    public function create() 
    {
		$group = array( 'inspector');
		if ( !$this->ion_auth->in_group( $group ) ) {
			$this->session->set_flashdata( 'error', 'You must be an Inspector to add '.$this->data['page_title'] );
			redirect( 'home' );
		}
		
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => site_url('maintenanceinspections/create_action'),
		    'id' => set_value('id'),
		    'clientname' => set_value('clientname'),
		    'attention' => set_value('attention'),
		    'project' => set_value('project'),
		    'location' => set_value('location'),
		    'created_at' => set_value('created_at'),
		    'updated_at' => set_value('updated_at'),
		    'prepared_by' => set_value('prepared_by'),
		    'service_details' => set_value('service_details'),
		    'notes' => set_value('notes'),
		);
        $this->renderView('maintenance_inspections/form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'clientname' => $this->input->post('clientname',TRUE),
				'attention' => $this->input->post('attention',TRUE),
				'project' => $this->input->post('project',TRUE),
				'location' => $this->input->post('location',TRUE),
				'prepared_by' => $this->user_id,
				'service_details' => $this->input->post('service_details',TRUE),
				'notes' => $this->input->post('notes',TRUE),
	    );

            $this->maintenance_inspections_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('maintenanceinspections'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->maintenance_inspections_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => site_url('maintenanceinspections/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('maintenance_inspections/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('maintenanceinspections'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'clientname' => $this->input->post('clientname',TRUE),
				'attention' => $this->input->post('attention',TRUE),
				'project' => $this->input->post('project',TRUE),
				'location' => $this->input->post('location',TRUE),
				'service_details' => $this->input->post('service_details',TRUE),
				'notes' => $this->input->post('notes',TRUE),
	    );

            $this->maintenance_inspections_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('maintenanceinspections'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->maintenance_inspections_model->get_by_id($id);

        if ($row) {
            $this->maintenance_inspections_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('maintenanceinspections'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('maintenanceinspections'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('clientname', 'Clientname', 'trim|required');
	$this->form_validation->set_rules('project', 'Project', 'trim|required');
	$this->form_validation->set_rules('location', 'Location', 'trim|required');
	$this->form_validation->set_rules('prepared_by', 'Prepared_by', 'trim');
	$this->form_validation->set_rules('service_details', 'Service_details', 'trim|required');
	$this->form_validation->set_rules('notes', 'Notes', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file Maintenanceinspections.php */
/* Location: ./application/controllers/Maintenanceinspections.php */