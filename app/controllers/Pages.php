<?php

/*
Pages.php
Default controller
*/

class Pages extends Controller{

	public function __construct() {
		$this->articleModel = $this->model("Article");
	}

	public function index() {

		$articles = $this->articleModel->getArticles();

		$viewData = [
			"sometext" => "Proyecto MVC-example",
			"articles" => $articles
		];

		// Load initial view with data
		$this->view("pages/init", $viewData);
	}
	public function update($id) {
		echo $id;
	}
}

?>