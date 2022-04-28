<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter PDF Library
 *
 * Generate PDF's in your CodeIgniter applications.
 *
 * @package			CodeIgniter
 * @subpackage		Libraries
 * @category		Libraries
 * @author			Chris Harvey
 * @license			MIT License
 * @link			https://github.com/chrisnharvey/CodeIgniter-PDF-Generator-Library
 */

require_once APPPATH . "/third_party/tcpdf/tcpdf.php";

class Pdf extends TCPDF
{
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Get an instance of CodeIgniter
	 *
	 * @access	protected
	 * @return	void
	 */
	protected function ci()
	{
		return get_instance();
	}

	/**
	 * Load a CodeIgniter view into domPDF
	 *
	 * @access	public
	 * @param	string	$view The view to load
	 * @param	array	$data The view data
	 * @return	void
	 */
	public function generate($fileName, $html) {
		ob_start(); 
        // Include the main TCPDF library (search for installation path).
        // create new PDF document
        // 
        // set document information
		$this->SetCreator(PDF_CREATOR);
		$this->SetAuthor('TechArise');
		$this->SetTitle('TechArise');
		$this->SetSubject('TechArise');
		$this->SetKeywords('TechArise');

        // set default header data
		$this->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
		$this->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$this->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		$this->SetPrintHeader(false);
		$this->SetPrintFooter(false);

        // set default monospaced font
		$this->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
		$this->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);
		$this->SetHeaderMargin(0);
		$this->SetFooterMargin(0);

        // set auto page breaks
        //$this->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$this->SetAutoPageBreak(TRUE, 0);

        // set image scale factor
		$this->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$this->setLanguageArray($l);
		}       

        // set font
		$this->SetFont('dejavusans', '', 9);

        // add a page
		$this->AddPage();

        // output the HTML content
		$this->writeHTML($html, true, false, true, false, '');

        // reset pointer to the last page
		$this->lastPage();       
		ob_end_clean();
        //Close and output PDF document
		$this->Output($fileName, 'F');        
	}
}