<?php
class Order extends DBController {

    function checkCustRegistered($sql){
		$result = mysqli_query($this->conn,$sql);
		while($row=mysqli_fetch_assoc($result)) {
			return $row;
		}
	}

	function createOrder($sql){
		$result = mysqli_query($this->conn,$sql);
		return mysqli_insert_id($this->conn);
    }
}

?>
