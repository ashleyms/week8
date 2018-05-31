<?php 
// get all the products
$arrAllProduct = $productList->getAllProducts();
// check on which step user is to show respective section
switch($_GET["step"]) {
    case 1:
        die();
    break;
    // show step 2
    case 2:
        $Step1 = 'hide';
        $Step2 = 'show';
        $Step3 = 'hide';
        $step2Dot = 'blackDot';
        $step3Dot = 'whiteDot';
        $step2Opa = 'opacityH';
        $step3Opa = 'opacityL';
    break;
    // show step 3
    case 3:
        $Step1 = 'hide';
        $Step2 = 'hide';
        $Step3 = 'show';
        $step2Dot = 'whiteDot';
        $step3Dot = 'blackDot';
        $step2Opa = 'opacityL';
        $step3Opa = 'opacityH';
    break;
}
// check if user did any action : adding item to cart/ removed item from cart/ empty the cart
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        // add item to cart
        case "add":
        // allow only if there is any value in qty input
            if(!empty($_POST["quantity"])) {
                // get product details user want to add in cart
                $productByCode = $productList->addProductToCart($_GET["code"]);
                // make another array to save qty entered by user and to store product details
                $itemArray = array($productByCode["strCode"]=>array('img'=>$productByCode["strProductImg"], 'name'=>$productByCode["strProductName"], 'code'=>$productByCode["strCode"], 'inStock'=>$productByCode["nProductQty"], 'quantity'=>$_POST['quantity'], 'price'=>$productByCode["nProductPrice"]));
                // check if session already have any product
                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productByCode["strCode"],array_keys($_SESSION["cart_item"]))) {
                        // loop through the products in session to amend qty
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode["strCode"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                // add qty of same product
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        // merge arrays, by adding new item added to cart with the items already in session
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                    // if session dosen't have any product then
                    // add item to session
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
        break;
        // remove the products from session
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                        if($_GET["code"] == $k)
                            unset($_SESSION["cart_item"][$k]);
                        if(empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                }
            }
        break;
        // clear items from session
        case "empty":
            unset($_SESSION["cart_item"]);
        break;
    }
}
?>