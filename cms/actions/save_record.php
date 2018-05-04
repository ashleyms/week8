<?php
include("../functions/myfunctions.php");
//Get  ID and PAGE
$_GET["id"] = isset($_GET["id"]) ? $_GET["id"] : null;
$_GET["page"] = isset($_GET["page"]) ? $_GET["page"] : null;

if($_GET["id"]){
	//Product
	if($_GET["page"] === "product"){
		$arrProd = getResults("SELECT strImage FROM `products` WHERE id='".$_GET["id"]."'");
		//If no image selected use original
		foreach ($arrProd as $prod) {
			$imagePath = uploadFile("strImage");
			if(!$imagePath){
			 	$imagePath = $prod["strImage"];
			 }
		}

		newRecord("UPDATE products SET
			strName = '".escapeRecord($_POST["strName"])."',
			strDesc = '".escapeRecord($_POST["strDesc"])."',
			nRating = '".$_POST["nRating"]."',
			strImage = '".$imagePath."',
			strDirections = '".escapeRecord($_POST["strDirections"])."',
			strAbout = '".escapeRecord($_POST["strAbout"])."'
			WHERE id='".$_GET["id"]."'");
	    header("location: ../cms/cms-products.php");
	}

	//Testimonials
	elseif($_GET["page"] === "test"){
		$arrTest = getResults("SELECT strImage FROM `testimonials` WHERE id='".$_GET["id"]."'");
		//If no image selected use original
		foreach ($arrTest as $test) {
			$imagePath = uploadFile("strImage");
			if(!$imagePath){
			 	$imagePath = $test["strImage"];
			 }
		}
		newRecord("UPDATE testimonials SET
			strName = '".escapeRecord($_POST["strName"])."',
			strTitle = '".escapeRecord($_POST["strTitle"])."',
			strReview = '".escapeRecord($_POST["strReview"])."',
			strImage = '".$imagePath."',
			nRating = '".$_POST["nRating"]."',
			dateSubmit = '".$_POST["dateSubmit"]."'
			WHERE id='".$_GET["id"]."'");
		 header("location: ../cms/cms-testimonials.php");
	}

	//Users
	elseif($_GET["page"] === "users"){
		newRecord("UPDATE users SET
			strName = '".escapeRecord($_POST["strName"])."',
			strUser = '".$_POST["strUser"]."',
			strPassword = '".$_POST["strPassword"]."'
			WHERE id='".$_GET["id"]."'");
	    header("location: ../cms/users.php");
	}
}
?>
