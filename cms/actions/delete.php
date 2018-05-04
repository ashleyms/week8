<?php
include("../../classes/DBController.php");
include("../../classes/cms.php");

if(isset($_POST["nID"])) {
    $CMSControl = new CMS();
    $result = $CMSControl->delete($_POST["strTable"], $_POST["nID"]);
    header("location: ../".$_GET["pg"].".php");
}

?>
