<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimonials extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Testimonials';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'testimonials';
        $this->load->model('testimonials_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $testimonials = $this->testimonials_model->get_all();

        $data = array(
            'testimonials_data' => $testimonials
        );

        $this->renderView('testimonials/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'name' ,
		'designation' ,
		'testimonial_text' ,
		'image' ,
		'date' ,);
				
	}

    public function read($id) 
    {
        $row = $this->testimonials_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'name' => $row->name,
			'designation' => $row->designation,
			'testimonial_text' => $row->testimonial_text,
			'image' => $row->image,
			'date' => $row->date,
	    );
            $this->renderView('testimonials/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('testimonials'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => admin_url('testimonials/create_action'),
		    'id' => set_value('id'),
		    'name' => set_value('name'),
		    'designation' => set_value('designation'),
		    'testimonial_text' => set_value('testimonial_text'),
		    'image' => set_value('image'),
		    'date' => set_value('date'),
		);
        $this->renderView('testimonials/form', $data);
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
								'upload_path' => './uploads/testimonials/',
								'allowed_types' => 'gif|jpg|png|jpeg',
								);
				$file_name = $this->upload_file('image',$config);
				if($file_name === FALSE){
					$this->session->set_flashdata('error', $this->file_upload_error['error']);
					redirect(admin_url('templates/create'));
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
				'name' => $this->input->post('name',TRUE),
				'designation' => $this->input->post('designation',TRUE),
				'testimonial_text' => $this->input->post('testimonial_text',TRUE),
				'image' => $file_name['file_name'],
				'date' => $this->input->post('date',TRUE),
	    );

            $this->testimonials_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(admin_url('testimonials'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->testimonials_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => admin_url('testimonials/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('testimonials/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('testimonials'));
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
								'upload_path' => './uploads/testimonials/',
								'allowed_types' => 'gif|jpg|png|jpeg',
								);
				$file_name = $this->upload_file('image',$config);
				if($file_name === FALSE){
					$this->session->set_flashdata('error', $this->file_upload_error['error']);
					redirect(admin_url('templates/create'));
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
				'name' => $this->input->post('name',TRUE),
				'designation' => $this->input->post('designation',TRUE),
				'testimonial_text' => $this->input->post('testimonial_text',TRUE),
				'date' => $this->input->post('date',TRUE),
	    );
		if(isset($file_name['file_name']) && $file_name['file_name'] != '')			
			$data['image'] = $file_name['file_name'];	

            $this->testimonials_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(admin_url('testimonials'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->testimonials_model->get_by_id($id);

        if ($row) {
            $this->testimonials_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(admin_url('testimonials'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('testimonials'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'Name', 'trim');
	$this->form_validation->set_rules('designation', 'Designation', 'trim');
	$this->form_validation->set_rules('testimonial_text', 'Testimonial_text', 'trim');
	$this->form_validation->set_rules('image', 'Image', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file Testimonials.php */
/* Location: ./application/controllers/Testimonials.php */