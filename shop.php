<?php
    include("partials/header.php");
    $arrAllProduct = $productList->getAllProducts();
?>
        <!-- Shop Main Section -->
        <main class="container">
            <!-- Side Navbar for steps directio -->
            <section class="row">
                <article class="col-sm-2 col-md-2">
                    <div id="step1-icon">
                        <div class="step-div">
                            <img src="assets/defaultProduct.jpg" alt="step 1" class="step-icon">
                            <p>step 1</p>
                        </div>
                        <div></div>
                        <div class="fa-lg">
                            <span class="fa-layers fa-fw">
                                <i class="fas fa-circle"></i>
                                <!-- <i class="fa-inverse fas fa-check" data-fa-transform="shrink-6"></i> -->
                            </span>
                        </div>
                    </div>
                    <div id="step2-icon">
                        <div class="step-div">
                            <img src="assets/defaultProduct.jpg" alt="step 2" class="step-icon">
                            <p>step 2</p>
                        </div>
                        <div></div>
                        <div class="fa-lg">
                            <span class="fa-layers fa-fw">
                                <i class="fas fa-circle"></i>
                                <!-- <i class="fa-inverse fas fa-check" data-fa-transform="shrink-6"></i> -->
                            </span>
                        </div>
                    </div>
                    <div id="step3-icon">
                        <div class="step-div">
                            <img src="assets/defaultProduct.jpg" alt="step 3" class="step-icon">
                            <p>step 3</p>
                        </div>
                        <div class="fa-lg">
                            <span class="fa-layers fa-fw">
                                <i class="fas fa-circle"></i>
                                <!-- <i class="fa-inverse fas fa-check" data-fa-transform="shrink-6"></i> -->
                            </span>
                        </div>
                    </div>
                </article>
                
            <!-- Step 1 : Build A box -->
                <!-- Step details and choose qty option -->
                <?php foreach ($arrPageContent as $shop) { ?>
                <div class="col-sm-10 col-md-4" id="step1-left">
                    <h3>1. <?=$shop['strSubHeading']?></h3>
                    <p><?=$shop['strText']?></p>
                    <label>qty</label>
                    <input type="number" min="1" max="10"/><br>
                    <small>*A box can be formed by minimum 3 jam bottles </small></p>
                    <a class="btn btn-primary" id="step1-next" href="#step1">next step</a>
                </div>
                <!-- Box Image -->
                <div class="col-sm-10 col-md-6" id="step1-right">
                    <img class="product-img" src="assets/<?=$shop['strImage']?>" alt="products"/>
                </div>
                <?php } ?>

            <!-- Step 2 : Choose your flavours -->
                <?php foreach ($arrPageContent as $shop) { ?>
                <div class="col-sm-12 col-md-5 steps"  id="step2-left">
                    <h3>2. Choose your flavours</h3>
                    <p>choose 3 flavours of your choice<br>
                    <small>*A box can be formed by minimum 3 jam bottles </small></p>
                    <!-- Box with the choice of jam flavours added to cart -->
                    <div class="cart-box">
                        <img src="assets/defaultProduct.jpg" alt="box img" class="box-img">
                        <div class="product-placeholder">
                            <i class="fas fa-times-circle"></i>
                            <img src="assets/defaultProduct.jpg" alt="cart product" class="cart-product">
                            <p>Product1</p>
                            <p>$24</p>
                        </div>
                        <div class="product-placeholder">
                            <i class="fas fa-times-circle"></i>
                            <img src="assets/defaultProduct.jpg" alt="cart product" class="cart-product">
                            <p>Product2</p>
                            <p>$34</p>
                        </div>
                        <div class="product-placeholder">
                            <i class="fas fa-times-circle"></i>
                            <img src="assets/defaultProduct.jpg" alt="cart product" class="cart-product">
                            <p>Product3</p>
                            <p>$44</p>
                        </div>
                    </div>
                    <a class="btn" id="step2-back" href="#step1">back</a>
                    <a class="btn btn-primary" id="step2-next" href="#step1">next step</a>
                </div>
                <?php } ?>
                <!-- List of all products -->
                <div class="col-sm-12 col-md-5"  id="step2-right">
                    <article class="row">
                        <!-- Loop Through All Products -->
                        <?php foreach ($arrAllProduct as $product) { ?>
                        <div class="col-sm-12 col-md-4 shop-product">
                            <img class="product-img" src="assets/<?=$product['strProductImg']?>" alt="products"/>
                            <h3><?=$product['strProductName']?></h3>
                            <p><?=$product['strProductDescription']?></p>
                            <label>qty</label>
                            <input type="number" min="1" max="<?=$product['nProductQty']?>"/>
                            <button class="btn btn-primary add" type="button" data-toggle="modal" data-target="#ID">Add to Box</button>
                        </div>
                        <?php
                        }
                        ?>
                    </article>
                </div>

            <!-- Step 3 : Confirm your box -->
                <?php foreach ($arrPageContent as $shop) { ?>
                <!-- Order Summary -->
                <div class="col-sm-12 col-md-5 steps" id="step3-left">
                    <h3>3. Confirm your box</h3>
                    <p>Subtotal: $99</p>
                    <a class="btn" id="step3-back">back</a>
                    <a class="btn btn-primary" href="checkout.php">Checkout</a>
                </div>
                <?php } ?>
                <!-- Complete order -->
                <div class="col-sm-12 col-md-5" id="step3-right">
                    <article class="row">
                        <!-- Loop Through All Products -->
                        <div class="order-box">
                            <img src="assets/defaultProduct.jpg" alt="box img" class="box-img">
                            <div class="product-placeholder">
                                <img src="assets/defaultProduct.jpg" alt="cart product" class="cart-product">
                                <p>Product1</p>
                                <p>$24</p>
                            </div>
                            <div class="product-placeholder">
                                <img src="assets/defaultProduct.jpg" alt="cart product" class="cart-product">
                                <p>Product2</p>
                                <p>$34</p>
                            </div>
                            <div class="product-placeholder">
                                <img src="assets/defaultProduct.jpg" alt="cart product" class="cart-product">
                                <p>Product3</p>
                                <p>$44</p>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
        </main>
    <?php
// <!-- Footer -->
include("partials/footer.php"); ?>