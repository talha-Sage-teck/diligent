<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Options extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		
		$this->data['page_title'] = 'Options';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'options';
        $this->load->model('options_model');
    }

    public function index()
    {
        $data = array('data' => $this->options_model->get_options($this->default_options()),
					'action' => 'update',
					'frm_action' => $this->data['pslug'].'/update_action',
					'button' => 'Update',
				);
				
        $this->renderView('options/form', $data);
    }
	
	public function payment(){
		$data = array('data' => $this->options_model->get_all(array(), true, 4),
					'action' => 'update',
					'frm_action' => $this->data['pslug'].'/update_action',
					'button' => 'Update',
				);
				
        $this->renderView('options/btcform', $data);
		}

    public function default_options(){
		return $fields = array(
							array('key_title' => 'site_title',
									'key_value' => 'ABC'),
							array('key_title' => 'currency',
									'key_value' => 'AED'),
							array('key_title' => 'site_email',
									'key_value' => 'abc@gmail.com'),		
		);				
	}
    
    
    public function update_action() 
    {
		//echo '<pre>';print_r($this->input->post()); exit;
		$purl = $this->input->get('payment');
		$postdata = $this->input->post();
		$this->options_model->update_bulk($postdata['opt'], 'key_title');
		  $this->session->set_flashdata('message', 'Update Record Success');
		if(isset($purl) && $purl != '')
			redirect(admin_url('options/payment'));
		else	
			redirect(admin_url('options'));
    }
    

};

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */