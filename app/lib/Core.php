<?php
/*
Core.php
- Base class for the application
- Get method and paremeters from URL
*/


class Core{

	protected $controller; //Controller class instance
	protected $controllerCurrent = "Pages"; //default controller: pages
	protected $methodCurrent = "index"; //default method: index
	protected $methodParams = []; //no parameters by default

	private $debug=0x00;

	// Constructor
	public function __construct () {
		$url_params = $this->getUrl();			
		if ($this->debug & 0x02) echo "<pre>" , print_r(ucwords($url_params[0])) , "</pre>";

		// Extract controller from URL

		// validate if controller exists
		if (isset($url_params[0])) {
			if (file_exists("../app/controllers/". ucwords($url_params[0]). ".php")) {
				// set current controller
				$this->controllerCurrent = ucwords($url_params[0]);
	
				// unset controller from url variable
				unset($url_params[0]);
			}	
		}

		// Load controller
		require_once("../app/controllers/". $this->controllerCurrent. ".php");

		// Instance controller class
		$this->controller = new $this->controllerCurrent;

		// Extract method from URL

		if (isset($url_params[1])) {
			if (method_exists($this->controller,$url_params[1])) {
				$this->methodCurrent = $url_params[1];
			}
			unset($url_params[1]);
		}
		if ($this->debug & 0x03) echo "<pre>" , print_r($this->methodCurrent) , "</pre>";

		// Extract method parameters from URL
		$this->methodParams = $url_params ?  array_values($url_params) : [];
		if ($this->debug & 0x04) echo "<pre>" , print_r($this->methodParams) , "</pre>";

		// Call controller method using callback 
		call_user_func_array([$this->controller, $this->methodCurrent], $this->methodParams);

	}

	// Get URL from browser, _GET url variable defined in htaccess
	public function getUrl() {
		$url = [];
		// validate if URL has parameters
		if (isset($_GET['url'])) {
			// get parameters from URL 
			$url = trim($_GET['url']);
			// remove illegal characters from URL
			$url = filter_var($url,FILTER_SANITIZE_URL);

			$url = explode('/',$url);
			if ($this->debug & 0x01) echo "<pre>" , print_r($url) , "</pre>";
		}
		return $url;
	}

}

?>