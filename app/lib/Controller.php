<?php

/*
Controller.php
Loads models and views
All controllers will be child classes from Controller class
Controller class cannot be instantiated (abstract)
*/

abstract class Controller{

	// Load model and instance class
	protected function model($modelName) {
		require_once("../app/models/". $modelName. ".php");
		return new $modelName();
	}

	// Load view
	protected function view($viewName, $viewData = []) {
		// validate if view exists
		if (file_exists("../app/views/". $viewName. ".php")) {
			require_once("../app/views/". $viewName. ".php");
		}
		else {
			die("View does not exist");
		}
	}
}

?>