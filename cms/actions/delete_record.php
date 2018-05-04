<?php
include("../functions/myfunctions.php");
//Get ID and PAGE
$_GET["id"] = isset($_GET["id"]) ? $_GET["id"] : null;
$_GET["page"] = isset($_GET["page"]) ? $_GET["page"] : null;

//DELETE
if($_GET["id"]){
    //Product
    if($_GET["page"] === "product"){
        deleteRecord("products", "cms/cms-products");
    }
    //Testimonial
    elseif ($_GET["page"] === "test"){
        deleteRecord("testimonials", "cms/cms-testimonials");
    }
    //User
    elseif ($_GET["page"] === "users"){
        deleteRecord("users", "cms/users");
    }
}
?>
