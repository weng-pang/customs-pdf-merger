<?php
/**
 * Router.php
 * This file directs navigation and operation for this application
 * 
 * If there is no post request
 * The page is shown
 * 
 * If there is a post request
 * The outcome pdf is displayed
 * 
 *	@copyright Dominance of Kaugebra 2016
 *	@copyright KATS 2016
 *	@version 1.0 
 * 
 */

class Router{
	public function start(){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// The request is using the POST method
			// Prepare PDF display sequence
			// Capture Form Data
			$serial = $_POST['serial'];
			$provider = $_POST['provider'];
			$type = $_POST['type'];
			$description = APPLICATION_DECL;
			$personnel = $_POST['personnel'];
			$signature = $personnel;
			$additional_info = $_POST['addition'];
			$wholeDocument = new DocumentMerge($serial, $provider, $type, $description, $personnel, $signature, $additional_info);
			$wholeDocument -> prepareCoverPage();
			$wholeDocument -> prepareDocument();
			$wholeDocument -> mergeDocument();
		} else {
			// Display the form for data entry
			include PROJECT_DIR.'/View/Form.php';
		}
	}
}