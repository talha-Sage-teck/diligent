<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class Inspection extends Front_Controller {
	//	protected $loopcount;
	//	protected $repeatloop = TRUE;
	//	public $loopreturn = TRUE;

	function __construct() {
		parent::__construct();
		$group = array( 'admin','inspector', 'agent' );
		if ( !$this->ion_auth->in_group( $group ) ) {
			$this->session->set_flashdata( 'message', 'You must be an Inspector to view this page' );
			redirect( '/' );
		}

		$this->data['page_title'] = 'Inspections';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'inspection';

		$this->load->model( 'inspection_model' );
		$this->load->model( 'users_model' );

	}

	public
	function index() {
		$data = array();
		redirect('inspection/list');

	}
	
	public function list(){
		$filter = $this->input->get("filter");
		$condition = [];
		if ( !$this->ion_auth->in_group( ['admin', 'agent'] ) ) {
		$condition = ["prepared_by" => $this->user_id];
		}
		$list = $this->inspection_model->get_list($condition);

        $data = array(
            'data_list' => $list,
        );

        $this->renderView('inspection/list', $data);
	}

	public
	function addinspection() {
		$data = array(
			'button' => 'Create',
			'action' => 'Add',
			'frm_action' => site_url( 'inspection/create_action' ),
			'project' => set_value( 'project' ),
			'clientname' => set_value( 'clientname' ),
			'location' => set_value( 'location' ),
			'cleaning_drops' => set_value( 'cleaning_drops' ),
			'cleaning_target_drops' => set_value( 'cleaning_target_drops' ),
			'washing_drops' => set_value( 'washing_drops' ),
			'washing_target_drops' => set_value( 'washing_target_drops' ),
			'total_target_workers' => set_value( 'total_target_workers' ),
			'comments' => set_value( 'comments' ),
		);
		$data['row'] = [];
		$this->renderView( 'inspection/inspection_add', $data );
	}

	public
	function create_action() {
		$this->_rules();

		if ( $this->form_validation->run() == FALSE ) {
			$this->addinspection();
		} else {
			$data = array(
				'clientname' => $this->input->post( 'clientname', TRUE ),
				'project' => $this->input->post( 'project', TRUE ),
				'location' => $this->input->post( 'location', TRUE ),
				'cleaning_drops' => $this->input->post( 'cleaning_drops', TRUE ),
				'cleaning_target_drops' => $this->input->post( 'cleaning_target_drops', TRUE ),
				'cleaning_total_drops' => $this->input->post( 'cleaning_total_drops', TRUE ),
				'washing_drops' => $this->input->post( 'washing_drops', TRUE ),
				'washing_target_drops' => $this->input->post( 'washing_target_drops', TRUE ),				
				'washing_total_drops' => $this->input->post( 'washing_total_drops', TRUE ),
				'comments' => $this->input->post( 'comments', TRUE ),
				'total_target_workers' => $this->input->post( 'cleaning_total_drops') + $this->input->post( 'washing_total_drops'),
				
				'prepared_by' => $this->user_id,
			);

			$qinsert_id = $this->inspection_model->insert( $data );
			
			/// send email to admin
			$row = $this->inspection_model->get_by_id($qinsert_id);
			$prep_info = $this->users_model->get_by_id($row->prepared_by);
			$emaildata = ["info" => $row, "inspector_info" => $prep_info];
			$emailnfo = array('subject' => 'New Inspection', 'to' => ADMIN_EMAIL);
			$template = 'email_templates/admin_inspection_created';			
			$sent = $this->send_email($emailnfo, $emaildata, $template);
			
			$this->session->set_flashdata( 'message', 'Create Record Success' );
			redirect( 'inspection' );
		}

	}
	
	function view($id = 0){
		$row = $this->inspection_model->get_by_id($id);
		$data["info"] = $row;
		
        if ($row) {
            $this->renderView('inspection/read', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('inspection'));
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
		$this->form_validation->set_error_delimiters( '<div>', '</div>' );
	}



}