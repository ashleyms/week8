<?php
//Call Session
session_start() ;
//Remove User ID
session_unset($_SESSION['nUserID']);
//Return to Login
header("location: ../index.php");
?>
