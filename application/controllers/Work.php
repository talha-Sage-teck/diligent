<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class Work extends Front_Controller {
	//	protected $loopcount;
	//	protected $repeatloop = TRUE;
	//	public $loopreturn = TRUE;

	function __construct() {
		parent::__construct();
		
		  
		if (!$this->ion_auth->in_group(['admin', 'inspector']))
			{
			  $this->session->set_userdata('referrer_url', $this->agent->referrer() ); 
			  //redirect them to the login page
			  redirect('login', 'refresh');
			}

		
		$this->load->model( 'certificate_model' );
		$this->load->model( 'report_model' );
		$this->load->model( 'users_model' );
		$this->load->model( 'gallery_model' );
	}

	public
	function index() {
		$data = array();

		exit;
	}

	public function certificate_list(){
		$list = $this->certificate_model->get_all();
		$data = [
			"list_data" => $list,
		];
		
		$this->renderView( 'work/certificate_list', $data );
	}
	
	public
	function certificate() {
		$data = array(
			'button' => 'Create',
			'action' => 'Add',
			'id' => set_value('id'),
			'job_ref' => set_value('job_ref'),
			'job_number' => set_value('job_number') ,
			'clientname' => set_value('clientname') ,
			'project'  => set_value('project'),
			'location' => set_value('location') ,
			'description' => set_value('description') ,
			'compiled_by' => set_value('compiled_by') ,
			'comments' => set_value('comments') ,
			'frm_action' => site_url( 'work/cert_create_action' ),
			'default_quotation_html' => $this->load->view("ajax_inc/default_quotation_html", [] ,true),
		);
		
		
		$this->renderView( 'work/certificate_add', $data );
	}
	
	function cert_create_action(){		
		$this->_cert_rules();
		
		if ( $this->form_validation->run() == FALSE ) {
			$this->certificate();
		} else {
			$data = array(
				'clientname' => $this->input->post( 'clientname', TRUE ),
				'project' => $this->input->post( 'project', TRUE ),
				'location' => $this->input->post( 'location', TRUE ),
				'compiled_by' => $this->input->post( 'compiled_by', TRUE ),
				'job_ref' => $this->input->post( 'job_ref', TRUE ),
				'job_number' => $this->input->post( 'job_number', TRUE ),
				'description' => $this->input->post( 'description', TRUE ),
				'comments' => $this->input->post( 'comments', TRUE ),
			);
			$qinsert_id = $this->certificate_model->insert( $data );			
			
			$this->session->set_flashdata( 'message', 'Create Record Success' );
			redirect( 'work/readcertificate/'.$qinsert_id );
	}
	}
	
	function _columns(){
		return $fields = array(
		'id' ,
		'job_ref' ,
		'job_number' ,
		'clientname' ,
		'project' ,
		'location' ,
		'description' ,
		'compiled_by' ,
		'comments' ,
		'created_at' ,
		'updated_at' ,
		
		);
	}
	function _columns_report(){
		return $fields = array(
		'id' ,
		'content' ,
		'completed_by' ,
		'created_at' ,
		'updated_at' ,
		'job_ref' ,
		'job_number' ,
		'clientname' ,
		'project' ,
		'location' ,
		'description' ,
		'comments' ,
		);
	}
	
	function updatecertificate($id){
		$row = $this->certificate_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'update',
				'frm_action' => site_url('work/cert_update_action')
	    );
		foreach($this->_columns() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('work/certificate_add', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('work/certificate_list'));
        }
	}
	
	function cert_update_action(){
		$this->_cert_rules();
		
        if ($this->form_validation->run() == FALSE) {
            $this->updatecertificate($this->input->post('id', TRUE));
        } else {
            $data = array(				
				'job_ref' => $this->input->post('job_ref',TRUE),
				'job_number' => $this->input->post('job_number',TRUE),
				'clientname' => $this->input->post('clientname',TRUE),
				'project' => $this->input->post('project',TRUE),
				'location' => $this->input->post('location',TRUE),
				'description' => $this->input->post('description',TRUE),
				'compiled_by' => $this->input->post('compiled_by',TRUE),
				'comments' => $this->input->post('comments',TRUE),
	    );

            $result = $this->certificate_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('work/certificate_list'));
        }
	}
	
	function readcertificate($id=0){
		$row = $this->certificate_model->get_by_id($id);
				
		if(!$row){
			$this->session->set_flashdata( 'error', 'Record not found!' );
			redirect( 'work/certificate' );
		}
		else{
			$data = $this->_read_certification($id, $row);
			
			$this->renderView( 'work/certificate_read', $data );
			
		}
	}
	
	private function _read_certification($id, $row){
//		$userinfo = $this->users_model->get_by_id($row->compiled_by);
		$data = array(
				'id' => $row->id,
				'job_ref' => $row->job_ref,
				'job_number' => $row->job_number,
				'clientname' => $row->clientname,
				'project' => $row->project,
				'location' => $row->location,
				'compiled_by' => $row->compiled_by,
				'created_at' => $row->created_at,
				'description' => $row->description,
				'comments' => $row->comments,
				'created_at' => $row->created_at,
				'default_certificate_text' => $this->load->view("ajax_inc/default_certificate_text", [] ,true),
			);
		
		return $data;
	}
	
	function pdfcertificate($id){
		$row = $this->certificate_model->get_by_id($id);
		$data = $this->_read_certification($id, $row);
		$data['template'] = "pdf_templates/certificate";
		$data['pdffilename'] = "Wcertificate-".date('Y', strtotime($data['created_at']))."-".$data['id'].".pdf";
		$this->createPDF($data , "D");
	}
	
	function deletecertificate($id){
		$row = $this->certificate_model->get_by_id($id);

        if ($row) {
            $this->certificate_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('work/certificate_list'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('work/certificate_list'));
        }
	}
	
	
	public function report_list(){
		$list = $this->report_model->get_all();
		$data = [
			"list_data" => $list,
		];
		
		$this->renderView( 'work/report_list', $data );
	}
	
	
	public
	function report() {
		$data = array(
			'button' => 'Create',
			'action' => 'Add',
			'id' => set_value('id'),
			'job_ref' => set_value('job_ref'),
			'job_number' => set_value('job_number') ,
			'clientname' => set_value('clientname') ,
			'project'  => set_value('project'),
			'location' => set_value('location') ,
			'description' => set_value('description') ,
			'compiled_by' => set_value('compiled_by') ,
			'comments' => set_value('comments') ,
			'content' => set_value('content', $this->load->view("ajax_inc/default_report_text", [] ,true)),
			'completed_by' => set_value('completed_by'),
			'frm_action' => site_url( 'work/report_create_action' ),
		);
		
		
		$this->renderView( 'work/report_add', $data );
	}
	
	function report_create_action(){
		$this->_report_rules();
		
		if ( $this->form_validation->run() == FALSE ) {
			$this->report();
		} else {
			$data = array(
				'completed_by' => $this->input->post( 'completed_by', TRUE ),
				'content' => $this->input->post( 'content', TRUE ),
				'clientname' => $this->input->post( 'clientname', TRUE ),
				'project' => $this->input->post( 'project', TRUE ),
				'location' => $this->input->post( 'location', TRUE ),
				'job_ref' => $this->input->post( 'job_ref', TRUE ),
				'job_number' => $this->input->post( 'job_number', TRUE ),
				'description' => $this->input->post( 'description', TRUE ),
				'comments' => $this->input->post( 'comments', TRUE ),
			);
			$qinsert_id = $this->report_model->insert( $data );			
			
			$this->session->set_flashdata( 'message', 'Create Record Success' );
			redirect( 'work/uploadimages/'.$qinsert_id );
	}
	}
	
	
	function updatereport($id){
		$row = $this->report_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',				
				'action' => 'Update',
				'frm_action' => site_url('work/report_update_action')
	    );
		foreach($this->_columns_report() as $f){
				$data[$f] = set_value($f, $row->$f);				
				}
	$this->renderView('work/report_add', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('work/report_list'));
        }
	}
	
	function report_update_action(){
		$this->_report_rules();
		
        if ($this->form_validation->run() == FALSE) {
            $this->updatereport($this->input->post('id', TRUE));
        } else {
            $data = array(				
				'content' => $this->input->post('content',TRUE),
				'completed_by' => $this->input->post('completed_by',TRUE),
				'job_ref' => $this->input->post('job_ref',TRUE),
				'job_number' => $this->input->post('job_number',TRUE),
				'clientname' => $this->input->post('clientname',TRUE),
				'project' => $this->input->post('project',TRUE),
				'location' => $this->input->post('location',TRUE),
				'description' => $this->input->post('description',TRUE),
				'comments' => $this->input->post('comments',TRUE),
	    );

            $result = $this->report_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('work/uploadimages/'.$this->input->post('id', TRUE)));
        }
	}
	
	function readreport($reportid){
		$row = $this->report_model->get_by_id($reportid);
		$data = $this->_read_report($reportid, $row);
		
		$this->renderView( 'work/report_read', $data );
	}
	
	function uploadimages($reportid){
		$row = $this->report_model->get_by_id($reportid);
		$data = $this->_read_report($reportid, $row);
		$data['reportid'] = $reportid;	
		$this->renderView( 'work/images_add', $data );
	}
	
	// AJAX function 
	function upload_work_image(){
		$config = ['max_size' => '20000','allowed_types' => 'jpg|jpeg',];
		$imgtype = $this->input->post('type');
		if($imgtype == "before")
			$uploadresult = $this->upload_file("beforework", $config);
		elseif($imgtype == "during")
			$uploadresult = $this->upload_file("duringwork", $config);
		elseif($imgtype == "after")
			$uploadresult = $this->upload_file("afterwork", $config);
		elseif($imgtype == "broken")
			$uploadresult = $this->upload_file("brokenwork", $config);		
		
		if(!$uploadresult){
			$error = ["jquery-upload-file-error" => $this->file_upload_error['error']];
//			var_dump($this->file_upload_error);
			echo json_encode($error);
		}
		else{
			$this->correctImageOrientation($uploadresult['full_path']);
			$resize_config = array(
								  'source_image' => $uploadresult['full_path'],								
								  'width' => 600,
								  'height' => 800, 
								  'new_image' => $uploadresult['file_path'].'/thumbs/'.$uploadresult['raw_name'].$uploadresult['file_ext'],
								  );	
				  $fileinfo = $this->image_resize($resize_config, $uploadresult);
			
			if(!$fileinfo){
				$error = ["jquery-upload-file-error" => $this->file_upload_error['error']];			
				echo json_encode($error);
			}
			else{
				$report_id = $this->input->post('reportId');
			
				$this->gallery_model->insert(["report_id" => $report_id, 
											  "image" => $uploadresult['file_name'],
											 "type" => $imgtype,
											 ]);
				echo json_encode(["status" => "success"]);
			}
			
		}
		 
		
	}
	
	
	
