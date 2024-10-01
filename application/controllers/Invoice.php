<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Invoice extends Front_Controller
{
//	protected $loopcount;
//	protected $repeatloop = TRUE;
//	public $loopreturn = TRUE;
 
  function __construct()
  {
    parent::__construct();
	  
	$group = array( 'admin', 'agent' );
	if ( !$this->ion_auth->in_group( $group ) ) {
		$this->session->set_flashdata( 'message', 'You must be a Admin or Agent to view this page' );
		redirect( '/' );
	}

	$this->data['page_title'] = 'Invoices';
	$this->data['action'] = 'list';
	$this->data['pslug'] = 'invoice';
	  
	$this->load->model('users_model');
	$this->load->model('quotation_model');		
	$this->load->model('invoice_model');		
	$this->load->model('invoice_services_model');		
  }
 

	public
	function index() {
		$data = array();
		redirect('invoice/invoicelist');

	}
	
	public function invoicelist(){
		$filter = $this->input->get("filter");
		$condition = [];
		
		$list = $this->invoice_model->get_all($condition);

        $data = array(
            'invoice_data' => $list,
        );

        $this->renderView('invoice/list', $data);
	}
	
	public
	function addinvoice($quotation_id = 0) {
		$row = $this->quotation_model->get_by_id($quotation_id);
		if(!$row){
			$this->session->set_flashdata( 'error', 'No Quotation data found!' );
			redirect( 'invoice/invoicelist' );
		}
		$data = array(
			'button' => 'Create',
			'action' => 'Add',
			'frm_action' => site_url( 'invoice/create_action' ),
			'quotation_id' => $quotation_id,
			'clientname' => $row->clientname,
		);
//		$data['services'] = db_options_arr($this->services_model->get_all(), 'id', 'title');
		$data['row'] = [];
		$this->renderView( 'invoice/add', $data );
	}

	public
	function create_action() {
		$this->_rules();

		if ( $this->form_validation->run() == FALSE ) {
			$this->addinvoice($this->input->post( 'quotation_id', TRUE ));
		} else {
			$data = array(
				'clientname' => $this->input->post( 'clientname', TRUE ),
				'month' => $this->input->post( 'month', TRUE ),
				'year' => $this->input->post( 'year', TRUE ),
				'for_building' => $this->input->post( 'for_building', TRUE ),
				'office' => $this->input->post( 'office', TRUE ),
				'prepared_by' => $this->user_id,
				'phone' => $this->input->post( 'phone', TRUE ),
				'trn_number' => $this->input->post( 'trn_number', TRUE ),
				'ref_number' => $this->input->post( 'ref_number', TRUE ),
				'grand_total' => $this->input->post( 'grand_total', TRUE ),				
				'quotation_id' => $this->input->post( 'quotation_id', TRUE ),
			);
			$quotation_id = $this->input->post( 'quotation_id', TRUE );
			$qinsert_id = $this->invoice_model->insert( $data );
			
			$this->_add_services($qinsert_id);
			
			
			$this->session->set_flashdata( 'message', 'Create Record Success' );
			redirect( 'invoice/invoicelist' );
		}

	}
	
	private function _add_services($invoice_id){	
		// delete all service of invoice then recreate all
		$this->invoice_services_model->delete($invoice_id,"invoice_id");
		
		$services = $this->input->post( 'services', TRUE );
		$rate = $this->input->post( 'rate', TRUE );
		$qty = $this->input->post( 'qty', TRUE );
		$tax_amount = $this->input->post( 'tax_amount', TRUE );
		$total_amount = $this->input->post( 'total_amount', TRUE );
		
		
		for($i = 0; $i< count($services); $i++){
			if($rate[$i] != "" && $qty[$i] != ""){
			$services_data[] = [
								"title" => $services[$i],
								"rate" => $rate[$i],
								"qty" => $qty[$i],
								"tax_amount" => $tax_amount[$i],
								"total_amount" => $total_amount[$i],
								"invoice_id" => $invoice_id,
							   ];
			}
		}
		$this->invoice_services_model->insert_bulk($services_data);
	}
	
	
    public function _columns(){
		return $fields = array(
		'id' ,
		'month' ,
		'year' ,
		'clientname' ,
		'for_building' ,
		'office' ,
		'phone' ,
		'trn_number' ,
		'ref_number' ,
		'prepared_by' ,
		'quotation_id' ,
		'grand_total' ,
		'created_at' ,
		
		);
				
	}

	
    public function update($id) 
    {
        $row = $this->invoice_model->get_by_id($id);
		$services = $this->invoice_services_model->getByInvId($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => site_url('invoice/update_action'),
				'services' => $services,
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('invoice/edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoice'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'month' => $this->input->post('month',TRUE),
				'year' => $this->input->post('year',TRUE),
				'clientname' => $this->input->post('clientname',TRUE),
				'for_building' => $this->input->post('for_building',TRUE),
				'office' => $this->input->post('office',TRUE),
				'phone' => $this->input->post('phone',TRUE),
				'trn_number' => $this->input->post('trn_number',TRUE),
				'ref_number' => $this->input->post('ref_number',TRUE),
				'grand_total' => $this->input->post('grand_total',TRUE),
	    );
//var_dump($data); exit;
            $this->invoice_model->update($this->input->post('id', TRUE), $data);
			
			$this->_add_services($this->input->post('id', TRUE));
			
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('invoice/invoicelist'));
        }
    }
    
	
		
	function _read_invoice($id, $row){
		$userinfo = $this->users_model->get_by_id($row->prepared_by);
		$services = $this->invoice_services_model->getByInvId($id);
            $data = array(
			'id' => $row->id,
			'clientname' => $row->clientname,
			'month' => $row->month,
			'year' => $row->year,
			'for_building' => $row->for_building,
			'office' => $row->office,
			'phone' => $userinfo->phone,
			'created_at' => $row->created_at,
			'trn_number' => $row->trn_number,
			'ref_number' => $row->ref_number,
			'grand_total' => $row->grand_total,
			'services' => $services,
	    );
		
		return $data;
	}
	
		
	function view($id = 0){
		$row = $this->invoice_model->get_by_id($id);
        if ($row) {
			$data = $this->_read_invoice($id, $row);
            $this->renderView('invoice/read', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('invoice'));
        }
	}
	
	
	function ajax_service_block(){
//		$data['services'] = db_options_arr($this->services_model->get_all(), 'id', 'title');
		$data['row'] = [];
		$data['action'] = 'Add';
		$data['counter'] = $this->input->get("counter");
		
		echo $this->load->view("ajax_inc/inv_services_add_block", $data, true);
	}

	
	function downloadpdf($id){
		$row = $this->invoice_model->get_by_id($id);
		
		$data = $this->_read_invoice($id, $row);
		$data['template'] = "pdf_templates/invoice";
//		$data['services'] = $services;
		$data['pdffilename'] = "INV-BAC-".date('Y', strtotime($data['created_at']))."-".$data['id'].".pdf";
		$this->createPDF($data , "D");
	}
	
	    
    public function delete($id) 
    {
        $row = $this->invoice_model->get_by_id($id);

        if ($row) {
			$this->invoice_services_model->delete($id, "invoice_id");
            $this->invoice_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('invoice/invoicelist'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('invoice/invoicelist'));
        }
    }

	
	public
	function _rules() {
		$this->form_validation->set_rules( 'clientname', 'Client Name', 'trim|required' );
		$this->form_validation->set_rules( 'month', 'Month', 'trim|required' );
		$this->form_validation->set_rules( 'year', 'Year', 'trim|required' );
		$this->form_validation->set_rules( 'for_building', 'Building name', 'trim|required' );
		$this->form_validation->set_rules( 'office', 'Office', 'trim|required' );
		$this->form_validation->set_rules( 'services[]', 'Services', 'trim|required' );
		$this->form_validation->set_error_delimiters( '<div>', '</div>' );
	}

  
  
}