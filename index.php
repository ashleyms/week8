<?php
    $pageTitle = "Home";
    $HeroTitle = "TAG LINE";
    $HeroImg = "defaultBanner.png";
    include("partials/header.php");
?>
        <!-- Open Container -->
        <main class="container">
          <!-- Featured Products -->
          <section class="row">
            <div class="col-sm-12 col-md-4 product">
                <img class="product-img" src="assets/defaultProduct.png" alt="products"/>
                <h3>Product 12</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                <label>Qty</label>
                <select>
                  <option>1</option>
                </select>
                <button class="btn btn-primary add" type="button" data-toggle="modal" data-target="#ID">Add to Box</button>
            </div>
            <div class="col-sm-12 col-md-4 product">
                <img class="product-img" src="assets/defaultProduct.png" alt="products"/>
                <h3>Product 13</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                <label>Qty</label>
                <select>
                  <option>1</option>
                </select>
                <button class="btn btn-primary add" type="button" data-toggle="modal" data-target="#ID">Add to Box</button>
            </div>
            <div class="col-sm-12 col-md-4 product">
                <img class="product-img" src="assets/defaultProduct.png" alt="products"/>
                <h3>Product 14</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                <label>Qty</label>
                <select>
                  <option>1</option>
                </select>
                <button class="btn btn-primary add" type="button" data-toggle="modal" data-target="#ID">Add to Box</button>
            </div>
          </section>

          <!-- Build A box -->
          <section class="row">
            <div class="col-sm-12 col-md-6">
                <h3>Build a Box</h3>
                <p>*A box can be formed by minimum 3 jam bottles </p>
                <a class="btn btn-primary">Build A box</a>
            </div>
            <div class="col-sm-12 col-md-6">
                <img class="product-img" src="assets/defaultProduct.png" alt="products"/>
            </div>
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
