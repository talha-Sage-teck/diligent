<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Schemes extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Schemes';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'schemes';
        $this->load->model('schemes_model');
		$this->load->model('scheme_schedular_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $schemes = $this->schemes_model->get_all();

        $data = array(
            'schemes_data' => $schemes,
			'cur_scheme' => $this->current_scheme(),
        );

        $this->renderView('schemes/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'start_date' ,
		'end_date' ,
		'process_date' ,
		'charges' ,
		'is_closed' ,
		'max_winners' ,
		'prize_1' ,
		'prize_2' ,
		'prize_3' ,
		'prize_other' ,);
				
	}

    public function read($id) 
    {
        $row = $this->schemes_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'start_date' => $row->start_date,
			'end_date' => $row->end_date,
			'process_date' => $row->process_date,
			'charges' => $row->charges,
			'is_closed' => $row->is_closed,
			'max_winners' => $row->max_winners,
			'prize_1' => $row->prize_1,
			'prize_2' => $row->prize_2,
			'prize_3' => $row->prize_3,
			'prize_other' => $row->prize_other,
	    );
            $this->renderView('schemes/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('schemes'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => admin_url('schemes/create_action'),
		    'id' => set_value('id'),
		    'start_date' => set_value('start_date'),
		    'end_date' => set_value('end_date'),
		    'process_date' => set_value('process_date'),
		    'charges' => set_value('charges'),
		    'is_closed' => set_value('is_closed'),
		    'max_winners' => set_value('max_winners'),
		    'prize_1' => set_value('prize_1'),
		    'prize_2' => set_value('prize_2'),
		    'prize_3' => set_value('prize_3'),
		    'prize_other' => set_value('prize_other'),
		);
        $this->renderView('schemes/form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
		}
		elseif(!empty($this->current_scheme())){
			$this->session->set_flashdata('error', 'Currently one scheme is already running.');
			redirect(admin_url('schemes'));	
        } else {
            $data = array(
				'start_date' => $this->input->post('start_date',TRUE),
				'end_date' => $this->input->post('end_date',TRUE),
				'process_date' => $this->input->post('process_date',TRUE),
				'charges' => $this->input->post('charges',TRUE),
				'is_closed' => $this->input->post('is_closed',TRUE),
				'max_winners' => $this->input->post('max_winners',TRUE),
				'prize_1' => $this->input->post('prize_1',TRUE),
				'prize_2' => $this->input->post('prize_2',TRUE),
				'prize_3' => $this->input->post('prize_3',TRUE),
				'prize_other' => $this->input->post('prize_other',TRUE),
	    );

            $newid = $this->schemes_model->insert($data);
			if($newid > 0){
				$sch_data = array(
								'scheme_id' => $newid,
								'process_date' => $data['process_date'],
								
								);
				$this->scheme_schedular_model->insert($sch_data);
							
				}
            $this->session->set_flashdata('message', 'Create Record Success. Now create winning positions and values.');
            redirect(admin_url('schemes'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->schemes_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => admin_url('schemes/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('schemes/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('schemes'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'start_date' => $this->input->post('start_date',TRUE),
				'end_date' => $this->input->post('end_date',TRUE),
				'process_date' => $this->input->post('process_date',TRUE),
				'charges' => $this->input->post('charges',TRUE),
				'is_closed' => $this->input->post('is_closed',TRUE),
				'max_winners' => $this->input->post('max_winners',TRUE),
				'prize_1' => $this->input->post('prize_1',TRUE),
				'prize_2' => $this->input->post('prize_2',TRUE),
				'prize_3' => $this->input->post('prize_3',TRUE),
				'prize_other' => $this->input->post('prize_other',TRUE),
	    );

            $this->schemes_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(admin_url('schemes'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->schemes_model->get_by_id($id);

        if ($row) {
            $this->schemes_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(admin_url('schemes'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('schemes'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('start_date', 'Start_date', 'trim|required');
	$this->form_validation->set_rules('end_date', 'End_date', 'trim|required');
	$this->form_validation->set_rules('process_date', 'Process_date', 'trim|required');
	$this->form_validation->set_rules('charges', 'Charges', 'trim|required');
	$this->form_validation->set_rules('is_closed', 'Is_closed', 'trim');
	$this->form_validation->set_rules('max_winners', 'Max_winners', 'trim|required|numeric');
	$this->form_validation->set_rules('prize_1', 'Prize_1', 'trim');
	$this->form_validation->set_rules('prize_2', 'Prize_2', 'trim');
	$this->form_validation->set_rules('prize_3', 'Prize_3', 'trim');
	$this->form_validation->set_rules('prize_other', 'Prize_other', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file Schemes.php */
/* Location: ./application/controllers/Schemes.php */