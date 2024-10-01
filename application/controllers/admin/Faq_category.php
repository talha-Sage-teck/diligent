<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faq_category extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Faq category';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'faq_category';
        $this->load->model('faq_category_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $faq_category = $this->faq_category_model->get_all();

        $data = array(
            'faq_category_data' => $faq_category
        );

        $this->renderView('faq_category/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'title' ,
		'description' ,);
				
	}

    public function read($id) 
    {
        $row = $this->faq_category_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'title' => $row->title,
		'description' => $row->description,
	    );
            $this->renderView('faq_category/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('faq_category'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => admin_url('faq_category/create_action'),
	    'id' => set_value('id'),
	    'title' => set_value('title'),
	    'description' => set_value('description'),
	);
        $this->renderView('faq_category/form', $data);
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

            $this->faq_category_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(admin_url('faq_category'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->faq_category_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'Add',
				'frm_action' => admin_url('faq_category/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('faq_category/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('faq_category'));
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

            $this->faq_category_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(admin_url('faq_category'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->faq_category_model->get_by_id($id);

        if ($row) {
            $this->faq_category_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(admin_url('faq_category'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('faq_category'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'Title', 'trim|required');
	$this->form_validation->set_rules('description', 'Description', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file Faq_category.php */
/* Location: ./application/controllers/Faq_category.php */