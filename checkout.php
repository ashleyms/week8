<?php
    session_start();
    include("partials/header.php");
?>
    <!-- Shop Main Section -->
    <main class="container">
        <a onclick="clearCheckout()" class="cancelCheckout"><i class="fas fa-chevron-left"></i> cancel checkout</a>
            <section class="row">
            <!-- Step 1 : Build A box -->
                <!-- Step details and choose qty option -->
                <?php foreach ($arrPageContent as $shop) { ?>
                <div class="col-sm-12 col-md-7">
                    <div id="accordion">
                        <div class="card">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <h3>Customer Info</h3>
                                    </h5>
                                </div>
                            </button>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                <form method='POST' action='#'>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="name">ful name: </label>
                                            <input type="text" name="name" class="form-control" id="name" required="" data-validation-required-message="Please enter your name.">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">email: </label>
                                            <input type="email" name="email" class="form-control" id="email" required="" data-validation-required-message="Please enter your email address.">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">address: </label>
                                            <textarea name="str-address" class="form-control" id="address" required="" data-validation-required-message="Please enter your address." ></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <div class="card-header" id="headingTwo">    
                                <h5 class="mb-0">
                                    <h3>Payment Info</h3>
                                </h5>
                            </div>
                        </button>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <form method='POST' action='#'>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="card-number">card number: </label>
                                            <input type="text" name="email" class="form-control" id="card-number" required="" data-validation-required-message="Please enter your email address.">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col-xs-7 col-md-7">
                                            <div class="form-group">
                                                <label for="expityMonth">
                                                    EXPIRY DATE</label>
                                                <div class="pl-ziro">
                                                    <input type="text" class="form-control" id="expityMonth" placeholder="DD/MM/YYYY" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-5 col-md-5 pull-right">
                                            <div class="form-group">
                                                <label for="cvCode">
                                                    CVV CODE</label>
                                                <input type="password" class="form-control" id="cvCode" placeholder="CVV" required />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><br><br>
                    <a class="btn" href="shop2.php?step=2">Back</a>
                    <a class="btn btn-primary" href="#">place order</a>
                </div>
                <!-- Box Image -->
                <?php foreach ($arrPageContent as $shop) { ?>
                <div class="col-sm-12 col-md-5 checkout-box">
                    <h3>order summary</h3>
                    <!-- Box with the choice of jam flavours added to cart -->
                    <article class="row">
                        <!-- Loop Through All Products -->
                        <div class="cart-box">
                            <img src="assets/defaultProduct.jpg" alt="box img" class="box-img">
                            <div class="row">
                            <?php foreach ($_SESSION["cart_item"] as $item){ ?>
                                <div class="product-placeholder col-sm-2 col-md-2">
                                    <img src="assets/<?=$item["img"]?>" class="preview-img" alt="product preview image">
                                    <p><?=$item["name"]?></p>
                                    <p>Qty: <?=$item["quantity"]?></p>
                                    <p><?="$".($item["price"]*$item["quantity"])?></p>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </article>
                </div>
                <?php } ?>
                <?php } ?>
            </section>
        </main>
    <?php
// <!-- Footer -->
include("partials/footer.php"); ?>