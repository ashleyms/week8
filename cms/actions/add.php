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
    elseif($_GET["page"]=== "pages"){
      $imagePath = $CMSControl->uploadFile("strHeroImage");
      $result = $CMSControl->addAndReturnID("INSERT INTO pages_table (strName, nTemplateID) VALUES ('".$_POST["strName"]."', '".$_POST["nTemplateID"]."')");
      $content = $CMSControl->add("INSERT INTO content_table (strHeading, strHeroImage, nPageId) VALUES ('".$_POST["strHeading"]."','".$imagePath."','".$result."')");

      header("location: ../pages.php");
    }

}

?>
