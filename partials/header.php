<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?=$pageTitle?> | VANARTS STUDENT MOCK PROJECT SITE</title>
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
    $dbControl = new DBController();
    //Get Nav Items
    $arrNavList = $dbControl->getResults("SELECT * FROM pages_table ORDER BY id ASC");
 ?>
<body>
    <!-- Open Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="index.php"><img class="main-logo" src="assets/logo.jpg" alt="east van jam logo"/></a>
        <!-- Cart -->
        <button class="cart" type="button" data-toggle="modal" data-target="MODAL-ID"><i class="fas fa-shopping-cart"></i> Cart</button>
        <!-- Open Main Nav -->
        <nav class="main-nav">
            <ul class="nav">
              <!-- Loop Through Nav Items -->
              <?php foreach ($arrNavList as $navItem) { ?>
                <li>
                    <a href="<?=$navItem['strPageUrl']?>.php"><?=$navItem['strName']?></a>
                </li>
              <?php } ?>
            </ul>
        </nav>
        <!-- Close Main Nav -->
    </header>
    <!-- Close Header -->

    <!-- Open Hero -->
    <section class="hero">
      <h1><?=$HeroTitle?></h1>
      <img src="assets/<?=$HeroImg?>"/>
    </section>
