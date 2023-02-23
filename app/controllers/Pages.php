<?php

/*
Pages.php
Default controller
*/

class Pages extends Controller{

	public function __construct() {
		
	}

	public function index() {

		$viewData = [
			"title" => "Proyecto",
		];

		// Load initial view with data
		$this->view("pages/init", $viewData);
	}
	
}

?>