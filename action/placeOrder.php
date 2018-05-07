<?php
session_start();

// include classes
require_once("../classes/DBController.php");
require_once("../classes/orders.php");
require_once("../classes/product.php");

// create object for order and products
$newOrder       = new Order();
$productDetails = new Product();

// check if customer is registered
$bRegistered = $newOrder->checkCustRegistered("SELECT bRegistered FROM customer_table WHERE strCustEmail ='" . $_POST["email"] . "'");

// if customer is not registered insert details to customer table
if (!$bRegistered) {
    $custId = $newOrder->createOrder("INSERT INTO customer_table (`strCustName`, `strCustEmail`, `nCustContactNo`, `strCustAddress`, `bRegistered`) 
        VALUES ('" . $_POST["name"] . "', 
        '" . $_POST["email"] . "', 
        '" . $_POST["phoneNo"] . "', 
        '" . $_POST["address"] . "', 
        '" . $bRegistered . "')");
} else {
// if customer is registered extract its customer id    
    $custId = $newOrder->checkCustRegistered("SELECT id FROM customer_table WHERE strCustEmail ='" . $_POST["email"] . "'");
// reduce multidimentional array and save it in a variable
    $custId = $custId['id'];
}

// set order total to 0, so as to add price
$orderTotal   = 0;
// create empty array to hold products in order
$arrProductId = array();

// loop through all the products
foreach ($_SESSION["cart_item"] as $item) {
    // calculate order total
    $orderTotal += ($item['price'] * $item['quantity']);
    // get product id by using product name from session
    $productId = $productDetails->getProducts("SELECT id FROM product_table WHERE strProductName ='" . $item['name'] . "'");
    // save product id as string
    $productId = $productId[0]['id'];
    // push individual product id in the empty array created
    array_push($arrProductId, $productId);
}

// insert a new order in database
$orderId = $newOrder->createOrder("INSERT INTO order_table (`nCustomerId`, `dOrderDate`, `nOrderAmount`) VALUES ('" . $custId . "', NOW(), '" . $orderTotal . "')");

// insert the products inside that specific order id
foreach ($arrProductId as $prodId) {
    $newOrder->createOrder("INSERT INTO order_item_table (`nOrderId`, `nProductId`) VALUES ('" . $orderId . "', '" . $prodId . "')");
}

header("location: ../index.php?msg=success");
?>