/*	
		$row = $this->report_model->get_by_id($id);
		$data = $this->_read_report($id, $row);
		$data['template'] = "pdf_templates/report";
		$data['pdffilename'] = "Wreport-".date('Y', strtotime($data['created_at']))."-".$data['id'].".pdf";
		$this->createPDF($data , "I");
	}*/
	
	function reportpdf($id){
		
		$this->load->library('pdf');
		
		
		$row = $this->report_model->get_by_id($id);
		$data = $this->_read_report($id, $row);
		
		
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Syntax software house');
$pdf->SetTitle('Work Completion Report');
$pdf->SetSubject('Work Completion Report ('.$id.')');
$pdf->SetKeywords('Work, completion, Work Report, report');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 009', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	$pdf->AddPage();
//			$pdf->Image($img_file, -10, 0, 0, 0, '', '', '', false, 300, '', false, false, 0);
            $html = $this->load->view("pdf_templates/report",$data,TRUE);
            $pdf->writeHTML($html, true, false, true, false, '');	
		
		if(!empty($data['gallery_before']))
$this->_createPdfPage($pdf, "Before Works", $data['gallery_before']);
		
		if(!empty($data['gallery_during']))
$this->_createPdfPage($pdf, "During Works", $data['gallery_during']);
		
		if(!empty($data['gallery_after']))
$this->_createPdfPage($pdf, "After Works", $data['gallery_after']);
		
		if(!empty($data['gallery_broken']))
$this->_createPdfPage($pdf, "Broken Glasses", $data['gallery_broken']);
		
		
		
		// test fitbox with all alignment combinations

//$horizontal_alignments = array('L', 'C', 'R');
//$vertical_alignments = array('T', 'M', 'B');
//		$horizontal_alignments = array('C', 'C', 'C');
//$vertical_alignments = array('M', 'M', 'M');



/*for ($i = 0; $i < 3; ++$i) {
    $fitbox = $horizontal_alignments[$i].' ';
    $x = 15;
    for ($j = 0; $j < 3; ++$j) {
        $fitbox[1] = $vertical_alignments[$j];
//        $pdf->Rect($x, $y, $w, $h, 'F', array(), array(128,255,128));
        $pdf->Image($img_file, $x, $y, $w, $h, 'JPG', '', '', false, 300, '', false, false, 0, $fitbox, false, false);
        $x += 32; // new column
    }
    $y += 62; // new row
}*/
		
		
		//Close and output PDF document
$pdf->Output('Work-report-'.date('Y').'-'.$id.'.pdf', 'D');
	}
	
	function _createPdfPage($pdf, $text, $images){
		// add a page
$pdf->AddPage();

// set JPEG quality
$pdf->setJPEGQuality(75);
		
		$x = 10;
$y = 55;
$w = 65;
$h = 60;
		
// test all combinations of alignments
		$max_page_width = 190;
		$total_images = count($images);
		$in_a_row = ceil($total_images / 2);
		$max_img_w = $max_page_width / $in_a_row;
		$max_img_h = 100;		
		
		
		$pdf->SetFont('helvetica', 'B', 20);
//		$pdf->Write(0, 'Before Works', '', 0, 'C', true, 0, false, false, 0);
		$html = '<h1 style="text-align:center">'.$text.'</h1>';
		$pdf->writeHTML($html, true, false, true, false, '');
		/////////// my test
		$n = 1;
		foreach($images as $image){			
				$img_file = FCPATH.'uploads/thumbs/'.$image->image;
				$img_dim = getimagesize($img_file);
			if($img_dim['mime'] == "image/jpeg"){
				
				$img_type = "JPG";
				}
			else{
				$img_type = "PNG";
			}
				
				
		//		var_dump($img_dim);
				$img_w = $img_dim[0];
				$img_h = $img_dim[1];
				$ratio = min($max_img_w / $img_w, $max_img_h / $img_h);

				$new_w = $img_w*$ratio;
				$new_h = $img_h*$ratio;
			$pdf->Image($img_file, $x, $y, $new_w, $new_h, $img_type, '', '', false, 300, '', false, false, 0, false, false, false);
			$x += $new_w + 1;
			if($n == $in_a_row){
				$y += $new_h + 1;
				$x = 10;
			}
			$n++;
		}
		
		////////////////
	}
	
	
	function deletereport($id){
		$row = $this->report_model->get_by_id($id);

        if ($row) {
			$gallery = $this->gallery_model->get_all(["report_id" => $id]);
			foreach($gallery as $image){
				$image_path = FCPATH.'uploads/';
				unlink($image_path.$image->image);
				$imagethumb_path = FCPATH.'uploads/thumbs/';
				unlink($imagethumb_path.$image->image);
			}
			$this->gallery_model->delete($id, "report_id");
			
            $this->report_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('work/report_list'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('work/report_list'));
        }
	}

	private function _read_report($id, $row){
//		$userinfo = $this->users_model->get_by_id($row->completed_by);
		$gallery_before = $this->gallery_model->get_all(["report_id" => $id, "type" => "before"]);
		$gallery_during = $this->gallery_model->get_all(["report_id" => $id, "type" => "during"]);
		$gallery_after = $this->gallery_model->get_all(["report_id" => $id, "type" => "after"]);
		$gallery_broken = $this->gallery_model->get_all(["report_id" => $id, "type" => "broken"]);
		$data = [
				"id" => $id,
				"completed_by" => $row->completed_by,
				"content" => $row->content,
				'job_ref' => $row->job_ref,
				'job_number' => $row->job_number,
				'clientname' => $row->clientname,
				'project' => $row->project,
				'location' => $row->location,
				'description' => $row->description,
				'comments' => $row->comments,
				"created_at" => $row->created_at,
				"gallery_before" => $gallery_before,
				"gallery_after" => $gallery_after,
				"gallery_during" => $gallery_during,
				"gallery_broken" => $gallery_broken,
			"default_certificate_text" => $this->load->view("ajax_inc/default_certificate_text", [] ,true),
				];
		return $data;
	}
	
	function _cert_rules(){
		$this->form_validation->set_rules( 'clientname', 'Client Name', 'trim|required' );
		$this->form_validation->set_rules( 'project', 'Project', 'trim|required' );
		$this->form_validation->set_error_delimiters( '<div>', '</div>' );
	}
	
	function _report_rules(){
		$this->form_validation->set_rules( 'completed_by', 'Completed By Name', 'trim|required' );
		$this->form_validation->set_rules( 'job_ref', 'Job Ref.', 'trim|required' );
		$this->form_validation->set_rules( 'job_number', 'Job No.', 'trim|required' );
		$this->form_validation->set_rules( 'clientname', 'Client Name', 'trim|required' );
		$this->form_validation->set_rules( 'project', 'Project', 'trim|required' );
		$this->form_validation->set_rules( 'location', 'location', 'trim|required' );
		$this->form_validation->set_error_delimiters( '<div>', '</div>' );
	}
	
	

}