<?php
session_start();

// include classes
require_once("../classes/DBController.php");
require_once("../classes/orders.php");
require_once("../classes/product.php");

// create object for order and products
$newOrder  = new Order();
$productDetails = new Product();

$address = $_POST['address1'] . " " . $_POST['address2'];

// check if customer is registered
$bRegistered = $newOrder->checkCustRegistered($_POST["email"]);

// if customer is not registered insert details to customer table
if (!$bRegistered) {
    $custId = $newOrder->createCustomerId($_POST["name"], $_POST["email"], $_POST["phoneNo"], $address, $_POST["city"], $_POST["state"], $_POST["zip"], $bRegistered);
    
} else {
// if customer is registered extract its customer id    
    $custId = $newOrder->getCustId($_POST["email"]);
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
    $productId = $productDetails->getProductIdInCart($item['name']);
    // save product id as string 
    $productId = $productId[0]['id'];
    // push individual product id in the empty array created
    array_push($arrProductId, $productId);
}

// insert a new order in database
$orderId = $newOrder->createOrder($custId, $orderTotal);

// insert the products inside that specific order id
foreach ($arrProductId as $prodId) {
    $newOrder->addItemToOrder($orderId, $prodId);
}



header("location: ../index.php?msg=success");
?>
