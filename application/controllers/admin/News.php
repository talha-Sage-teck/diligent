<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'News';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'news';
        $this->load->model('news_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $news = $this->news_model->get_all();

        $data = array(
            'news_data' => $news
        );

        $this->renderView('news/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'title' ,
		'description' ,
		'image' ,
		'date' ,
		'users' ,
		'status' ,);
				
	}

    public function read($id) 
    {
        $row = $this->news_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'title' => $row->title,
			'description' => $row->description,
			'image' => $row->image,
			'date' => $row->date,
			'users' => $row->users,
			'status' => $row->status,
	    );
            $this->renderView('news/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('news'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => admin_url('news/create_action'),
		    'id' => set_value('id'),
		    'title' => set_value('title'),
		    'description' => set_value('description'),
		    'image' => set_value('image'),
		    'date' => set_value('date'),
		    'users' => set_value('users'),
		    'status' => set_value('status'),
		);
        $this->renderView('news/form', $data);
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
								'upload_path' => './uploads/news/',
								'allowed_types' => 'gif|jpg|png|jpeg',
								);
				$file_name = $this->upload_file('image',$config);
				if($file_name === FALSE){
					$this->session->set_flashdata('error', $this->file_upload_error['error']);
					redirect(admin_url('news/create'));
				}
					
				$resize_config = array(
								'source_image' => $file_name['full_path'],								
								'width' => 800,
								'height' => 600, 
								'maintain_ratio' => TRUE,
								'new_image' => $file_name['file_path'].'/thumbs/'.$file_name['file_name'],
								);	
				$this->image_resize($resize_config, $file_name);	
			}
			/***********/
            $data = array(
				'title' => $this->input->post('title',TRUE),
				'description' => $this->input->post('description',TRUE),
				'image' => $file_name['file_name'],
				'date' => date(DATE_MYSQL),
				'users' => $this->input->post('users',TRUE),
				'status' => $this->input->post('status',TRUE),
	    );

            $this->news_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(admin_url('news'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->news_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => admin_url('news/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('news/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('news'));
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
								'upload_path' => './uploads/news/',
								'allowed_types' => 'gif|jpg|png|jpeg',
								);
				$file_name = $this->upload_file('image',$config);
				if($file_name === FALSE){
					$this->session->set_flashdata('error', $this->file_upload_error['error']);
					redirect(admin_url('news/create'));
				}
					
				$resize_config = array(
								'source_image' => $file_name['full_path'],								
								'width' => 800,
								'height' => 600, 
								'maintain_ratio' => TRUE,
								'new_image' => $file_name['file_path'].'/thumbs/'.$file_name['file_name'],
								);	
				$this->image_resize($resize_config, $file_name);	
			}
			/***********/
            $data = array(
				'title' => $this->input->post('title',TRUE),
				'description' => $this->input->post('description',TRUE),
				'date' => date(DATE_MYSQL),
				'users' => $this->input->post('users',TRUE),
				'status' => $this->input->post('status',TRUE),
	    );
		if(isset($file_name['file_name']) && $file_name['file_name'] != '')			
			$data['image'] = $file_name['file_name'];

            $this->news_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(admin_url('news'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->news_model->get_by_id($id);

        if ($row) {
            $this->news_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(admin_url('news'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('news'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'Title', 'trim');
	$this->form_validation->set_rules('description', 'Description', 'trim');
	$this->form_validation->set_rules('image', 'Image', 'trim');
	$this->form_validation->set_rules('status', 'Status', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file News.php */
/* Location: ./application/controllers/News.php */