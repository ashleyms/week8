<?php
    session_start();
    include("partials/header.php");
?>
        <!-- Open Container -->
        <main class="container">

          <!-- Featured Products -->
          <section class="row">
              <?=$productList->showFeaturedProducts();?>
          </section>

          <!-- Build A box -->
          <section class="row">
          <!-- Loop Through Page Items -->
          <?php foreach ($arrPageContent as $home) { ?>
            <div class="col-sm-12 col-md-6 product">
              <h3><?=$home['strSubHeading']?></h3>
              <p><?=$home['strText']?></p>
              <a class="btn btn-main add-margin" href="step1.php?id=Shop"><?=$arrExtraContent[0]['strExtraElement']?></a>
            </div>
            <div class="col-sm-12 col-md-6 product-img">
              <img src="assets/<?=$home['strImage']?>" alt="products"/>
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
        </main>
    <?php

include("partials/footer.php"); ?>
