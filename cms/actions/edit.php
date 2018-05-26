<?php
include("../../classes/DBController.php");
include("../../classes/cms.php");
$CMSControl = new CMS();

if(isset($_GET["page"])) {
    //Edit Products
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
        strProductIntro = '".$_POST["strProductIntro"]."',
        strIngredients = '".$_POST["strIngredients"]."',
        bFeatured = '".$_POST["bFeatured"]."',
  			strProductImg = '".$imagePath."'
  			WHERE id='".$_GET["id"]."'");

  		  header("location: ../products.php");
    }

    //Edit Pages
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

    if($_GET["page"]=== "content"){
      $arrImg = $CMSControl->getResults("SELECT strImage FROM `content_table` WHERE nPageId='".$_GET["id"]."'");
      //If no img use original
      foreach ($arrImg as $img) {
        $imagePath = $CMSControl->uploadFile("strImage");
        if(!$imagePath){
          $imagePath = $img["strImage"];
         }
      }

      //Home, About, Shop
      if($_GET["id"] == 1 || $_GET["id"] == 2 || $_GET["id"] == 5){
        $result = $CMSControl->add("UPDATE content_table SET
            strSubHeading = '".$_POST["strSubHeading"]."',
            strText = '".$_POST["strText"]."',
            strImage = '".$imagePath."'
            WHERE nPageId='".$_GET["id"]."'");
      }

      //Contact
      if($_GET["id"] == 6){
        $result = $CMSControl->add("UPDATE content_table SET
            strText = '".$_POST["strText"]."'
            WHERE nPageId='".$_GET["id"]."'");
      }

      //Recipe
      if($_GET["id"] == 3){
        $imagePath = $CMSControl->uploadFile("strImage");
        if(!$imagePath){
          $imagePath = $_POST["blankImg"];
        }

        $result = $CMSControl->add("UPDATE content_table SET
            strSubHeading = '".$_POST["strSubHeading"]."',
            strText = '".$_POST["strText"]."',
            strImage = '".$imagePath."'
            WHERE nPageId='".$_GET["id"]."'");
      }
  		 header("location: ../content.php?page=".$_GET["id"]."&temp=1");
    }

    //Extra Table
    if($_GET["page"]=== "extra"){

      $imagePath = $CMSControl->uploadFile("strImage");
      if(!$imagePath){
        $imagePath = $_POST["blankImg"];
      }

      $result = $CMSControl->add("UPDATE extra_element_table SET
  			strExtraElement = '".$_POST["strTitle"]."|".$imagePath."|".$_POST["strText"]."'
  			WHERE id='".$_GET["id"]."'");

  		  header("location: ../content.php?page=".$_POST["nPageId"]."&temp=1");
    }

}

?>
