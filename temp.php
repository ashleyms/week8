<?php
    session_start();
    include("partials/header.php");
?>
        <!-- Open Container -->
        <main class="container">
          <!-- Row 1 -->
          <?php foreach ($arrPageContent as $temp) {
                //If Recipe or About Page
                if($temp['nPageId'] == 2 || $temp['nPageId'] == 3){ ?>
          <section class="row">
            <div class="col-sm-12 col-md-6">
                <!-- SubHeading -->
                <h3><?=$temp['strSubHeading']?></h3>
                <!-- Text -->
                <p><?=$temp['strText']?></p>
                
            </div>
            <!-- Image -->
            <div class="col-sm-12 col-md-6">
                <img class="product-img" src="assets/<?=$temp['strImage']?>" alt="products"/>
            </div>
          </section>
          <?php
            }
          }
          ?>

          <!-- Row 2 -->
          <?php if($_GET['id'] != "About") {
            foreach ($arrExtraContent as $temp) {
            $data = explode("|", $temp['strExtraElement']); ?>

          <section class="row flip">
            <!-- Img -->
            <div class="col-sm-12 col-md-6 flip-img">
                <img class="product-img" src="assets/<?=$data[1]?>" alt="products"/>
            </div>
            <!-- Text -->
            <div class="col-sm-12 col-md-6">
                <h3><?=$data[0]?></h3>
                <p><?=$data[2]?></p>
            </div>
          </section>
          <?php
              }
            }
          ?>
        </main>
    <?php  include("partials/footer.php");  ?>
