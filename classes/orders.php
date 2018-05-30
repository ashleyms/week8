<?php
class Order extends DBController {

  function checkCustRegistered($email){
		$result = mysqli_query($this->conn,"SELECT bRegistered FROM customer_table WHERE strCustEmail ='" . $email . "'");
		while($row=mysqli_fetch_assoc($result)) {
			return $row;
		}
	}

	function getCustId($email) {
		$result = mysqli_query($this->conn,"SELECT id FROM customer_table WHERE strCustEmail ='" . $email . "'");
		while($row=mysqli_fetch_assoc($result)) {
			return $row;
		}
	}

	function createCustomerId($name,$email,$phoneNo,$address,$city,$state,$zip,$bregistered){
		$result = mysqli_query($this->conn,"INSERT INTO customer_table (`strCustName`, `strCustEmail`, `nCustContactNo`, `strCustAddress`, `bRegistered`) 
		VALUES ('" . $name . "', 
		'" . $email . "', 
		'" . $phoneNo . "', 
		'" . $address . "',
		'" . $city . "',
		'" . $state . "', 
		'" . $zip . "', 
		'" . $bregistered . "')");
		return mysqli_insert_id($this->conn);
	}
	
	function createOrder($custId,$orderTotal){
		$result = mysqli_query($this->conn,"INSERT INTO order_table (`nCustomerId`, `dOrderDate`, `nOrderAmount`) 
		VALUES ('" . $custId . "', NOW(), '" . $orderTotal . "')");
		return mysqli_insert_id($this->conn);
	}

	function addItemToOrder($orderId,$prodId) {
		$result = mysqli_query($this->conn,"INSERT INTO order_item_table (`nOrderId`, `nProductId`) 
		VALUES ('" . $orderId . "', '" . $prodId . "')");
		return mysqli_insert_id($this->conn);
	}
	
}

?>
