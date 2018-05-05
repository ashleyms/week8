<?php
include("../../classes/DBController.php");
include("../../classes/cms.php");
$CMSControl = new CMS();

if(isset($_GET["page"])) {
    if($_GET["page"]=== "product"){
      $imagePath = $CMSControl->uploadFile("strProductImg");
      $result = $CMSControl->add("INSERT INTO product_table (strProductName, strCode, nProductPrice, nProductQty, strProductDescription, bFeatured, strProductImg ) VALUES ('".$_POST["strProductName"]."', '".$_POST["strCode"]."', '".$_POST["nProductPrice"]."', '".$_POST["nProductQty"]."', '".$_POST["strProductDescription"]."', '".$_POST["bFeatured"]."','".$imagePath."')");
  		header("location: ../products.php");
    }

}

?>
