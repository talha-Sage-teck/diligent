<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Pages';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'pages';
        $this->load->model('pages_model');
        $this->load->library('form_validation');
		$this->load->helper('text');
    }

    public function index()
    {
        $pages = $this->pages_model->get_all();

        $data = array(
            'pages_data' => $pages
        );

        $this->renderView('pages/list', $data);
    }

    public function _columns(){
		return $fields = array(
		'id' ,
		'parent_id' ,
		'order' ,
		'title' ,
		'page_slug' ,
		'teaser' ,
		'content' ,
		'meta_title' ,
		'meta_description' ,
		'meta_keywords' ,
		'created_at' ,
		'updated_at' ,
		'created_by' ,
		'updated_by' ,);
				
	}

    public function read($id) 
    {
        $row = $this->pages_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'parent_id' => $row->parent_id,
			'order' => $row->order,
			'title' => $row->title,
			'page_slug' => $row->page_slug,
			'teaser' => $row->teaser,
			'content' => $row->content,
			'meta_title' => $row->meta_title,
			'meta_description' => $row->meta_description,
			'meta_keywords' => $row->meta_keywords,
			'created_at' => $row->created_at,
			'updated_at' => $row->updated_at,
			'created_by' => $this->admin_id,
	    );
            $this->renderView('pages/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('pages'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
			'action' => 'Add',
            'frm_action' => admin_url('pages/create_action'),
		    'id' => set_value('id'),
		    'parent_id' => set_value('parent_id'),
		    'order' => set_value('order'),
		    'title' => set_value('title'),
		    'page_slug' => set_value('page_slug'),
		    'teaser' => set_value('teaser'),
		    'content' => set_value('content'),
		    'meta_title' => set_value('meta_title'),
		    'meta_description' => set_value('meta_description'),
		    'meta_keywords' => set_value('meta_keywords'),
		    'created_at' => set_value('created_at'),
		    'updated_at' => set_value('updated_at'),
		    'created_by' => set_value('created_by'),
		    'updated_by' => set_value('updated_by'),
		);
        $this->renderView('pages/form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'parent_id' => $this->input->post('parent_id',TRUE),
				'order' => $this->input->post('order',TRUE),
				'title' => $this->input->post('title',TRUE),
				'page_slug' => $this->generate_slug($this->input->post('title',TRUE), TRUE, 'pages', 'page_slug'),
				'teaser' => $this->input->post('teaser',TRUE),
				'content' => $this->input->post('content',TRUE),
				'meta_title' => $this->input->post('meta_title',TRUE),
				'meta_description' => $this->input->post('meta_description',TRUE),
				'meta_keywords' => $this->input->post('meta_keywords',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
				'created_by' => $this->input->post('created_by',TRUE),
				'updated_by' => $this->input->post('updated_by',TRUE),
	    );

            $this->pages_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(admin_url('pages'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->pages_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => admin_url('pages/update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('pages/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('pages'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'parent_id' => $this->input->post('parent_id',TRUE),
				'order' => $this->input->post('order',TRUE),
				'title' => $this->input->post('title',TRUE),
				//'page_slug' => $this->generate_slug($this->input->post('title',TRUE)),
				'teaser' => $this->input->post('teaser',TRUE),
				'content' => $this->input->post('content',TRUE),
				'meta_title' => $this->input->post('meta_title',TRUE),
				'meta_description' => $this->input->post('meta_description',TRUE),
				'meta_keywords' => $this->input->post('meta_keywords',TRUE),
				'updated_by' => $this->admin_id,
	    );

            $this->pages_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(admin_url('pages'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->pages_model->get_by_id($id);

        if ($row) {
            $this->pages_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(admin_url('pages'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(admin_url('pages'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'Title', 'trim|required');
	$this->form_validation->set_rules('page_slug', 'Page slug', 'trim');
	$this->form_validation->set_rules('teaser', 'Teaser', 'trim');
	$this->form_validation->set_rules('content', 'Content', 'trim|required');
	$this->form_validation->set_rules('meta_title', 'Meta_title', 'trim');
	$this->form_validation->set_rules('meta_description', 'Meta_description', 'trim');
	$this->form_validation->set_rules('meta_keywords', 'Meta_keywords', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<div>', '</div>');
    }

};

/* End of file Pages.php */
/* Location: ./application/controllers/Pages.php */