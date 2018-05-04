<?php
    include("partials/header.php");
?>
    <!-- Shop Main Section -->
    <main class="container">
            <section class="row">
            <!-- Step 1 : Build A box -->
                <!-- Step details and choose qty option -->
                <?php foreach ($arrPageContent as $shop) { ?>
                <div class="col-sm-12 col-md-7">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h3>Customer Info</h3>
                                </button>
                            </h5>
                            </div>
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
                        <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h3>Payment Info</h3>
                            </button>
                        </h5>
                        </div>
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
                    <a class="btn" href="#">clear</a>
                    <a class="btn btn-primary" href="#">place order</a>
                </div>
                <!-- Box Image -->
                <?php foreach ($arrPageContent as $shop) { ?>
                <div class="col-sm-12 col-md-5">
                    <h3>order summary</h3>
                    <!-- Box with the choice of jam flavours added to cart -->
                    <div class="cart-box">
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
                </div>
                <?php } ?>
                <?php } ?>
            </section>
        </main>
    <?php
// <!-- Footer -->
include("partials/footer.php"); ?>