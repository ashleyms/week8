<?php
require_once("../../classes/DBController.php");
require_once("../../classes/cms.php");
$CMSControl = new CMS();

//Log User In
session_start();

//Look for User
$arrFoundUser = $CMSControl->login("SELECT id FROM CMS_admin_table WHERE strUsername='".$_POST["strUser"]."' AND strPassword='".$_POST["strPassword"]."'");

header("location: ../dashboard.php");

?>
