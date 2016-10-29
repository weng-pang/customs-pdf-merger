<?php
require dirname(__FILE__).'/fpdf181/fpdf.php';
require dirname(__FILE__).'/fpdi-1.6.1/fpdi.php';
/**
 * Processor.php
 * This controller handles PDF Merger Process by:
 *  - Taking metadata, then applying to prepared form into pdf, and
 *  - Obtaining original PDF
 *  - Merging into new pdf
 *
 *	@copyright Dominance of Kaugebra 2016
 *	@copyright KATS 2016
 *	@version 1.0
 *
 */

class DocumentMerge{
	private $serial;
	private $provider;
	private $type;
	private $description;
	private $personnel;
	private $signature;
	private $date;
	private $additional_info;
	private $coverPageFileName;
	private $documentFileName;
	private $fileDirectory;
	private $filePresented;
	
	/**
	 * DocumentMerge
	 * The Cover Page information must be entered first.
	 * 
	 * @param unknown $serial
	 * @param unknown $provider
	 * @param unknown $type
	 * @param unknown $description
	 * @param unknown $personnel
	 * @param unknown $signature
	 * @param unknown $additional_info
	 */
	public function __construct($serial,$provider,$type,$description,$personnel,$signature,$additional_info){
		$this -> serial = $serial;
		$this -> provider = $provider;
		$this -> type = $type;
		$this -> description = $description;
		$this -> personnel = $personnel;
		$this -> signature = $signature;
		$this -> additional_info = $additional_info;
		
		$this -> fileDirectory = PROJECT_DIR.'/Files/';
		$this -> filePresented = false;
	}
	
	public function prepareCoverPage(){
		// Generate Cover Page filenaem
		$this-> coverPageFileName = uniqid().'.pdf';
		// Prepare PDF
		$pdf = new FPDF('P','mm','A4');
		$pdf -> AddPage();
		$pdf ->Image(dirname(__FILE__).'/2027.X.jpg',0,0,213);
		// Enter Field Information
		$pdf -> SetFont('helvetica','B',16);
		$pdf -> Ln(35);
		$pdf -> Cell(80,0,$this->provider);
		$pdf -> Cell(80,0,$this->type);
		$pdf -> SetFont('helvetica','B',22);
		$pdf -> Cell(0,0,$this->serial);
		$pdf -> Ln(20);
		$pdf -> SetFont('helvetica','B',16);
		$pdf -> Cell(0,0,$this->additional_info);
		$pdf -> Ln(60);
		$pdf -> SetFont('helvetica','',10);
		$pdf -> Cell(0,0,$this->description);
		$pdf -> Ln(20);
		$pdf -> SetFont('helvetica','B',16);
		$pdf -> Cell(90,0,$this->personnel);
		$pdf -> SetFont('helvetica','BI',16);
		$pdf -> Cell(50,0,$this->signature);
		$pdf -> SetFont('helvetica','B',16);
		$pdf -> Cell(0,0,date('d/m/Y'));
		// Store for next step
// 		$pdf -> Output();
		$pdf -> Output($this -> fileDirectory.$this->coverPageFileName,'F');
		$pdf -> Close();
	}
	
	public function prepareDocument(){
		$this->documentFileName = uniqid().'.pdf';
		if (move_uploaded_file($_FILES["documentUpload"]["tmp_name"], $this -> fileDirectory .$this->documentFileName )) {
// 			echo "The file ". basename( $_FILES["documentUpload"]["name"]). " has been uploaded.";
			$this -> filePresented = true;
		} else {
			error("Sorry, there was an error uploading your file.");
		}
	}	
	
	public function mergeDocument(){
		// prepare merge document sequence
		$mergePdf = new FPDI();
		
			// import cover page
			$mergePdf -> setSourceFile($this -> fileDirectory.$this->coverPageFileName);
			$mergePdf -> AddPage();
			$mergePdf -> useTemplate($mergePdf->importPage(1));
		if ($this->filePresented){
			// import document part
			$pageCount = $mergePdf -> setSourceFile($this -> fileDirectory.$this->documentFileName);
			for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
				$tplIdx = $mergePdf->ImportPage($pageNo);
				$s = $mergePdf->getTemplatesize($tplIdx);
				$mergePdf->AddPage($s['w'] > $s['h'] ? 'L' : 'P', array($s['w'], $s['h']));
				$mergePdf->useTemplate($tplIdx);
			}
		} 
		// perform mergering
		$mergePdf -> Output('output.pdf','I');
	}
	
	
}