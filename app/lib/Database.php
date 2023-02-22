<?php

/*
Database.php
Connection to MySQL Database using mysqli object
*/

class Database{

	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbname = DB_NAME;

	private $dbh; // database handler
	private $stmt; //SQL statement
	private $result;
	private $error;

	private $debug=0x00;

	public function __construct() {
		// Attempt connection to Database
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		try {
			$this->dbh = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
			$this->dbh->set_charset("utf8mb4");
		} catch(Exception $e) {
			$this->error = $e->getMessage();
			if ($this->debug & 0x01) echo "<pre>" , print_r($this->error) , "</pre>";
			exit('Error connecting to database'); //Should be a message a typical user could understand
		}
	}

	public function query($sql) {
		// Prepare SQL statement
		$this->stmt = mysqli_prepare($this->dbh, $sql);
	}

	public function bindParam($param, $datatype) {
		// Bind one parameter to SQL query
		$this->stmt->bind_param($datatype, $param);
	}

	public function execute() {
		// Execute SQL statement
		$this->stmt->execute();
	}

	public function resultSet() {
		// Get result set and process result
		$this->execute();
		$this->result = $this->stmt->get_result();
	}

	public function getRows() {
		// Get all rows
		$this->resultSet();
		$rows = $this->result->fetch_all(MYSQLI_ASSOC);
		if ($this->debug & 0x02) echo "<pre>" , print_r($rows) , "</pre>";
		return $rows;
	}

	public function getRowCount() {
		// Get row count
		$this->resultSet();
		return $this->result->num_rows();
	}
}

?>