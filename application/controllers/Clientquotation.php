<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class ClientQuotation extends Front_Controller {
	//	protected $loopcount;
	//	protected $repeatloop = TRUE;
	//	public $loopreturn = TRUE;

	function __construct() {
		parent::__construct();
		$this->load->model( 'quotation_model' );
		$this->load->model( 'users_model' );
		$this->load->model( 'quotation_services_model' );
		$this->load->model( 'quotation_status_model' );

	}

	public
	function index() {
		$data = array();
		exit("No data to show, please verify your link.");

	}
	function viewquotation($id = 0){
		$row = $this->quotation_model->get_by_id($id);
        if ($row) {
			$data = $this->_read_quotation($id, $row);
            $this->renderView('quotation/clientread', $data, false);
        } else {
			exit('Record Not Found');
//            $this->session->set_flashdata('error', 'Record Not Found');
//            redirect(site_url('clientquotation'));
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
			'prepared_by' => $userinfo->first_name.' '.$userinfo->last_name,
			'created_at' => $row->created_at,
			'mobduration' => $row->mobduration,
			'workduration' => $row->workduration,
			'services' => $services,
			'status' => $row->status,
			'quotation_text' => $row->quotation_text,
	    );
		
		return $data;
	}

	function changestatus(){
		$status = $this->input->post("status");
		$quoteid = $this->input->post("quoteid");
		$description = $this->input->post("description");
		$reprice = $this->input->post("counter_price");
		
		$data = ['status' => $status,
				 'description' => $description,
				'quotation_id' => $quoteid,
				'counter_price' => $reprice
				];
		$insertid = $this->quotation_status_model->insert($data);
		if($insertid){
			$updated = $this->quotation_model->update($quoteid, ['status' => $status]);
			if($updated)
			redirect('clientquotation/showstatus');
		}
		
	}
	
	function downloadpdf($id){
		$row = $this->quotation_model->get_by_id($id);
		$data = $this->_read_quotation($id, $row);
		$data['template'] = "pdf_templates/quotation";
		$data['pdffilename'] = "BETTER-Qt-S".date('Y', strtotime($data['created_at']))."-".$data['id'].".pdf";
		$this->createPDF($data , "D");
	}
	
	
	function showstatus(){
		$data = [];
		$this->renderView('quotation/client_saved_status', $data, false);
	}

}