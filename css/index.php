<?php
    session_start();
    include("partials/header.php");
    $arrFeaturedProduct = $productList->getFeaturedProducts();
     
?>
        <!-- Open Container -->
        <main class="container">
        <?php if(isset($_GET['msg'])) { ?>
            <p class="alert alert-success"> Your order has been placed successfully! :)</p>
        <?php }?>
          <!-- Featured Products -->
          <section class="row">
            <?php foreach ($arrFeaturedProduct as $product) { ?>
            <div class="col-sm-12 col-md-4 product">
                <img class="product-img" src="assets/<?=$product['strProductImg']?>" alt="products"/>
                <h3><?=$product['strProductName']?></h3>
                <p><?=$product['strProductDescription']?></p>
                <button class="btn btn-primary add add-margin" type="button" data-toggle="modal" data-target="#detailmodal<?=$product['id']?>">More Details</button>
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
              <a class="btn btn-primary add-margin" href="step1.php?id=Shop"><?=$arrExtraContent[0]['strExtraElement']?></a>
            </div>
            <div class="col-sm-12 col-md-6">
              <img class="product-img" src="assets/<?=$home['strImage']?>" alt="products"/>
            </div>
          <?php
          }
          ?>

          </section>

          <!-- Instagram Feed PLUGIN -->
          <section class="row">
            <h5 class="col-sm-12">Follow Along On Instagram</h5>
            <!-- LightWidget WIDGET -->
            <script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/2acb2358567a58fb845a19380f0d2f1a.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
          </section>

          <?php
              foreach ($arrFeaturedProduct as $product) { ?>
                  <!-- Modal -->
                  <div class="modal fade" id="detailmodal<?=$product["id"]?>" role="dialog">
          			<div class="modal-dialog">
          				<!-- Modal content-->
          				<div class="modal-content">
                              <div class="modal-body">
                                  <div class="container-fluid">
                                      <div class="row">
                                          <div class = "col-md-5">
                                              <img src="assets/<?=$product["strProductImg"]?>" alt="product">
                                          </div>
                                          <div class = "col-md-7">
                                              <h2><?=$product["strProductName"]?></h2>
                                              <p><?=$product["strProductDescription"]?></p>
                                              <p>Price: $<?=$product["nProductPrice"]?></p>
                                          </div>
                                          <div class = "col-md-8">
                                              <h2>Ingredients</h2>
                                              <p><?=$product["strProductDescription"]?></p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <a type="button" class="btn btn-primary" href="step1.php">continue shopping</a>
                              </div>
          				         </div>
          			        </div>
          		</div>
              <?php } ?>
        </main>
    <?php

include("partials/footer.php"); ?>
