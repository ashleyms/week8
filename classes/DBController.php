<?php
class DBController {
	private $host = "192.185.103.161";
	private $user = "kunika_admin";
	private $password = "web13";
	private $database = "kunika_evj_db";
	protected $conn;

	function __construct() {
		$this->conn = $this->connectDB();
	}

	private function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
}
?>
