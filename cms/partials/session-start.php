<?php
    session_start();
    //If user id is not found
    if (!$_SESSION["nUserID"]){
        die(header("location: login.php?error=true"));
    }
 ?>
