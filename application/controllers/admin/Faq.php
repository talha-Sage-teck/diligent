<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faq extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Faq';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'faq';
        $this->load->model('faq_model');
		$this->load->model('faq_category_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $faq = $this->faq_model->get_list();

        $data = array(
            'faq_data' => $faq
        );

        $this->renderView('faq/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'question' ,
		'answer' ,
		'faq_cat_id' ,);
				
	}

    public function read($id) 
    {
        $row = $this->faq_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'question' => $row->question,
		'answer' => $row->answer,
		'faq_cat_id' => $row->faq_cat_id,
	    );
            $this->renderView('faq/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('faq'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => admin_url('faq/create_action'),
			'id' => set_value('id'),
			'question' => set_value('question'),
			'answer' => set_value('answer'),
			'faq_cat_id' => set_value('faq_cat_id'),
		);
		$data['faq_cat'] = db_options_arr($this->faq_category_model->get_all(), 'id', 'title');
	
        $this->renderView('faq/form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
			'question' => $this->input->post('question',TRUE),
			'answer' => $this->input->post('answer',TRUE),
			'faq_cat_id' => $this->input->post('faq_cat_id',TRUE),
			'created_by' => $this->admin_id,
			);

            $this->faq_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(admin_url('faq'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->faq_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'Update',
				'frm_action' => admin_url('faq/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
		$data['faq_cat'] = db_options_arr($this->faq_category_model->get_all(), 'id', 'title');
		$data['row'] = $row;
				
		$this->renderView('faq/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('faq'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
						  'question' => $this->input->post('question',TRUE),
						  'answer' => $this->input->post('answer',TRUE),
						  'faq_cat_id' => $this->input->post('faq_cat_id',TRUE),
						  );

            $this->faq_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(admin_url('faq'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->faq_model->get_by_id($id);

        if ($row) {
            $this->faq_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(admin_url('faq'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('faq'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('question', 'Question', 'trim|required');
	$this->form_validation->set_rules('answer', 'Answer', 'trim|required');
	$this->form_validation->set_rules('faq_cat_id', 'Category', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters(' <div >', '</div> ');
    }

};

/* End of file Faq.php */
/* Location: ./application/controllers/Faq.php */