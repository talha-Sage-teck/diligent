<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page_contact extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Page_contact';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'page_contact';
        $this->load->model('page_contact_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $page_contact = $this->page_contact_model->get_all();

        $data = array(
            'page_contact_data' => $page_contact
        );

        $this->renderView('page_contact/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'form_heading' ,
		'office_phone' ,
		'office_email' ,
		'office_address' ,
		'office_working_hours' ,
		'support_heading' ,
		'support_text' ,
		'meta_keywords' ,
		'meta_description' ,
		'updated_on' ,);
				
	}

    public function read($id) 
    {
        $row = $this->page_contact_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'form_heading' => $row->form_heading,
			'office_phone' => $row->office_phone,
			'office_email' => $row->office_email,
			'office_address' => $row->office_address,
			'office_working_hours' => $row->office_working_hours,
			'support_heading' => $row->support_heading,
			'support_text' => $row->support_text,
			'meta_keywords' => $row->meta_keywords,
			'meta_description' => $row->meta_description,
			'updated_on' => $row->updated_on,
	    );
            $this->renderView('page_contact/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('page_contact'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => admin_url('page_contact/create_action'),
		    'id' => set_value('id'),
		    'form_heading' => set_value('form_heading'),
		    'office_phone' => set_value('office_phone'),
		    'office_email' => set_value('office_email'),
		    'office_address' => set_value('office_address'),
		    'office_working_hours' => set_value('office_working_hours'),
		    'support_heading' => set_value('support_heading'),
		    'support_text' => set_value('support_text'),
		    'meta_keywords' => set_value('meta_keywords'),
		    'meta_description' => set_value('meta_description'),
		    'updated_on' => set_value('updated_on'),
		);
        $this->renderView('page_contact/form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'form_heading' => $this->input->post('form_heading',TRUE),
				'office_phone' => $this->input->post('office_phone',TRUE),
				'office_email' => $this->input->post('office_email',TRUE),
				'office_address' => $this->input->post('office_address',TRUE),
				'office_working_hours' => $this->input->post('office_working_hours',TRUE),
				'support_heading' => $this->input->post('support_heading',TRUE),
				'support_text' => $this->input->post('support_text',TRUE),
				'meta_keywords' => $this->input->post('meta_keywords',TRUE),
				'meta_description' => $this->input->post('meta_description',TRUE),
				'updated_on' => $this->input->post('updated_on',TRUE),
	    );

            $this->page_contact_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(admin_url('page_contact'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->page_contact_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => admin_url('page_contact/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('page_contact/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('page_contact'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'form_heading' => $this->input->post('form_heading',TRUE),
				'office_phone' => $this->input->post('office_phone',TRUE),
				'office_email' => $this->input->post('office_email',TRUE),
				'office_address' => $this->input->post('office_address',TRUE),
				'office_working_hours' => $this->input->post('office_working_hours',TRUE),
				'support_heading' => $this->input->post('support_heading',TRUE),
				'support_text' => $this->input->post('support_text',TRUE),
				'meta_keywords' => $this->input->post('meta_keywords',TRUE),
				'meta_description' => $this->input->post('meta_description',TRUE),
				'updated_on' => $this->input->post('updated_on',TRUE),
	    );

            $this->page_contact_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(admin_url('page_contact'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->page_contact_model->get_by_id($id);

        if ($row) {
            $this->page_contact_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(admin_url('page_contact'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('page_contact'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('form_heading', 'Form_heading', 'trim');
	$this->form_validation->set_rules('office_phone', 'Office_phone', 'trim');
	$this->form_validation->set_rules('office_email', 'Office_email', 'trim');
	$this->form_validation->set_rules('office_address', 'Office_address', 'trim');
	$this->form_validation->set_rules('office_working_hours', 'Office_working_hours', 'trim');
	$this->form_validation->set_rules('support_heading', 'Support_heading', 'trim');
	$this->form_validation->set_rules('support_text', 'Support_text', 'trim');
	$this->form_validation->set_rules('meta_keywords', 'Meta_keywords', 'trim');
	$this->form_validation->set_rules('meta_description', 'Meta_description', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file Page_contact.php */
/* Location: ./application/controllers/Page_contact.php */