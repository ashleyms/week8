<?php
include("../functions/myfunctions.php");
//Get PAGE
$_GET["page"] = isset($_GET["page"]) ? $_GET["page"] : null;

//New Record
if($_GET["page"]){
	//Product
	if($_GET["page"] === "product"){
		$imagePath = uploadFile("strImage");
		newRecord("INSERT INTO products (strName, strDesc, nRating, strImage, strDirections, strAbout ) VALUES ('".escapeRecord($_POST["strName"])."', '".escapeRecord($_POST["strDesc"])."', '".$_POST["nRating"]."', '".$imagePath."', '".escapeRecord($_POST["strDirections"])."','".escapeRecord($_POST["strAbout"])."')");
		header("location: ../cms/cms-products.php");
	}

	//Testimonial
	elseif($_GET["page"] === "test"){
		$imagePath = uploadFile("strImage");

		newRecord("INSERT INTO testimonials
			(strTitle, nRating, strReview, strName, dateSubmit, strImage)
			VALUES('".escapeRecord($_POST["strTitle"])."', '".$_POST["nRating"]."', '".escapeRecord($_POST["strReview"])."', '".escapeRecord($_POST["strName"])."', '".$_POST["dateSubmit"]."', '".$imagePath."') ");
	       header("location: ../cms/cms-testimonials.php");
	}

	//Users
	elseif($_GET["page"] === "users"){
		newRecord("INSERT INTO users
			(strName, strUser, strPassword)
			VALUES('".escapeRecord($_POST["strName"])."', '".$_POST["strUser"]."', '".$_POST["strPassword"]."') ");
	       header("location: ../cms/users.php");
	}
}
?>
