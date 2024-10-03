<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enroll extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Enroll on user behalf';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'enroll';
        $this->load->model('enroll_model');
		$this->load->model('payment_history_model');
		$this->load->model('users_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $enroll = $this->enroll_model->get_all();

        $data = array(
            'enroll_data' => $enroll
        );

        $this->renderView('enroll/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'user_id' ,
		'scheme_id' ,
		'got_gift' ,
		'paid' ,
		'paid_amount' ,
		'date' ,);
				
	}

    public function read($id) 
    {
        $row = $this->enroll_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'user_id' => $row->user_id,
			'scheme_id' => $row->scheme_id,
			'got_gift' => $row->got_gift,
			'paid' => $row->paid,
			'paid_amount' => $row->paid_amount,
			'date' => $row->date,
	    );
            $this->renderView('enroll/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('enroll'));
        }
    }
    
    public function create($userid = 0) 
    {
		$cur_scheme = $this->current_scheme();
		//var_dump($cur_scheme);
        $data = array(
            'button' => 'Enroll',
			'action' => 'Add',
            'frm_action' => admin_url('enroll/create_action/'.$userid),
		    'id' => set_value('id'),
		    'user_id' => set_value('user_id'),
		    'scheme_id' => set_value('scheme_id'),
		    'got_gift' => set_value('got_gift'),
		    'paid' => set_value('paid'),
		    'paid_amount' => set_value('paid_amount'),
		    'date' => set_value('date'),
			'cur_scheme' => $cur_scheme
		);
        $this->renderView('enroll/form', $data);
    }
    
    public function create_action($userid = 0) 
    {
		if($userid > 0){
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
			$cur_scheme = $this->current_scheme();
			if(empty($cur_scheme)){
				$this->session->set_flashdata('error', 'No scheme running right now.');
				redirect(admin_url('users'));
				}
			$u_en = $this->user_enrollable($userid);
			
			if($u_en == FALSE){
				$this->session->set_flashdata('error', 'User is already enrolled in this scheme or previous.');
				redirect(admin_url('users'));
				}
				
            $data = array(
				'user_id' => $userid,
				'scheme_id' => $cur_scheme->id,
				'got_gift' => 0,
				'paid' => $this->input->post('paid'),
				'paid_amount' => $this->input->post('paid_amount',TRUE),
				'date' => date(DATE_MYSQL),
	    );

            $newid = $this->enroll_model->insert($data);
			if(isset($newid) && $newid > 0){
				$h_data = array('date' => date(DATE_MYSQL),
								'paid_amount' => $this->input->post('paid_amount',TRUE),
								'user_id' => $userid,
								);
				$this->payment_history_model->insert($h_data);
				
				//// if the user is already won in previous schemes
				//// make won status of user to 0 -- 
				$this->users_model->update($userid, array('won' => 0));
				
				}
            $this->session->set_flashdata('message', 'User enrolled Successfully');
            redirect(admin_url('users'));
        }
		
		}
		else{
			die('User ID is not defined');
			}
    }
    
    public function update($id) 
    {
        $row = $this->enroll_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => admin_url('enroll/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('enroll/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('enroll'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'user_id' => $this->input->post('user_id',TRUE),
				'scheme_id' => $this->input->post('scheme_id',TRUE),
				'got_gift' => $this->input->post('got_gift',TRUE),
				'paid' => $this->input->post('paid',TRUE),
				'paid_amount' => $this->input->post('paid_amount',TRUE),
				'date' => date(DATE_MYSQL),
	    );

            $this->enroll_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(admin_url('enroll'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->enroll_model->get_by_id($id);

        if ($row) {
            $this->enroll_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(admin_url('enroll'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('enroll'));
        }
    }

    public function _rules() 
    {
	
	$this->form_validation->set_rules('paid', 'Paid', 'trim|required');
	$this->form_validation->set_rules('paid_amount', 'Paid_amount', 'trim|required|callback_scheme_charges');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }
	
	function scheme_charges($ch){
		$cur_scheme = $this->current_scheme();
		if($ch == $cur_scheme->charges){
			return TRUE;
			}
		else{
			$this->form_validation->set_message('scheme_charges', 'The {field} should be equal to '.$cur_scheme->charges);
			return FALSE;
			}	
		}

};

/* End of file Enroll.php */
/* Location: ./application/controllers/Enroll.php */