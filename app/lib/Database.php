<?php

/*
Database.php
- Connection to MySQL Database using mysqli object
- You should create one child class of Database per DB table
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
		try {
			$this->dbh = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
			$this->dbh->set_charset("utf8mb4");
		} catch(Exception $e) {
			$this->error = $e->getMessage();
			if ($this->debug & 0x01) echo "<pre>" , print_r($this->error) , "</pre>";
			exit("Error connecting to database"); //Should be a message a typical user could understand
		}
	}

	public function prepareQuery($sql) {
		// Prepare SQL statement
		$this->stmt = $this->dbh->prepare($sql);
	}

	public function bindParams($datatypes, ...$params) {
		// Bind parameter(s) to SQL query
		$this->stmt->bind_param($datatypes, ...$params);
	}

	public function executeQuery() {
		// Execute SQL statement and get result
		$this->stmt->execute();
		$this->result = $this->stmt->get_result();
	}

	public function getRows() {
		// Get all rows (we assume $this->executeQuery() was called before)
		$rows = $this->result->fetch_all(MYSQLI_ASSOC);
		if ($this->debug & 0x02) echo "<pre>" , print_r($rows) , "</pre>";
		return $rows;
	}

	public function getRowCount() {
		// Get row count (we assume $this->executeQuery() was called before)
		return $this->result->num_rows;
	}

	public function closeConnection() {
        $this->dbh->close();
    }
}

?>
