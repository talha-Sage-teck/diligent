<?php
class MY_Controller extends CI_Controller
{
	protected $data = array();
	protected $langs = array();
	protected $template_view;
	public $file_upload_error;
	public $sms_send_error;
	public $fUploadError;
	
    function __construct()
    {
        parent::__construct();
		date_default_timezone_set("Asia/Karachi"); /// set timezone for Pakistan
		$this->data['page_title'] = 'Better Access';
		$this->data['before_head_top'] = '';
		$this->data['before_head'] = '';
		$this->data['before_body'] = '';
		
		
    } 
	/**
	@param $viewName string 
	@param $data array 
	@param $include_header_footer boolean TRUE, FALSE Both header and footer will be included or excluded
	**/
	protected function renderView($viewName = "", $data = array(), $include_header_footer = TRUE){
		$this->data['template_view'] = $this->template_view;
		$this->data['pagecontent'] = $viewName;
		$this->data['includehf'] = $include_header_footer;
		$data = array_merge($this->data, $data);
		$this->load->view($this->template_view.'/includes/template_holder', $data);
		
	}
	
	public function upload_file($field, $config){
		$default_config = array(
							  'upload_path' => './uploads/',
							  'allowed_types' => 'gif|jpg|png|jpeg',
							  'file_ext_tolower' => TRUE,
							  'overwrite' => FALSE,
							  'remove_spaces' => TRUE,
							  'max_size' => '2048',
							  'multi' => 'all'		
							);

		$combined_settings = array_merge($default_config, $config);
			
//		print_r($combined_settings);	
		// load Upload library
		$this->load->library('upload',$combined_settings);
		$this->upload->initialize($combined_settings);	
		if (!$this->upload->do_upload($field))
			{
				// case - failure
				$this->file_upload_error = array('error' => $this->upload->display_errors('',''));
				$this->session->set_flashdata('error',$this->upload->display_errors());
				return FALSE;
			}
			else
			{
				// case - success
				$upload_data = $this->upload->data();
//						var_dump($upload_data); exit;
				return $upload_data;
			}		
		}
		
		
	public function image_resize($config, $upload_data, $crop = TRUE){
		$this->load->library('image_lib');
		
		$default['image_library'] = 'gd2';
		$default['source_image'] = "./uploads/test.jpg";
		$default['new_image'] = "./uploads/thumbs/test.jpg";
		$default['create_thumb'] = FALSE;
		$default['maintain_ratio'] = TRUE;
		$default['quality'] = "60%";
		$default['width']         = 250;
		$default['height']       = 200;
		
		$combined_settings = array_merge($default, $config);

		$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($combined_settings['width'] / $combined_settings['height']);
	//If the ratio > 0, then original image has longer width than container width. 
		$combined_settings['master_dim'] = ($dim > 0)? "height" : "width";

		$this->image_lib->initialize($combined_settings);
		if(!$this->image_lib->resize()){
// 			var_dump('resize',$this->image_lib->display_errors());
			$this->file_upload_error = array('error', $this->image_lib->display_errors());
			return FALSE;
		}
		else{
			return TRUE;
		}
		
		$imgSize = $this->image_lib->get_image_properties($config["new_image"], TRUE);
		
		if($crop === TRUE){
		  $combined_settings['source_image'] = $config["new_image"] ;
		  $combined_settings['new_image'] = $config["new_image"];
		  $combined_settings['maintain_ratio'] = FALSE;
		  $combined_settings['x_axis'] = ($dim > 0)?((intval($imgSize['width']) - intval($config['width']))/2):0; 
		  $combined_settings['y_axis'] = ($dim < 0)?((intval($imgSize['height']) - intval($config['height']))/2):0; 

			$this->image_lib->clear();
			$this->image_lib->initialize($combined_settings); 
			if (!$this->image_lib->crop()){
			 //   var_dump('crop',$this->image_lib->display_errors());
			  $this->file_upload_error = array('error', $this->image_lib->display_errors());
			  return FALSE;
			  }
			}	

    }	
	
function correctImageOrientation($filename) {
  if (function_exists('exif_read_data')) {
    $exif = exif_read_data($filename);
    if($exif && isset($exif['Orientation'])) {
      $orientation = $exif['Orientation'];
      if($orientation != 1){
        $img = imagecreatefromjpeg($filename);
        $deg = 0;
        switch ($orientation) {
          case 3:
            $deg = 180;
            break;
          case 6:
            $deg = 270;
            break;
          case 8:
            $deg = 90;
            break;
        }
        if ($deg) {
          $img = imagerotate($img, $deg, 0);        
        }
        // then rewrite the rotated image back to the disk as $filename 
        imagejpeg($img, $filename, 95);
		  
		 
      } // if there is some rotation necessary
    } // if have the exif orientation info
  } // if function exists      
}
		////// generate voucher PDF

