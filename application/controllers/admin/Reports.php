<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reports extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Reports';
		
        $this->load->model('reports_model');
		$this->load->model('users_model');
    }

    public function deposit()
    {
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'deposit';
        $deposit = $this->reports_model->deposit();
        $data = array(
            'deposit_data' => $deposit
        );

        $this->renderView('reports/deposit', $data);
    }
	
	public function deposit_details($user_id)
    {
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'deposit';
        $deposit = $this->reports_model->deposit_detail($user_id);
		$userdata = $this->users_model->get_by_id($user_id);
        $data = array(
            'deposit_data' => $deposit,
			'user_data' => $userdata
        );

        $this->renderView('reports/deposit_detail', $data);
    }

};

/* End of file Inbox.php */
/* Location: ./application/controllers/Inbox.php */