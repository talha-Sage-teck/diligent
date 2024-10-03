<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Investment_packages extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Investment_packages';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'investment_packages';
        $this->load->model('investment_packages_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $investment_packages = $this->investment_packages_model->get_all();

        $data = array(
            'investment_packages_data' => $investment_packages
        );

        $this->renderView('investment_packages/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'title' ,
		'description' ,
		'daily_percentage_earnings' ,
		'maturity_duration' ,
		'referral_comission_type' ,
		'referral_comission' ,
		'contract_duration' ,
		'created_date' ,
		'withdraw_deduction' ,
		'min_deposit' ,);
				
	}

    public function read($id) 
    {
        $row = $this->investment_packages_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'title' => $row->title,
			'description' => $row->description,
			'daily_percentage_earnings' => $row->daily_percentage_earnings,
			'maturity_duration' => $row->maturity_duration,
			'referral_comission_type' => $row->referral_comission_type,
			'referral_comission' => $row->referral_comission,
			'contract_duration' => $row->contract_duration,
			'created_date' => $row->created_date,
			'withdraw_deduction' => $row->withdraw_deduction,
			'min_deposit' => $row->min_deposit,
	    );
            $this->renderView('investment_packages/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('investment_packages'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => admin_url('investment_packages/create_action'),
		    'id' => set_value('id'),
		    'title' => set_value('title'),
		    'description' => set_value('description'),
		    'daily_percentage_earnings' => set_value('daily_percentage_earnings'),
		    'maturity_duration' => set_value('maturity_duration'),
		    'referral_comission_type' => set_value('referral_comission_type'),
		    'referral_comission' => set_value('referral_comission'),
		    'contract_duration' => set_value('contract_duration'),
		    'created_date' => set_value('created_date'),
		    'withdraw_deduction' => set_value('withdraw_deduction'),
		    'min_deposit' => set_value('min_deposit'),
		);
        $this->renderView('investment_packages/form', $data);
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
				'daily_percentage_earnings' => $this->input->post('daily_percentage_earnings',TRUE),
				'maturity_duration' => $this->input->post('maturity_duration',TRUE),
				'referral_comission_type' => $this->input->post('referral_comission_type',TRUE),
				'referral_comission' => $this->input->post('referral_comission',TRUE),
				'contract_duration' => $this->input->post('contract_duration',TRUE),
				'created_date' => $this->input->post('created_date',TRUE),
				'withdraw_deduction' => $this->input->post('withdraw_deduction',TRUE),
				'min_deposit' => $this->input->post('min_deposit',TRUE),
	    );

            $this->investment_packages_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(admin_url('investment_packages'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->investment_packages_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => admin_url('investment_packages/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('investment_packages/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('investment_packages'));
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
				'daily_percentage_earnings' => $this->input->post('daily_percentage_earnings',TRUE),
				'maturity_duration' => $this->input->post('maturity_duration',TRUE),
				'referral_comission_type' => $this->input->post('referral_comission_type',TRUE),
				'referral_comission' => $this->input->post('referral_comission',TRUE),
				'contract_duration' => $this->input->post('contract_duration',TRUE),
				'created_date' => $this->input->post('created_date',TRUE),
				'withdraw_deduction' => $this->input->post('withdraw_deduction',TRUE),
				'min_deposit' => $this->input->post('min_deposit',TRUE),
	    );

            $this->investment_packages_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(admin_url('investment_packages'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->investment_packages_model->get_by_id($id);

        if ($row) {
            $this->investment_packages_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(admin_url('investment_packages'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('investment_packages'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'Title', 'trim');
	$this->form_validation->set_rules('description', 'Description', 'trim');
	$this->form_validation->set_rules('daily_percentage_earnings', 'daily_percentage_earnings', 'trim');
	$this->form_validation->set_rules('contract_duration', 'Contract_duration', 'trim');
	$this->form_validation->set_rules('min_deposit', 'Min_deposit', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file Investment_packages.php */
/* Location: ./application/controllers/Investment_packages.php */