<?php
class Product extends DBController {

	// to get all the products from product table
	function getAllProducts() {
		$result = mysqli_query($this->conn,"SELECT * FROM product_table");
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	// to get featured product
	function getFeaturedProducts() {
		$result = mysqli_query($this->conn,"SELECT * FROM product_table WHERE bFeatured = 0");
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}
	
	// Display featured products
	function showFeaturedProducts(){
		$arrFeaturedProduct = Product::getFeaturedProducts();
		include("views/featuredGrid.php");
	}

	// generic function to get multiple products based on different where clause
	function getProductIdInCart($productName) {
		$result = mysqli_query($this->conn,"SELECT id FROM product_table WHERE strProductName ='" . $productName . "'");
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	// function to add each item selected by user to cart
	function addProductToCart($sql){
		$result = mysqli_query($this->conn,"SELECT * FROM product_table WHERE strCode='" . $sql . "'");
		while($row=mysqli_fetch_assoc($result)) {
			return $row;
		}
	}
}

?>
