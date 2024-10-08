<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Challan extends Front_Controller
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

	$this->data['page_title'] = 'Challan';
	$this->data['action'] = 'list';
	$this->data['pslug'] = 'challan';
	  
	$this->load->model('users_model');
	$this->load->model('items_model');
	$this->load->model('quotation_model');		
	$this->load->model('challan_model');		
	$this->load->model('delievery_items_model');		
  }
 

	public
	function index() {
		$data = array();
		redirect('challan/challanlist');

	}
	
	public function challanlist(){
		$filter = $this->input->get("filter");
		$condition = [];
		
		$list = $this->challan_model->get_all($condition);

        $data = array(
            'challan_data' => $list,
        );

        $this->renderView('challan/list', $data);
	}
	
	public
	function addchallan($quotation_id = 0) {
		$row = $this->quotation_model->get_by_id($quotation_id);
		if(!$row){
			$this->session->set_flashdata( 'error', 'No Quotation data found!' );
			redirect( 'challan/challanlist' );
		}
		$data = array(
			'button' => 'Create',
			'action' => 'Add',
			'frm_action' => site_url( 'challan/create_action' ),
			'quotation_id' => $quotation_id,
			'clientname' => $row->clientname,
		);
		$data['items'] = db_options_arr($this->items_model->get_all(), 'id', 'title');
		$data['row'] = [];
		$this->renderView( 'challan/add', $data );
	}

	public
	function create_action() {
		$this->_rules();

		if ( $this->form_validation->run() == FALSE ) {
			$this->addchallan($this->input->post( 'quotation_id', TRUE ));
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
				'quotation_id' => $this->input->post( 'quotation_id', TRUE ),
			);
			$quotation_id = $this->input->post( 'quotation_id', TRUE );
			$qinsert_id = $this->challan_model->insert( $data );
			
			$this->_add_services($qinsert_id);
			
			
			$this->session->set_flashdata( 'message', 'Create Record Success' );
			redirect( 'challan/challanlist' );
		}

	}
	
	private function _add_services($challan_id){	
		// delete all service of challan then recreate all
		$this->delievery_items_model->delete($challan_id,"challan_id");
		
		$items = $this->input->post( 'items', TRUE );
		$qty = $this->input->post( 'qty', TRUE );
		
		
		for($i = 0; $i< count($items); $i++){
			if($qty[$i] != ""){
			$services_data[] = [
								"title" => $items[$i],
								"qty" => $qty[$i],
								"challan_id" => $challan_id,
							   ];
			}
		}
		$this->delievery_items_model->insert_bulk($services_data);
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
		'created_at' ,
		
		);
				
	}

	
    public function update($id) 
    {
        $row = $this->challan_model->get_by_id($id);
		$items = $this->delievery_items_model->getByInvId($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => site_url('challan/update_action'),
				'items'=> $items,
				'myitems' => db_options_arr($this->items_model->get_all(), 'id', 'title'),
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('challan/edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('challan'));
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
	    );
//var_dump($data); exit;
            $this->challan_model->update($this->input->post('id', TRUE), $data);
			
			$this->_add_services($this->input->post('id', TRUE));
			
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('challan/challanlist'));
        }
    }
    
	
		
	function _read_challan($id, $row){
		$userinfo = $this->users_model->get_by_id($row->prepared_by);
		$items = $this->delievery_items_model->getByInvId($id);
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
			'items' => $items,
	    );
		
		return $data;
	}
	
		
	function view($id = 0){
		$row = $this->challan_model->get_by_id($id);
        if ($row) {
			$data = $this->_read_challan($id, $row);
            $this->renderView('challan/read', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('challan'));
        }
	}
	
	
	function ajax_service_block(){
		$data['myitems'] = db_options_arr($this->items_model->get_all(), 'id', 'title');
		$data['row'] = [];
		$data['action'] = 'Add';
		$data['counter'] = $this->input->get("counter");
		
		echo $this->load->view("ajax_inc/cha_services_add_block", $data, true);
	}

	
	function downloadpdf($id){
		$row = $this->challan_model->get_by_id($id);
		
		$data = $this->_read_challan($id, $row);
		$data['template'] = "pdf_templates/challan";
		$data['pdffilename'] = "CHA-BAC-".date('Y', strtotime($data['created_at']))."-".$data['id'].".pdf";
		$this->createPDF($data , "D");
	}
	
	    
    public function delete($id) 
    {
        $row = $this->challan_model->get_by_id($id);

        if ($row) {
			$this->delievery_items_model->delete($id, "challan_id");
            $this->challan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('challan/challanlist'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('challan/challanlist'));
        }
    }

	
	public
	function _rules() {
		$this->form_validation->set_rules( 'clientname', 'Client Name', 'trim|required' );
		$this->form_validation->set_rules( 'month', 'Month', 'trim|required' );
		$this->form_validation->set_rules( 'year', 'Year', 'trim|required' );
		$this->form_validation->set_rules( 'for_building', 'Building name', 'trim|required' );
		$this->form_validation->set_rules( 'office', 'Office', 'trim|required' );
		$this->form_validation->set_rules( 'items[]', 'items', 'trim|required' );
		$this->form_validation->set_error_delimiters( '<div>', '</div>' );
	}

  
  
}