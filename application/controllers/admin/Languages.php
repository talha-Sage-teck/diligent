<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Languages extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Languages';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'languages';
        $this->load->model('languages_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $languages = $this->languages_model->get_all();

        $data = array(
            'languages_data' => $languages
        );

        $this->renderView('languages/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'language_name' ,
		'language_directory' ,
		'slug' ,
		'language_code' ,
		'default' ,
		'morevalues' ,);
				
	}

    public function read($id) 
    {
        $row = $this->languages_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'language_name' => $row->language_name,
		'language_directory' => $row->language_directory,
		'slug' => $row->slug,
		'language_code' => $row->language_code,
		'default' => $row->default,
		'morevalues' => $row->morevalues,
	    );
            $this->renderView('languages/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('languages'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('languages/create_action'),
	    'id' => set_value('id'),
	    'language_name' => set_value('language_name'),
	    'language_directory' => set_value('language_directory'),
	    'slug' => set_value('slug'),
	    'language_code' => set_value('language_code'),
	    'default' => set_value('default'),
	    'morevalues' => set_value('morevalues'),
	);
        $this->renderView('languages/form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'language_name' => $this->input->post('language_name',TRUE),
		'language_directory' => $this->input->post('language_directory',TRUE),
		'slug' => $this->input->post('slug',TRUE),
		'language_code' => $this->input->post('language_code',TRUE),
		'default' => $this->input->post('default',TRUE),
		'morevalues' => $this->input->post('morevalues',TRUE),
	    );

            $this->languages_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('languages'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->languages_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => 'Update',
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('languages/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('languages'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'language_name' => $this->input->post('language_name',TRUE),
		'language_directory' => $this->input->post('language_directory',TRUE),
		'slug' => $this->input->post('slug',TRUE),
		'language_code' => $this->input->post('language_code',TRUE),
		'default' => $this->input->post('default',TRUE),
		'morevalues' => $this->input->post('morevalues',TRUE),
	    );

            $this->languages_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('languages'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->languages_model->get_by_id($id);

        if ($row) {
            $this->languages_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('languages'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('languages'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('language_name', ' ', 'trim|required');
	$this->form_validation->set_rules('language_directory', ' ', 'trim|required');
	$this->form_validation->set_rules('slug', ' ', 'trim|required');
	$this->form_validation->set_rules('language_code', ' ', 'trim');
	$this->form_validation->set_rules('default', ' ', 'trim|required');
	$this->form_validation->set_rules('morevalues', ' ', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

};

/* End of file Languages.php */
/* Location: ./application/controllers/Languages.php */