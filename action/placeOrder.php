<?php
    session_start();
    require_once("../classes/DBController.php");
    require_once("../classes/orders.php");
    require_once("../classes/product.php");

    $newOrder = new Order();
    $productDetails = new Product();

    $bRegistered = $newOrder->checkCustRegistered("SELECT bRegistered FROM customer_table WHERE strCustEmail ='".$_POST["email"]."'");

    if(!$bRegistered) {
        $custId = $newOrder->createOrder("INSERT INTO customer_table (`strCustName`, `strCustEmail`, `nCustContactNo`, `strCustAddress`, `bRegistered`) 
        VALUES ('".$_POST["name"]."', 
        '".$_POST["email"]."', 
        '".$_POST["phoneNo"]."', 
        '".$_POST["address"]."', 
        '".$bRegistered."')");
    }
    else {
        $custId = $newOrder->checkCustRegistered("SELECT id FROM customer_table WHERE strCustEmail ='".$_POST["email"]."'");
        $custId= $custId['id'];

        var_dump($custId);
    }

    $orderTotal = 0;
    $arrProductId = array();
    foreach ($_SESSION["cart_item"] as $item) {
        $orderTotal += ($item['price']*$item['quantity']);
        $productId = $productDetails->getProducts("SELECT id FROM product_table WHERE strProductName ='".$item['name']."'");
        $productId = $productId[0]['id'];
        array_push($arrProductId, $productId);
    }

    $orderId = $newOrder->createOrder("INSERT INTO order_table (`nCustomerId`, `dOrderDate`, `nOrderAmount`) VALUES ('".$custId."', NOW(), '".$orderTotal."')");         


    foreach ($arrProductId as $prodId) {
        $newOrder->createOrder("INSERT INTO order_item_table (`nOrderId`, `nProductId`) VALUES ('".$orderId."', '".$prodId."')");         
    }

    header("location: ../index.php?msg=success");
?>