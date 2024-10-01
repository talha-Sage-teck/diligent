<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page_about extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Page_about';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'page_about';
        $this->load->model('page_about_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $page_about = $this->page_about_model->get_all();

        $data = array(
            'page_about_data' => $page_about
        );

        $this->renderView('page_about/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'title' ,
		'mission_subheading' ,
		'mission_heading' ,
		'mission_text' ,
		'service1_heading' ,
		'service1_text' ,
		'service2_heading' ,
		'service2_text' ,
		'service3_heading' ,
		'service3_text' ,
		'vision_subheading' ,
		'vision_heading' ,
		'vision_text' ,
		'referral_heading' ,
		'referral_text' ,
		'chairman_heading' ,
		'chairman_text' ,
		'chairman_name' ,
		'chairman_designation' ,
		'meta_keywords' ,
		'meta_description' ,
		'updated_on' ,);
				
	}

    public function read($id) 
    {
        $row = $this->page_about_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'title' => $row->title,
			'mission_subheading' => $row->mission_subheading,
			'mission_heading' => $row->mission_heading,
			'mission_text' => $row->mission_text,
			'service1_heading' => $row->service1_heading,
			'service1_text' => $row->service1_text,
			'service2_heading' => $row->service2_heading,
			'service2_text' => $row->service2_text,
			'service3_heading' => $row->service3_heading,
			'service3_text' => $row->service3_text,
			'vision_subheading' => $row->vision_subheading,
			'vision_heading' => $row->vision_heading,
			'vision_text' => $row->vision_text,
			'referral_heading' => $row->referral_heading,
			'referral_text' => $row->referral_text,
			'chairman_heading' => $row->chairman_heading,
			'chairman_text' => $row->chairman_text,
			'chairman_name' => $row->chairman_name,
			'chairman_designation' => $row->chairman_designation,
			'meta_keywords' => $row->meta_keywords,
			'meta_description' => $row->meta_description,
			'updated_on' => $row->updated_on,
	    );
            $this->renderView('page_about/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('page_about'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => admin_url('page_about/create_action'),
		    'id' => set_value('id'),
		    'title' => set_value('title'),
		    'mission_subheading' => set_value('mission_subheading'),
		    'mission_heading' => set_value('mission_heading'),
		    'mission_text' => set_value('mission_text'),
		    'service1_heading' => set_value('service1_heading'),
		    'service1_text' => set_value('service1_text'),
		    'service2_heading' => set_value('service2_heading'),
		    'service2_text' => set_value('service2_text'),
		    'service3_heading' => set_value('service3_heading'),
		    'service3_text' => set_value('service3_text'),
		    'vision_subheading' => set_value('vision_subheading'),
		    'vision_heading' => set_value('vision_heading'),
		    'vision_text' => set_value('vision_text'),
		    'referral_heading' => set_value('referral_heading'),
		    'referral_text' => set_value('referral_text'),
		    'chairman_heading' => set_value('chairman_heading'),
		    'chairman_text' => set_value('chairman_text'),
		    'chairman_name' => set_value('chairman_name'),
		    'chairman_designation' => set_value('chairman_designation'),
		    'meta_keywords' => set_value('meta_keywords'),
		    'meta_description' => set_value('meta_description'),
		    'updated_on' => set_value('updated_on'),
		);
        $this->renderView('page_about/form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'title' => $this->input->post('title',TRUE),
				'mission_subheading' => $this->input->post('mission_subheading',TRUE),
				'mission_heading' => $this->input->post('mission_heading',TRUE),
				'mission_text' => $this->input->post('mission_text',TRUE),
				'service1_heading' => $this->input->post('service1_heading',TRUE),
				'service1_text' => $this->input->post('service1_text',TRUE),
				'service2_heading' => $this->input->post('service2_heading',TRUE),
				'service2_text' => $this->input->post('service2_text',TRUE),
				'service3_heading' => $this->input->post('service3_heading',TRUE),
				'service3_text' => $this->input->post('service3_text',TRUE),
				'vision_subheading' => $this->input->post('vision_subheading',TRUE),
				'vision_heading' => $this->input->post('vision_heading',TRUE),
				'vision_text' => $this->input->post('vision_text',TRUE),
				'referral_heading' => $this->input->post('referral_heading',TRUE),
				'referral_text' => $this->input->post('referral_text',TRUE),
				'chairman_heading' => $this->input->post('chairman_heading',TRUE),
				'chairman_text' => $this->input->post('chairman_text',TRUE),
				'chairman_name' => $this->input->post('chairman_name',TRUE),
				'chairman_designation' => $this->input->post('chairman_designation',TRUE),
				'meta_keywords' => $this->input->post('meta_keywords',TRUE),
				'meta_description' => $this->input->post('meta_description',TRUE),
				'updated_on' => $this->input->post('updated_on',TRUE),
	    );

            $this->page_about_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(admin_url('page_about'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->page_about_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => admin_url('page_about/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('page_about/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('page_about'));
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
				'mission_subheading' => $this->input->post('mission_subheading',TRUE),
				'mission_heading' => $this->input->post('mission_heading',TRUE),
				'mission_text' => $this->input->post('mission_text',TRUE),
				'service1_heading' => $this->input->post('service1_heading',TRUE),
				'service1_text' => $this->input->post('service1_text',TRUE),
				'service2_heading' => $this->input->post('service2_heading',TRUE),
				'service2_text' => $this->input->post('service2_text',TRUE),
				'service3_heading' => $this->input->post('service3_heading',TRUE),
				'service3_text' => $this->input->post('service3_text',TRUE),
				'vision_subheading' => $this->input->post('vision_subheading',TRUE),
				'vision_heading' => $this->input->post('vision_heading',TRUE),
				'vision_text' => $this->input->post('vision_text',TRUE),
				'referral_heading' => $this->input->post('referral_heading',TRUE),
				'referral_text' => $this->input->post('referral_text',TRUE),
				'chairman_heading' => $this->input->post('chairman_heading',TRUE),
				'chairman_text' => $this->input->post('chairman_text',TRUE),
				'chairman_name' => $this->input->post('chairman_name',TRUE),
				'chairman_designation' => $this->input->post('chairman_designation',TRUE),
				'meta_keywords' => $this->input->post('meta_keywords',TRUE),
				'meta_description' => $this->input->post('meta_description',TRUE),
				'updated_on' => $this->input->post('updated_on',TRUE),
	    );

            $this->page_about_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(admin_url('page_about'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->page_about_model->get_by_id($id);

        if ($row) {
            $this->page_about_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(admin_url('page_about'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('page_about'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'Title', 'trim');
	$this->form_validation->set_rules('mission_subheading', 'Mission_subheading', 'trim');
	$this->form_validation->set_rules('mission_heading', 'Mission_heading', 'trim');
	$this->form_validation->set_rules('mission_text', 'Mission_text', 'trim');
	$this->form_validation->set_rules('service1_heading', 'Service1_heading', 'trim');
	$this->form_validation->set_rules('service1_text', 'Service1_text', 'trim');
	$this->form_validation->set_rules('service2_heading', 'Service2_heading', 'trim');
	$this->form_validation->set_rules('service2_text', 'Service2_text', 'trim');
	$this->form_validation->set_rules('service3_heading', 'Service3_heading', 'trim');
	$this->form_validation->set_rules('service3_text', 'Service3_text', 'trim');
	$this->form_validation->set_rules('vision_subheading', 'Vision_subheading', 'trim');
	$this->form_validation->set_rules('vision_heading', 'Vision_heading', 'trim');
	$this->form_validation->set_rules('vision_text', 'Vision_text', 'trim');
	$this->form_validation->set_rules('referral_heading', 'Referral_heading', 'trim');
	$this->form_validation->set_rules('referral_text', 'Referral_text', 'trim');
	$this->form_validation->set_rules('chairman_heading', 'Chairman_heading', 'trim');
	$this->form_validation->set_rules('chairman_text', 'Chairman_text', 'trim');
	$this->form_validation->set_rules('chairman_name', 'Chairman_name', 'trim');
	$this->form_validation->set_rules('chairman_designation', 'Chairman_designation', 'trim');
	$this->form_validation->set_rules('meta_keywords', 'Meta_keywords', 'trim');
	$this->form_validation->set_rules('meta_description', 'Meta_description', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file Page_about.php */
/* Location: ./application/controllers/Page_about.php */