<?php
include("../../classes/DBController.php");
include("../../classes/cms.php");
$CMSControl = new CMS();
$results = $CMSControl->getResults("SELECT order_table.id FROM order_table LEFT JOIN customer_table ON order_table.nCustomerId = customer_table.id WHERE order_table.id = '".$_POST['strFind']."' || customer_table.strCustEmail = '".$_POST['strFind']."'");
$orderid = "";

//If no record is found
if(!$results){
  header("location: ../orders.php?error=true");
}

//If found - Get all ids that match
else{
  foreach ($results as $id) {
    $orderid .= $id["id"] . "|";
  }
  header("location: ../orders.php?find='" . $orderid . "'");
}

?>
