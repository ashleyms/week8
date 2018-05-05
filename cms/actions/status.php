<?php
include("../../classes/DBController.php");
include("../../classes/cms.php");
$CMSControl = new CMS();
    if($_GET["stat"] === "Full-Filled"){
      $status = 1;
    }
    else{
      $status = 0;
    }
    
    $result = $CMSControl->changeStatus($status, $_GET["id"]);
    header("location: ../orders.php");


?>
