<?php
    include("partials/header.php");
    $arrMediaContent = $pageContent->getResults("SELECT extra_element_table.strExtraElement 
    FROM `pages_table` 
    LEFT JOIN extra_element_table 
    ON pages_table.id = extra_element_table.nPageId 
    WHERE pages_table.strName = '".$_GET['id']."'
    ORDER BY extra_element_table.id ASC");

    var_dump($arrMediaContent);
?>
        <!-- Open Container -->
        <main class="container">
          <!-- Row 1 -->
          <section class="row">
            <div class="col-sm-12 col-md-6">
                <h3>Heading 1</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>
                <a class="btn btn-primary">Button</a>
            </div>
            <div class="col-sm-12 col-md-6">
                <img class="product-img" src="assets/defaultImg.png" alt="products"/>
            </div>
          </section>

          <!-- Row 2 -->
          <section class="row">
            <div class="col-sm-12 col-md-6">
                <img class="product-img" src="assets/defaultImg.png" alt="products"/>
            </div>
            <div class="col-sm-12 col-md-6">
                <h3>Heading 2</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>
                <a class="btn btn-primary">Button</a>
            </div>
          </section>


        </main>
    <?php

include("partials/footer.php"); ?>
