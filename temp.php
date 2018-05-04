<?php
    include("partials/header.php");
?>
        <!-- Open Container -->
        <main class="container">
          <!-- Row 1 -->
          <?php foreach ($arrPageContent as $temp) { ?>
          <section class="row">
            <div class="col-sm-12 col-md-6">
                <h3><?=$temp['strSubHeading']?></h3>
                <p><?=$temp['strText']?></p>
                <?php if($_GET['id'] === "About") { ?>
                <a class="btn btn-primary"><?=$arrExtraContent[0]['strExtraElement']?></a>
                <?php
                }
                ?>
            </div>
            <div class="col-sm-12 col-md-6">
                <img class="product-img" src="assets/<?=$temp['strImage']?>" alt="products"/>
            </div>
          </section>
          <?php
          }
          ?>

          <!-- Row 2 -->
          <?php if($_GET['id'] != "About") {
            foreach ($arrExtraContent as $temp) {
            $data = explode("|", $temp['strExtraElement']); ?>
          <section class="row flip">
            <div class="col-sm-12 col-md-6 flip-img">
                <img class="product-img" src="assets/<?=$data[1]?>" alt="products"/>
            </div>
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
    <?php include("partials/footer.php"); ?>
