<?php require_once 'tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
	
	//Page header
    public function Header() {
        // Logo
		$this->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP+11, PDF_MARGIN_RIGHT);
//        $image_file = FCPATH.'assets/images/pdf-header.png';
        $image_file = FCPATH.'assets/images/pdf-full-bga4.jpg';
        $this->Image($image_file, 0, 6, 210, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
//		$this->Image($image_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 0, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }	
	
    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
//        $this->SetY();
        // Set font
        $this->SetFont('helvetica', 'I', 8);
		$image_file = FCPATH.'assets/images/pdf-footer.png';
		$footer = $this->Image($image_file, 0,$this->GetY()-6, 210);
        // Page number
        $this->Cell(0, 20, $footer, 0, 0, 'R');
    } 
}