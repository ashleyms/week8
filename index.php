<?php
    include("partials/header.php");
    $arrFeaturedProduct = $productList->getFeaturedProducts();
?>
        <!-- Open Container -->
        <main class="container">
          <!-- Featured Products -->
          <section class="row">
            <?php foreach ($arrFeaturedProduct as $product) { ?>
            <div class="col-sm-12 col-md-4 product">
                <img class="product-img" src="assets/<?=$product['strProductImg']?>" alt="products"/>
                <h3><?=$product['strProductName']?></h3>
                <p><?=$product['strProductDescription']?></p>
                <label>Qty</label>
                <input type="number" min="1" max="<?=$product['nProductQty']?>"/>
                <button class="btn btn-primary add" type="button" data-toggle="modal" data-target="#ID">Add to Box</button>
            </div>
            <?php
            }
            ?>
          </section>

          <!-- Build A box -->
          <section class="row">

          <!-- Loop Through Nav Items -->
          <?php foreach ($arrPageContent as $home) { ?>
            <div class="col-sm-12 col-md-6">
              <h3><?=$home['strSubHeading']?></h3>
              <p><?=$home['strText']?></p>
              <a class="btn btn-primary"><?=$arrExtraContent[0]['strExtraElement']?></a>
            </div>
            <div class="col-sm-12 col-md-6">
              <img class="product-img" src="assets/<?=$home['strImage']?>" alt="products"/>
            </div>
          <?php
          }
          ?>

          </section>

          <!-- Instagram Feed ***FIND PLUGIN**** -->
          <section class="row">
            <h2 class="col-sm-12">Instagram</h2>
            <div class="col-sm-12 col-md-3">
              <img class="product-img" src="assets/defaultProduct.png" alt="products"/>
            </div>
            <div class="col-sm-12 col-md-3">
              <img class="product-img" src="assets/defaultProduct.png" alt="products"/>
            </div>
            <div class="col-sm-12 col-md-3">
              <img class="product-img" src="assets/defaultProduct.png" alt="products"/>
            </div>
            <div class="col-sm-12 col-md-3">
              <img class="product-img" src="assets/defaultProduct.png" alt="products"/>
            </div>
          </section>

        </main>
    <?php

include("partials/footer.php"); ?>
