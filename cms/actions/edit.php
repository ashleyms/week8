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

    if($_GET["page"]=== "pages"){
      $arrBanner = $CMSControl->getResults("SELECT strHeroImage FROM `content_table` WHERE nPageId='".$_GET["id"]."'");

      //If no banner use original
      foreach ($arrBanner as $img) {
        $imagePath = $CMSControl->uploadFile("strHeroImage");
        if(!$imagePath){
          $imagePath = $img["strHeroImage"];
         }
      }

      $result = $CMSControl->add("UPDATE pages_table SET
  			strName = '".$_POST["strName"]."'
  			WHERE id='".$_GET["id"]."'");

      $content = $CMSControl->add("UPDATE content_table SET
    			strHeading = '".$_POST["strHeading"]."',
          strHeroImage = '".$imagePath."'
    			WHERE nPageId='".$_GET["id"]."'");

  		 header("location: ../pages.php");
    }

}

?>
