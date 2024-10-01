<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gifts extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Gifts';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'gifts';
        $this->load->model('gifts_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $gifts = $this->gifts_model->get_all();

        $data = array(
            'gifts_data' => $gifts
        );

        $this->renderView('gifts/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'title' ,
		'image' ,
		'value' ,
		'gendertype' ,
		'gift_worth',);
				
	}

    public function read($id) 
    {
        $row = $this->gifts_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'title' => $row->title,
			'image' => $row->image,
			'value' => $row->value,
			'gendertype' => $row->gendertype,
			'gift_worth' => $row->gift_worth,
	    );
            $this->renderView('gifts/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('gifts'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => admin_url('gifts/create_action'),
		    'id' => set_value('id'),
		    'title' => set_value('title'),
		    'image' => set_value('image'),
		    'value' => set_value('value'),
		    'gendertype' => set_value('gendertype'),
			'gift_worth' => set_value('gift_worth'),
		);
        $this->renderView('gifts/form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
			/*****  upload image ****/
			if(!empty($_FILES['image']['name'])){
				$config = array(
								'upload_path' => './uploads/gifts/',
								'allowed_types' => 'gif|jpg|png|jpeg',
								);
				$file_name = $this->upload_file('image',$config);
				if($file_name === FALSE){
					$this->session->set_flashdata('error', $this->file_upload_error['error']);
					redirect(admin_url('gifts/create'));
				}
					
				$resize_config = array(
								'source_image' => $file_name['full_path'],								
								'width' => 200,
								'height' => 200, 
								'maintain_ratio' => TRUE,
								'new_image' => $file_name['file_path'].'/thumbs/'.$file_name['file_name'],
								);	
				$this->image_resize($resize_config, $file_name);	
			}
			/***********/
			
            $data = array(
				'title' => $this->input->post('title',TRUE),
				'image' => $file_name['file_name'],
				'value' => $this->input->post('value',TRUE),
				'gendertype' => $this->input->post('gendertype',TRUE),
				'gift_worth' => $this->input->post('gift_worth',TRUE),
	    );

            $this->gifts_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(admin_url('gifts'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->gifts_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => admin_url('gifts/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('gifts/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('gifts'));
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
								'upload_path' => './uploads/gifts/',
								'allowed_types' => 'gif|jpg|png|jpeg',
								);
				$file_name = $this->upload_file('image',$config);
				if($file_name === FALSE){
					$this->session->set_flashdata('error', $this->file_upload_error['error']);
					redirect(admin_url('gifts/create'));
				}
					
				$resize_config = array(
								'source_image' => $file_name['full_path'],								
								'width' => 200,
								'height' => 200, 
								'maintain_ratio' => TRUE,
								'new_image' => $file_name['file_path'].'/thumbs/'.$file_name['file_name'],
								);	
				$this->image_resize($resize_config, $file_name);	
			}
			/***********/
            $data = array(
				'title' => $this->input->post('title',TRUE),
				'value' => $this->input->post('value',TRUE),
				'gendertype' => $this->input->post('gendertype',TRUE),
				'gift_worth' => $this->input->post('gift_worth',TRUE),
	    );
		
		if(isset($file_name['file_name']) && $file_name['file_name'] != '')			
			$data['image'] = $file_name['file_name'];

            $this->gifts_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(admin_url('gifts'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->gifts_model->get_by_id($id);

        if ($row) {
            $this->gifts_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(admin_url('gifts'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('gifts'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'Title', 'trim');
	$this->form_validation->set_rules('image', 'Image', 'trim');
	$this->form_validation->set_rules('value', 'Value', 'trim');
	$this->form_validation->set_rules('gendertype', 'Gendertype', 'trim');	

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file Gifts.php */
/* Location: ./application/controllers/Gifts.php */