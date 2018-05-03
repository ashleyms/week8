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

	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	// function getResults($sql) {
	// 	$result = mysqli_query($this->conn,$sql);
	// 	while($row=mysqli_fetch_assoc($result)) {
	// 		$resultset[] = $row;
	// 	}
	// 	if(!empty($resultset))
	// 		return $resultset;
	// }

	// function getRecord($sql){
	// 		$result = mysqli_query($this->conn,$sql);
	// 		while($row=mysqli_fetch_assoc($result)) {
	// 			return $row;
	// 		}
	// }

	// function numRows($query) {
	// 	$result  = mysqli_query($this->conn,$query);
	// 	$rowcount = mysqli_num_rows($result);
	// 	return $rowcount;
	// }
}
?>
