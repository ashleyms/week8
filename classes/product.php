<?php
class Product extends DBController {

	function getAllProducts() {
		$result = mysqli_query($this->conn,"SELECT * FROM product_table");
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	function getFeaturedProducts() {
		$result = mysqli_query($this->conn,"SELECT * FROM product_table WHERE bFeatured = 0");
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	function getProducts($sql) {
		$result = mysqli_query($this->conn,$sql);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	function getProduct($sql){
		$result = mysqli_query($this->conn,$sql);
		while($row=mysqli_fetch_assoc($result)) {
			return $row;
		}
	}

	
}

?>
