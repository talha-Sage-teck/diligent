<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class Quotation extends Front_Controller {
	//	protected $loopcount;
	//	protected $repeatloop = TRUE;
	//	public $loopreturn = TRUE;

	function __construct() {
		parent::__construct();
		$group = array( 'admin', 'inspector' );
		if ( !$this->ion_auth->in_group( $group ) ) {
			$this->session->set_flashdata( 'message', 'You must be a Admin or Agent to view this page' );
			redirect( '/' );
		}

		$this->data['page_title'] = 'Quotations';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'quotation';

		$this->load->model( 'quotation_model' );
		$this->load->model( 'users_model' );
		$this->load->model( 'quotation_services_model' );
		$this->load->model( 'quotation_status_model' );
		$this->load->model( 'services_model' );
		$this->load->model( 'inspection_model' );

	}

	public
	function index() {
		$data = array();
		redirect('quotation/quotationlist');

	}
	
	public function quotationlist(){
		$filter = $this->input->get("filter");
		$condition = [];
		
		if ( $this->ion_auth->in_group( 'agent' ) ) {
			$condition['prepared_by'] = $this->user_id;
			if($filter != "")
			$condition["status"] = $filter;
			$list = $this->quotation_model->getlist($condition);
		}else{
			if($filter != "")
			$condition["status"] = $filter;	
			$list = $this->quotation_model->getlist($condition);
		}

        $data = array(
            'quotation_data' => $list,
			'filter' => $filter,
        );

        $this->renderView('quotation/list', $data);
	}

	public
	function addquotation($inspection_id = 0) {
		$row = $this->inspection_model->get_by_id($inspection_id);
		if(!$row){
			$this->session->set_flashdata( 'error', 'No inspection data found!' );
			redirect( 'quotation/quotationlist' );
		}
		$data = array(
			'button' => 'Create',
			'action' => 'Add',
			'frm_action' => site_url( 'quotation/create_action' ),
			'inspection_id' => $inspection_id,
			'clientname' => $row->clientname,
			'project' => $row->project,
			'location' => $row->location,
			'default_quotation_html' => $this->load->view("ajax_inc/default_quotation_html", [] ,true),
		);
//		$data['services'] = db_options_arr($this->services_model->get_all(), 'id', 'title');
		$data['row'] = [];
		$this->renderView( 'quotation/quotation_add', $data );
	}

	public
	function create_action() {
		$this->_rules();

		if ( $this->form_validation->run() == FALSE ) {
			$this->addquotation($this->input->post( 'inspection_id', TRUE ));
		} else {
			$data = array(
				'clientname' => $this->input->post( 'clientname', TRUE ),
				'attention' => $this->input->post( 'attention', TRUE ),
				'project' => $this->input->post( 'project', TRUE ),
				'location' => $this->input->post( 'location', TRUE ),
				'validity_days' => $this->input->post( 'validity_days', TRUE ),
				'prepared_by' => $this->user_id,
				'mobduration' => $this->input->post( 'mobduration', TRUE ),
				'workduration' => $this->input->post( 'workduration', TRUE ),
				'inspection_id' => $this->input->post( 'inspection_id', TRUE ),
				'quotation_text' => $this->input->post( 'quotation_text', TRUE ),
			);
			$inspection_id = $this->input->post( 'inspection_id', TRUE );
			$qinsert_id = $this->quotation_model->insert( $data );
			
			$this->_add_services($qinsert_id);
			
			//// update inspection status => quotation_generated -> 1
			$this->inspection_model->update($inspection_id, ["quotation_generated" => 1]);
			
			/// send email to admin
			$row = $this->quotation_model->get_by_id($qinsert_id);
			$qdata = $this->_read_quotation($qinsert_id, $row);
			$emailnfo = array('subject' => 'New Quotation for '.$qdata['clientname'], 'to' => ADMIN_EMAIL);
			$template = 'email_templates/admin_quotation_created';			
			$sent = $this->send_email($emailnfo, $qdata, $template);
			
			$this->session->set_flashdata( 'message', 'Create Record Success' );
			redirect( 'quotation/view/'.$qinsert_id );
		}

	}
	
	function view($id = 0){
		$row = $this->quotation_model->get_by_id($id);
        if ($row) {
			$data = $this->_read_quotation($id, $row);
            $this->renderView('quotation/read', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('quotation'));
        }
	}
	
	function viewquotation($id = 0){
		$row = $this->quotation_model->get_by_id($id);
        if ($row) {
			$data = $this->_read_quotation($id, $row);
            $this->renderView('quotation/clientread', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('quotation'));
        }
	}
	
	 public function update($id) 
    {
        $row = $this->quotation_model->get_by_id($id);
		$data = $this->_read_quotation($id, $row);
		 
        if ($row) {
            $data['button'] = 'Update';			
            $data['action'] = 'update';			
            $data['frm_action'] = site_url('quotation/update_action');

		$this->renderView('quotation/edit', $data);
			
        } else {
			var_dump($row); exit;
            $this->session->set_flashdata('message', 'Record Not Found!');
            redirect(site_url('quotation'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'clientname' => $this->input->post( 'clientname', TRUE ),
				'attention' => $this->input->post( 'attention', TRUE ),
				'project' => $this->input->post( 'project', TRUE ),
				'location' => $this->input->post( 'location', TRUE ),
				'validity_days' => $this->input->post( 'validity_days', TRUE ),
				'mobduration' => $this->input->post( 'mobduration', TRUE ),
				'workduration' => $this->input->post( 'workduration', TRUE ),
				'quotation_text' => $this->input->post( 'quotation_text', TRUE ),
	    );
//var_dump($data); exit;
            $this->quotation_model->update($this->input->post('id', TRUE), $data);
			
			$this->_add_services($this->input->post('id', TRUE));
			
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('quotation/quotationlist'));
        }
    }
    
	
	
	function _read_quotation($id, $row){
		$userinfo = $this->users_model->get_by_id($row->prepared_by);
			$services = $this->quotation_services_model->getByQuoteId($id);
            $data = array(
			'id' => $row->id,
			'clientname' => $row->clientname,
			'attention' => $row->attention,
			'project' => $row->project,
			'location' => $row->location,
			'validity_days' => $row->validity_days,
			'prepared_by' => $userinfo->username,
			'created_at' => $row->created_at,
			'mobduration' => $row->mobduration,
			'workduration' => $row->workduration,
			'quotation_text' => $row->quotation_text,
			'services' => $services,
	    );
		
		return $data;
	}
	
	private function _add_services($quotation_id){
		// delete all service of then recreate all
		$this->quotation_services_model->delete($quotation_id,"quotation_id");
		
		$services = $this->input->post( 'services', TRUE );
			$frequency = $this->input->post( 'sfrequency', TRUE );
			$price = $this->input->post( 'sprice', TRUE );
			for($i = 0; $i< count($services); $i++){
				if($frequency[$i] != "" && $price[$i] != ""){
				$services_data[] = [
									"title" => $services[$i],
									"frequency" => $frequency[$i],
									"price" => $price[$i],
									"quotation_id" => $quotation_id,
								   ];
				}
			}
			$this->quotation_services_model->insert_bulk($services_data);
	} 
	
	 
    public function delete($id) 
    {
        $row = $this->quotation_model->get_by_id($id);

        if ($row) {
			
            $this->quotation_services_model->delete($id, "quotation_id");
            $this->quotation_status_model->delete($id, "quotation_id");
            $this->quotation_model->delete($id);
			
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect('quotation/quotationlist');
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect('quotation/quotationlist');
        }
    }
	
	function ajax_service_block(){
		$data['services'] = db_options_arr($this->services_model->get_all(), 'id', 'title');
		$data['row'] = [];
		$data['action'] = 'Add';
		$data['counter'] = $this->input->get("counter");
		
		echo $this->load->view("ajax_inc/services_add_block", $data, true);
	}

	public
	function _rules() {
		$this->form_validation->set_rules( 'clientname', 'Client Name', 'trim|required' );
		$this->form_validation->set_rules( 'services[]', 'Services', 'trim|required' );
		$this->form_validation->set_error_delimiters( '<div>', '</div>' );
	}



}