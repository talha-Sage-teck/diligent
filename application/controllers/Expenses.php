<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expenses extends Front_Controller
{
    function __construct()
    {
        parent::__construct();
		  
		if (!$this->ion_auth->in_group(['admin', 'inspector']))
			{
			  $this->session->set_userdata('referrer_url', $this->agent->referrer() ); 
			  //redirect them to the login page
			  redirect('login', 'refresh');
			}
		$this->data['page_title'] = 'Expenses';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'expenses';
        $this->load->model('expenses_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
		$start_date_sql = $end_date_sql = "";
		
		if($this->input->get("start_date")){
			$start_date = urldecode($this->input->get("start_date"));
			$start_date_sql = date(DATE_MYSQL, strtotime($start_date) );
		}
		if($this->input->get("end_date")){
			$end_date = urldecode($this->input->get("end_date"));
			$end_date_sql = date(DATE_MYSQL, strtotime($end_date) );
		}
		if($this->input->get("start_date") && !$this->input->get("end_date")){
			$end_date_sql = date(DATE_MYSQL);
		}
		
		if(!$this->input->get("start_date") && $this->input->get("end_date")){
			$start_date_sql = date(DATE_MYSQL);
		}
		
		if($start_date_sql){
			$expenses = $this->expenses_model->get_list($start_date_sql, $end_date_sql);
		}else{
			$expenses = $this->expenses_model->get_all();
		}
        

        $data = array(
            'expenses_data' => $expenses,
			'start_date' => $start_date_sql,
			'end_date' => $end_date_sql,
			
        );

        $this->renderView('expenses/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'title' ,
		'description' ,
		'image' ,
		'created_at' ,
		'price' ,
		'updated_at' ,);
				
	}
	
	function summary(){
		$start_date_sql = $end_date_sql = date(DATE_MYSQL);
		
		if($this->input->get("start_date")){
			$start_date = urldecode($this->input->get("start_date"));
			$start_date_sql = date(DATE_MYSQL, strtotime($start_date) );
		}
		if($this->input->get("end_date")){
			$end_date = urldecode($this->input->get("end_date"));
			$end_date_sql = date(DATE_MYSQL, strtotime($end_date) );
		}
		if($this->input->get("start_date") && !$this->input->get("end_date")){
			$end_date_sql = date(DATE_MYSQL);
		}
		
		if(!$this->input->get("start_date") && $this->input->get("end_date")){
			$start_date_sql = date(DATE_MYSQL);
		}
		
		$expenses = $this->expenses_model->summary($start_date_sql, $end_date_sql);

        $data = array(
            'expenses_data' => $expenses,
			'start_date' => $start_date_sql,
			'end_date' => $end_date_sql,
			'summary' => $expenses,
        );

        $this->renderView('expenses/summary', $data);
		
		
	}

    public function read($id) 
    {
        $row = $this->expenses_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'title' => $row->title,
			'description' => $row->description,
			'image' => $row->image,
			'created_at' => $row->created_at,
			'price' => $row->price,
			'updated_at' => $row->updated_at,
	    );
            $this->renderView('expenses/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expenses'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => site_url('expenses/create_action'),
		    'id' => set_value('id'),
		    'title' => set_value('title'),
		    'description' => set_value('description'),
		    'image' => set_value('image'),
		    'created_at' => set_value('created_at'),
		    'price' => set_value('price'),
		    'updated_at' => set_value('updated_at'),
		);
        $this->renderView('expenses/form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
		if(empty($_FILES['image'])){
			$this->form_validation->set_rules('image', 'Image', 'required');
		}
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
			/*****  upload image ****/
			if(!empty($_FILES['image']['name'])){
				$config = array(
								'upload_path' => './uploads/expenses/',
								'allowed_types' => 'gif|jpg|png|jpeg',
								);
				$file_name = $this->upload_file('image',$config);
				if($file_name === FALSE){
					$this->session->set_flashdata('error', $this->file_upload_error['error']);
					redirect('expenses/create');
				}	
			}
			/***********/
            $data = array(
				'title' => $this->input->post('title',TRUE),
				'description' => $this->input->post('description',TRUE),
				'price' => $this->input->post('price',TRUE),
				'image' => $file_name['file_name'],
	    );

            $this->expenses_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('expenses'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->expenses_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => site_url('expenses/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('expenses/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expenses'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
			/*****  upload image ****/
			if(!empty($_FILES['image']['name'])){
				$config = array(
								'upload_path' => './uploads/expenses/',
								'allowed_types' => 'gif|jpg|png|jpeg',
								);
				$file_name = $this->upload_file('image',$config);
				if($file_name === FALSE){
					$this->session->set_flashdata('error', $this->file_upload_error['error']);
					redirect('expenses/update');
				}	
			}
			/***********/
            $data = array(
				'title' => $this->input->post('title',TRUE),
				'description' => $this->input->post('description',TRUE),
				'price' => $this->input->post('price',TRUE),
	    );
			
			if(isset($file_name['file_name']) && $file_name['file_name'] != '')			
			$data['image'] = $file_name['file_name'];

            $this->expenses_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('expenses'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->expenses_model->get_by_id($id);

        if ($row) {
            $this->expenses_model->delete($id);
			$image_path = FCPATH.'uploads/expenses/';
			unlink($image_path.$row->image);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('expenses'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('expenses'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'Title', 'trim|required');
	$this->form_validation->set_rules('description', 'Description', 'trim');
	$this->form_validation->set_rules('price', 'Price', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file Expenses.php */
/* Location: ./application/controllers/Expenses.php */