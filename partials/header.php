<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>EAST VAN JAM | VANARTS STUDENT MOCK PROJECT SITE</title>
    <meta name="description" content="This is a student exercise website for the Vancouver Institute of Media Arts (www.vanarts.com)." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="StyleSheet" type="text/css" href="css/normalize.css" />
    <link href="css/bootstrap.css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <link rel="StyleSheet" type="text/css" href="css/main.css" />
    <!-- <link rel="shortcut icon" type="image/ico" href="favicon.ico" /> -->
</head>
<!-- Open Database Connection -->
<?php
    require_once("classes/DBController.php");
    require_once("classes/pages.php");
    require_once("classes/product.php");

    $dbControl = new DBController();
    //Get Nav Items
    $pageContent = new Pages();
    $productList = new Product();
    $arrNavList = $pageContent->getResults("SELECT * FROM `pages_table`
    LEFT JOIN template_table ON pages_table.nTemplateID = template_table.id");
 ?>
<body>
    <!-- Open Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="index.php?id=Home"><img class="main-logo" src="assets/logo.jpg" alt="east van jam logo"/></a>
        <!-- Cart -->
        <button id="cart" class="cart" type="button" data-toggle="modal" data-target="#cart-modal"><i class="fas fa-shopping-cart"></i> Cart</button>
        <!-- cart summary window on hover -->
        <div class="cart-table" id="cart-summary">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" colspan="2">Product Description</th>
                        <th><button type="button" class="close" id="close-btn">&#x292B;</button></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($_SESSION["cart_item"])) {
                        $totalQty = 0;
                        foreach ($_SESSION["cart_item"] as $item) {
                            $itemTotal = ($item["price"]*$item["quantity"]); ?>
                    <tr>
                        <td><img src="assets/<?=$item["img"]?>" alt="preview of product"></td>
                        <td>
                            <p><?=$item["name"]?></p>
                            <p>Qty: <?=$item["quantity"]?></p>
                            <p>Total: <?=$itemTotal?></p>
                        </td>
                        <td><a href="shop2.php?step=2&id=Shop&action=remove&code=<?=$item["code"]?>"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php $totalQty += intval($item["quantity"]); } ?>
                    <tr>
                        <td colspan="3">
                            <!-- error message to remind user to buy min 3 products -->
                            <p><small class="red" id="err-msg">*Dear customer, 1 box can be made by 3 jam jars only! Please select atleast 3 items or in multiple of 3.</small></p>
                        </td>
                    </tr>
                        <td colspan="1">
                            <a type="button" class="btn btn-main add-margin" onclick="checkCondition(<?=$totalQty?>)">Checkout</a>
                        </td>
                        <td colspan="2">
                            <a class="btn secondary-btn" href="step1.php?id=Shop">shop more</a>
                        </td>
                    <?php } else { ?>
                    <tr>
                        <td colspan="3">
                            <p>No items in cart!</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a class="btn secondary-btn" href="step1.php?id=Shop">shop now</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- Open Main Nav -->
        <nav class="main-nav">
            <ul class="nav">
              <!-- Loop Through Nav Items -->
              <?php foreach ($arrNavList as $navItem) { ?>
                <li>
                    <a href="<?=$navItem['strFileLayout']?>?id=<?=$navItem['strName']?>"><?=$navItem['strName']?></a>
                </li>
              <?php } ?>
            </ul>
        </nav>
        <!-- Close Main Nav -->
    </header>
    <!-- Close Header -->

    <?php
    //If id is empty - set to Home
    if(!isset($_GET['id'])){
      $_GET['id'] = "Home";
    }

    //Data from Pages Table
    $arrPageContent = $pageContent->getResults("SELECT *
    FROM `pages_table`
    LEFT JOIN content_table
    ON pages_table.id = content_table.nPageId
    WHERE pages_table.strName = '" . $_GET['id']. "'");

    //Data from Extra content Table
    $arrExtraContent = $pageContent->getResults("SELECT extra_element_table.strExtraElement
    FROM `pages_table`
    LEFT JOIN extra_element_table
    ON pages_table.id = extra_element_table.nPageId
    WHERE pages_table.strName = '".$_GET['id']."'
    ORDER BY extra_element_table.id ASC");

    foreach ($arrPageContent as $navItem) {
    //If Contact
    if ($_GET['id'] === 'Contact') { ?>
    <!-- Open Hero -->
    <section class="hero contact-hero">
    <?php }
    //If Home
    else if ($_GET['id'] === 'Home') { ?>
    <!-- Open Hero -->
    <section class="hero home-hero">
    <?php }
    else { ?>
    <section class="hero">
    <?php }
    //If order was placed - show success message on homescreen
    if(isset($_GET['msg'])) {
        $navItem['strHeading'] = "<span style='font-size:6.5rem;'>Your order has been<br/>placed successfully! :)</span>";
    }
    ?>
        <h1><?=$navItem['strHeading']?></h1>
        <img src="assets/<?=$navItem['strHeroImage']?>" alt="hero Image"/>
    </section>
    <!-- Close Hero -->
    <?php } ?>
