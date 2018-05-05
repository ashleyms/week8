<?php
include("../../classes/DBController.php");
include("../../classes/cms.php");
$CMSControl = new CMS();

if(isset($_GET["page"])) {
    if($_GET["page"]=== "product"){
      $arrProd = $CMSControl->getResults("SELECT strProductImg FROM `product_table` WHERE id='".$_GET["id"]."'");

      //If no image selected use original
      foreach ($arrProd as $prod) {
        $imagePath = $CMSControl->uploadFile("strProductImg");
        if(!$imagePath){
          $imagePath = $prod["strProductImg"];
         }
      }

      $result = $CMSControl->add("UPDATE product_table SET
  			strProductName = '".$_POST["strProductName"]."',
  			strCode = '".$_POST["strCode"]."',
  			nProductPrice = '".$_POST["nProductPrice"]."',
        nProductQty = '".$_POST["nProductQty"]."',
        strProductDescription = '".$_POST["strProductDescription"]."',
        bFeatured = '".$_POST["bFeatured"]."',
  			strProductImg = '".$imagePath."'
  			WHERE id='".$_GET["id"]."'");
        
  		  header("location: ../products.php");
    }

}

?>
