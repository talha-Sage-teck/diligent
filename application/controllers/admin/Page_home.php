<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page_home extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Page_home';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'page_home';
        $this->load->model('page_home_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $page_home = $this->page_home_model->get_all();

        $data = array(
            'page_home_data' => $page_home
        );

        $this->renderView('page_home/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'header_heading' ,
		'header_text' ,
		'service1_heading' ,
		'service1_text' ,
		'service2_heading' ,
		'service2_text' ,
		'service3_heading' ,
		'service3_text' ,
		'choose_heading' ,
		'choose_text' ,
		'choose1_heading' ,
		'choose1_text' ,
		'choose2_heading' ,
		'choose2_text' ,
		'choose3_heading' ,
		'choose3_text' ,
		'plan_subheading' ,
		'plan_heading' ,
		'plan_text' ,
		'feedback_subheading' ,
		'feedback_heading' ,
		'feedback_text' ,
		'calculate_subheading' ,
		'calculate_heading' ,
		'calculate_text' ,
		'referral_subheding' ,
		'referral_heading' ,
		'referral_text' ,
		'mission_subheading' ,
		'mission_heading' ,
		'mission_text' ,
		'counter_title_1',
		'counter_title_2',
		'counter_title_3',
		'counter_title_4',
		'counter_limit_1',
		'counter_limit_2',
		'counter_limit_3',
		'counter_limit_4',
		'meta_keywords' ,
		'meta_description' ,
		'updated_on' ,);
				
	}

    public function read($id) 
    {
        $row = $this->page_home_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'header_heading' => $row->header_heading,
			'header_text' => $row->header_text,
			'service1_heading' => $row->service1_heading,
			'service1_text' => $row->service1_text,
			'service2_heading' => $row->service2_heading,
			'service2_text' => $row->service2_text,
			'service3_heading' => $row->service3_heading,
			'service3_text' => $row->service3_text,
			'choose_heading' => $row->choose_heading,
			'choose_text' => $row->choose_text,
			'choose1_heading' => $row->choose1_heading,
			'choose1_text' => $row->choose1_text,
			'choose2_heading' => $row->choose2_heading,
			'choose2_text' => $row->choose2_text,
			'choose3_heading' => $row->choose3_heading,
			'choose3_text' => $row->choose3_text,
			'plan_subheading' => $row->plan_subheading,
			'plan_heading' => $row->plan_heading,
			'plan_text' => $row->plan_text,
			'feedback_subheading' => $row->feedback_subheading,
			'feedback_heading' => $row->feedback_heading,
			'feedback_text' => $row->feedback_text,
			'calculate_subheading' => $row->calculate_subheading,
			'calculate_heading' => $row->calculate_heading,
			'calculate_text' => $row->calculate_text,
			'referral_subheding' => $row->referral_subheding,
			'referral_heading' => $row->referral_heading,
			'referral_text' => $row->referral_text,
			'mission_subheading' => $row->mission_subheading,
			'mission_heading' => $row->mission_heading,
			'mission_text' => $row->mission_text,
			'meta_keywords' => $row->meta_keywords,
			'meta_description' => $row->meta_description,
			'updated_on' => $row->updated_on,
	    );
            $this->renderView('page_home/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('page_home'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => admin_url('page_home/create_action'),
		    'id' => set_value('id'),
		    'header_heading' => set_value('header_heading'),
		    'header_text' => set_value('header_text'),
		    'service1_heading' => set_value('service1_heading'),
		    'service1_text' => set_value('service1_text'),
		    'service2_heading' => set_value('service2_heading'),
		    'service2_text' => set_value('service2_text'),
		    'service3_heading' => set_value('service3_heading'),
		    'service3_text' => set_value('service3_text'),
		    'choose_heading' => set_value('choose_heading'),
		    'choose_text' => set_value('choose_text'),
		    'choose1_heading' => set_value('choose1_heading'),
		    'choose1_text' => set_value('choose1_text'),
		    'choose2_heading' => set_value('choose2_heading'),
		    'choose2_text' => set_value('choose2_text'),
		    'choose3_heading' => set_value('choose3_heading'),
		    'choose3_text' => set_value('choose3_text'),
		    'plan_subheading' => set_value('plan_subheading'),
		    'plan_heading' => set_value('plan_heading'),
		    'plan_text' => set_value('plan_text'),
		    'feedback_subheading' => set_value('feedback_subheading'),
		    'feedback_heading' => set_value('feedback_heading'),
		    'feedback_text' => set_value('feedback_text'),
		    'calculate_subheading' => set_value('calculate_subheading'),
		    'calculate_heading' => set_value('calculate_heading'),
		    'calculate_text' => set_value('calculate_text'),
		    'referral_subheding' => set_value('referral_subheding'),
		    'referral_heading' => set_value('referral_heading'),
		    'referral_text' => set_value('referral_text'),
		    'mission_subheading' => set_value('mission_subheading'),
		    'mission_heading' => set_value('mission_heading'),
		    'mission_text' => set_value('mission_text'),
			'counter_title_1' => set_value('counter_title_1'),
			'counter_title_2' => set_value('counter_title_2'),
			'counter_title_3' => set_value('counter_title_3'),
			'counter_title_4' => set_value('counter_title_4'),
			'counter_limit_1' => set_value('counter_limit_1'),
			'counter_limit_2' => set_value('counter_limit_2'),
			'counter_limit_3' => set_value('counter_limit_3'),
			'counter_limit_4' => set_value('counter_limit_4'),
		    'meta_keywords' => set_value('meta_keywords'),
		    'meta_description' => set_value('meta_description'),
		    'updated_on' => set_value('updated_on'),
		);
        $this->renderView('page_home/form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'header_heading' => $this->input->post('header_heading',TRUE),
				'header_text' => $this->input->post('header_text',TRUE),
				'service1_heading' => $this->input->post('service1_heading',TRUE),
				'service1_text' => $this->input->post('service1_text',TRUE),
				'service2_heading' => $this->input->post('service2_heading',TRUE),
				'service2_text' => $this->input->post('service2_text',TRUE),
				'service3_heading' => $this->input->post('service3_heading',TRUE),
				'service3_text' => $this->input->post('service3_text',TRUE),
				'choose_heading' => $this->input->post('choose_heading',TRUE),
				'choose_text' => $this->input->post('choose_text',TRUE),
				'choose1_heading' => $this->input->post('choose1_heading',TRUE),
				'choose1_text' => $this->input->post('choose1_text',TRUE),
				'choose2_heading' => $this->input->post('choose2_heading',TRUE),
				'choose2_text' => $this->input->post('choose2_text',TRUE),
				'choose3_heading' => $this->input->post('choose3_heading',TRUE),
				'choose3_text' => $this->input->post('choose3_text',TRUE),
				'plan_subheading' => $this->input->post('plan_subheading',TRUE),
				'plan_heading' => $this->input->post('plan_heading',TRUE),
				'plan_text' => $this->input->post('plan_text',TRUE),
				'feedback_subheading' => $this->input->post('feedback_subheading',TRUE),
				'feedback_heading' => $this->input->post('feedback_heading',TRUE),
				'feedback_text' => $this->input->post('feedback_text',TRUE),
				'calculate_subheading' => $this->input->post('calculate_subheading',TRUE),
				'calculate_heading' => $this->input->post('calculate_heading',TRUE),
				'calculate_text' => $this->input->post('calculate_text',TRUE),
				'referral_subheding' => $this->input->post('referral_subheding',TRUE),
				'referral_heading' => $this->input->post('referral_heading',TRUE),
				'referral_text' => $this->input->post('referral_text',TRUE),
				'mission_subheading' => $this->input->post('mission_subheading',TRUE),
				'mission_heading' => $this->input->post('mission_heading',TRUE),
				'mission_text' => $this->input->post('mission_text',TRUE),
				'counter_title_1' => $this->input->post('counter_title_1',TRUE),
				'counter_title_2' => $this->input->post('counter_title_2',TRUE),
				'counter_title_3' => $this->input->post('counter_title_3',TRUE),
				'counter_title_4' => $this->input->post('counter_title_4',TRUE),
				'counter_limit_1' => $this->input->post('counter_limit_1',TRUE),
				'counter_limit_2' => $this->input->post('counter_limit_2',TRUE),
				'counter_limit_3' => $this->input->post('counter_limit_3',TRUE),
				'counter_limit_4' => $this->input->post('counter_limit_4',TRUE),
				'meta_keywords' => $this->input->post('meta_keywords',TRUE),
				'meta_description' => $this->input->post('meta_description',TRUE),
				'updated_on' => $this->input->post('updated_on',TRUE),
	    );

            $this->page_home_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(admin_url('page_home'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->page_home_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => admin_url('page_home/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('page_home/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('page_home'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'header_heading' => $this->input->post('header_heading',TRUE),
				'header_text' => $this->input->post('header_text',TRUE),
				'service1_heading' => $this->input->post('service1_heading',TRUE),
				'service1_text' => $this->input->post('service1_text',TRUE),
				'service2_heading' => $this->input->post('service2_heading',TRUE),
				'service2_text' => $this->input->post('service2_text',TRUE),
				'service3_heading' => $this->input->post('service3_heading',TRUE),
				'service3_text' => $this->input->post('service3_text',TRUE),
				'choose_heading' => $this->input->post('choose_heading',TRUE),
				'choose_text' => $this->input->post('choose_text',TRUE),
				'choose1_heading' => $this->input->post('choose1_heading',TRUE),
				'choose1_text' => $this->input->post('choose1_text',TRUE),
				'choose2_heading' => $this->input->post('choose2_heading',TRUE),
				'choose2_text' => $this->input->post('choose2_text',TRUE),
				'choose3_heading' => $this->input->post('choose3_heading',TRUE),
				'choose3_text' => $this->input->post('choose3_text',TRUE),
				'plan_subheading' => $this->input->post('plan_subheading',TRUE),
				'plan_heading' => $this->input->post('plan_heading',TRUE),
				'plan_text' => $this->input->post('plan_text',TRUE),
				'feedback_subheading' => $this->input->post('feedback_subheading',TRUE),
				'feedback_heading' => $this->input->post('feedback_heading',TRUE),
				'feedback_text' => $this->input->post('feedback_text',TRUE),
				'calculate_subheading' => $this->input->post('calculate_subheading',TRUE),
				'calculate_heading' => $this->input->post('calculate_heading',TRUE),
				'calculate_text' => $this->input->post('calculate_text',TRUE),
				'referral_subheding' => $this->input->post('referral_subheding',TRUE),
				'referral_heading' => $this->input->post('referral_heading',TRUE),
				'referral_text' => $this->input->post('referral_text',TRUE),
				'mission_subheading' => $this->input->post('mission_subheading',TRUE),
				'mission_heading' => $this->input->post('mission_heading',TRUE),
				'mission_text' => $this->input->post('mission_text',TRUE),
				'counter_title_1' => $this->input->post('counter_title_1',TRUE),
				'counter_title_2' => $this->input->post('counter_title_2',TRUE),
				'counter_title_3' => $this->input->post('counter_title_3',TRUE),
				'counter_title_4' => $this->input->post('counter_title_4',TRUE),
				'counter_limit_1' => $this->input->post('counter_limit_1',TRUE),
				'counter_limit_2' => $this->input->post('counter_limit_2',TRUE),
				'counter_limit_3' => $this->input->post('counter_limit_3',TRUE),
				'counter_limit_4' => $this->input->post('counter_limit_4',TRUE),
				'meta_keywords' => $this->input->post('meta_keywords',TRUE),
				'meta_description' => $this->input->post('meta_description',TRUE),
				'updated_on' => $this->input->post('updated_on',TRUE),
	    );

            $this->page_home_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(admin_url('page_home'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->page_home_model->get_by_id($id);

        if ($row) {
            $this->page_home_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(admin_url('page_home'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('page_home'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('header_heading', 'Header_heading', 'trim');
	$this->form_validation->set_rules('header_text', 'Header_text', 'trim');
	$this->form_validation->set_rules('service1_heading', 'Service1_heading', 'trim');
	$this->form_validation->set_rules('service1_text', 'Service1_text', 'trim');
	$this->form_validation->set_rules('service2_heading', 'Service2_heading', 'trim');
	$this->form_validation->set_rules('service2_text', 'Service2_text', 'trim');
	$this->form_validation->set_rules('service3_heading', 'Service3_heading', 'trim');
	$this->form_validation->set_rules('service3_text', 'Service3_text', 'trim');
	$this->form_validation->set_rules('choose_heading', 'Choose_heading', 'trim');
	$this->form_validation->set_rules('choose_text', 'Choose_text', 'trim');
	$this->form_validation->set_rules('choose1_heading', 'Choose1_heading', 'trim');
	$this->form_validation->set_rules('choose1_text', 'Choose1_text', 'trim');
	$this->form_validation->set_rules('choose2_heading', 'Choose2_heading', 'trim');
	$this->form_validation->set_rules('choose2_text', 'Choose2_text', 'trim');
	$this->form_validation->set_rules('choose3_heading', 'Choose3_heading', 'trim');
	$this->form_validation->set_rules('choose3_text', 'Choose3_text', 'trim');
	$this->form_validation->set_rules('plan_subheading', 'Plan_subheading', 'trim');
	$this->form_validation->set_rules('plan_heading', 'Plan_heading', 'trim');
	$this->form_validation->set_rules('plan_text', 'Plan_text', 'trim');
	$this->form_validation->set_rules('feedback_subheading', 'Feedback_subheading', 'trim');
	$this->form_validation->set_rules('feedback_heading', 'Feedback_heading', 'trim');
	$this->form_validation->set_rules('feedback_text', 'Feedback_text', 'trim');
	$this->form_validation->set_rules('calculate_subheading', 'Calculate_subheading', 'trim');
	$this->form_validation->set_rules('calculate_heading', 'Calculate_heading', 'trim');
	$this->form_validation->set_rules('calculate_text', 'Calculate_text', 'trim');
	$this->form_validation->set_rules('referral_subheding', 'Referral_subheding', 'trim');
	$this->form_validation->set_rules('referral_heading', 'Referral_heading', 'trim');
	$this->form_validation->set_rules('referral_text', 'Referral_text', 'trim');
	$this->form_validation->set_rules('mission_subheading', 'Mission_subheading', 'trim');
	$this->form_validation->set_rules('mission_heading', 'Mission_heading', 'trim');
	$this->form_validation->set_rules('mission_text', 'Mission_text', 'trim');
	$this->form_validation->set_rules('meta_keywords', 'Meta_keywords', 'trim');
	$this->form_validation->set_rules('meta_description', 'Meta_description', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file Page_home.php */
/* Location: ./application/controllers/Page_home.php */