	function createPDF($data, $attrib='F'){
		$this->load->library('pdf');
		
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->setPrintHeader(true);
			$pdf->setPrintFooter(true);
			$pdf->SetHeaderMargin(0);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT);
//		$pdf->SetAutoPageBreak(false, 0);
		
		
		//$header_file = FCPATH.'assets/images/pdf-header.png';
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		
		$img_file = FCPATH.'assets/images/pdf-bg.jpg';
		
            // Add a page
            $pdf->AddPage();
//			$pdf->Image($img_file, -10, 0, 0, 0, '', '', '', false, 300, '', false, false, 0);
            $html = $this->load->view($data['template'],$data,TRUE);
            $pdf->writeHTML($html, true, false, true, false, '');
			
			if($data['pdffilename']){
				$filename = $data['pdffilename'];
			}else{
				$filename = FCPATH.'uploads/pdf/voucher'.uniqid().'.pdf';
			}
			
            $pdf->Output($filename, $attrib);
			
			return $filename;
		}

/// convert string to SEO friendly url, if already exist in db then increment	
	function generate_slug($text, $increment = TRUE, $table = 'blog_posts', $field = 'post_slug'){
		$num = 0;
		$titleURL = strtolower(url_title($text));
		if($increment == TRUE){
		$this->db->like($field, $titleURL, 'after');
		$res = $this->db->get($table);
		//echo $this->db->last_query(); exit;
		$num = $res->num_rows();
		if($num > 0){
			return $titleURL.$num++;
			}
		else{
			 return $titleURL;
			}	
		}
		else{
			return $titleURL;
			}
		}
	
/**********
@param array $info to, subject, from(optional), from_name(optional), cc(optional), bcc(optional)
**********/	
public function send_email($info = array(), $data = array(), $template = '', $attachments = array()){
	
	$config = array(
					'protocol'		=> 'smtp', // smtp, mail sendmail
					'smtp_crypto'   => "ssl",
					'smtp_host' 	=> 'mail.mysite.com',
					'smtp_port' 	=> 587, // 587, 465, 25
					'smtp_user'		=> 'support@mysite.com',
					'smtp_pass'		=> 'RcAef9syYvL5kHV',
					'crlf' 			=> "\r\n",
					'newline'       => "\r\n",
					'mailtype'      => "html",
					'charset'		=> 'iso-8859-1',
					'wordwrap'		=> TRUE,
					'smtp_timeout'  => 20,
					);
	$this->load->library('email', $config);
	
	if(ENVIRONMENT == 'development'){
		$config = array(
				'protocol'		=> 'smtp',
				'smtp_host' 	=> 'localhost',
				'smtp_user'		=> 'username@localhost',
				'smtp_pass'		=> '123456',
				'mailtype'		=> 'html',
				'charset'		=> 'iso-8859-1',
				'wordwrap'		=> TRUE,
				);
		}
	elseif(ENVIRONMENT == 'testing' || ENVIRONMENT == 'production'){	
	
		$config = array(
				'protocol'		=> 'smtp', // smtp, mail sendmail
				'smtp_crypto'   => "ssl",
				'smtp_host' 	=> 'smtp.sendgrid.net',
				'smtp_port' 	=> 465, // 587, 465, 25
				'smtp_user'		=> 'Zaptesting',
				'smtp_pass'		=> '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',
				'crlf' 			=> "\r\n",
				'newline'       => "\r\n",
				'mailtype'      => "html",
				'charset'		=> 'iso-8859-1',
				'wordwrap'		=> TRUE,
				'smtp_timeout'  => 20,
				);		
	}
	
//	$this->email->initialize($config);
	
	$this->email->clear(TRUE); /// clear email object alongwith attchments (TRUE)
	$this->email->set_newline("\r\n");
	$this->email->set_mailtype("html");
	$this->email->from(
		  (isset($info['from']) && $info['from'] != '') ? $info['from'] : 'info@betteraccess.com',
		  (isset($info['from_name']) && $info['from_name'] != '') ? $info['from_name']:'Better Access'
		);
	$this->email->to($info['to']);	
	$this->email->subject($info['subject']);
	$mesg = $this->load->view($template,$data,true);
	$this->email->message($mesg);
	
	if(!empty($attachments)){
		foreach($attachments as $attach){
			$this->email->attach($attach);
			}
		}	
	
	if ( ! $this->email->send())
	  {
		  return FALSE;
		  if(ENVIRONMENT == 'development'){
			echo $this->email->print_debugger();
		  }
		  else{
			  return FALSE;
			  }
	  }	
	else{
		return TRUE;
		}  	
	}	
	
			
}


/* CI does not load/understand other controllers by default except MY_*
	so I am loading these custom controllers within MY_Controller.
	For better management these are in separate files
*/ 
include_once('Admin_Controller.php');

include_once('Front_Controller.php');