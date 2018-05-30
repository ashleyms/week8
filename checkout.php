<?php
    session_start();
    include("partials/header.php");
?>
        <!-- Shop Main Section -->
        <main class="container">
        <!-- option to cancel the checkout process -->
        <a onclick="clearCheckout()" class="cancelCheckout"><i class="fas fa-chevron-left"></i> cancel checkout</a>
        <section class="row">
            <div class="col-sm-12 col-md-7">
                <!-- form taking customer details and payment details for database entry and check -->
                <form method='POST' action='action/placeOrder.php' autofill="off">
                    <div id="accordion">
                        <!-- customer details form accordian card -->
                        <div class="card">
                            <button class="btn btn-accordian" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <h3>Customer Info</h3>
                                    </h5>
                                </div>
                            </button>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label for="name">ful name: </label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Jhon Doe" required="" autocomplete="off" data-validation-required-message="Please enter your name.">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label for="email">email: </label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="example@email.com" required="" autocomplete="off" data-validation-required-message="Please enter your email address.">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label for="phone">contact number: </label>
                                            <input type="text" name="phoneNo" class="form-control" id="phone" pattern="^(\+0?1\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$" placeholder="222-222-2222" required="" autocomplete="off" data-validation-required-message="Please enter your phone number.">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label for="address">Address</label>
                                            <input type="text" name="address1"  class="form-control" id="address" placeholder="1234 Main St" required="" autocomplete="off" data-validation-required-message="Please enter your address.">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label for="address2">Address 2</label>
                                            <input type="text" name="address2" class="form-control" id="address2" placeholder="Apartment, studio, or floor" required="" autocomplete="off" data-validation-required-message="Please enter your address.">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label for="inputCity">City</label>
                                            <input type="text" name="city" class="form-control" id="inputCity" required="" autocomplete="off" data-validation-required-message="Please enter your city.">
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label for="inputState">State</label>
                                            <select id="inputState" name="state" class="form-control" required="" autocomplete="off" data-validation-required-message="Please choose your state.">
                                                <option selected>Choose...</option>
                                                <option>British Columbia</option>
                                            </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                            <label for="inputZip">Zip</label>
                                            <input type="text" name="zip" class="form-control" id="inputZip" required="" autocomplete="off" data-validation-required-message="Please enter your zip.">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- payment details form accordian card -->
                        <div class="card">
                            <button class="btn btn-accordian collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <div class="card-header" id="headingTwo">    
                                <h5 class="mb-0">
                                    <h3>Payment Info</h3>
                                </h5>
                            </div>
                        </button>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="card-number">card number: </label>
                                            <input type="text" name="cardNo" class="form-control" id="card-number" minlength="16" maxlength="16" placeholder="XXXX XXXX XXXX 1234" required="" autocomplete="off" data-validation-required-message="Please enter your card number.">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col-xs-7 col-md-7">
                                            <div class="form-group">
                                                <label for="expityDate">
                                                    EXPIRY DATE</label>
                                                <div class="pl-ziro">
                                                    <input type="text" name="expDate" class="form-control" id="expityDate" placeholder="DD/MM/YYYY" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)"
                                                        required="" autocomplete="off" data-validation-required-message="Please enter your card's expiry date." />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-5 col-md-5 pull-right">
                                            <div class="form-group">
                                                <label for="cvCode">
                                                    CVV CODE</label>
                                                <input type="password" name="CVV" class="form-control" id="cvCode" minlength="3" maxlength="3" placeholder="CVV" required="" data-validation-required-message="Please enter your card's cvv no." />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br><br>
                    <a class="btn secondary-btn" href="shop2.php?step=2">Back</a>
                    <input type="submit" class="btn btn-main add-margin big-input" value="place order" />
                </form>
            </div>
            <!-- Box Image -->
            <?php foreach ($arrPageContent as $shop) { ?>
            <div class="col-sm-12 col-md-5 checkout-box">
                <h3>order summary</h3>
                <!-- Box with the choice of jam flavours added to cart -->
                <article class="row">
                    <!-- Loop Through All Products -->
                    <div class="cart-box">
                        <img src="assets/box.png" alt="box img" class="box-img">
                        <div class="row">
                            <?php if(isset($_SESSION["cart_item"])) {
                                foreach ($_SESSION["cart_item"] as $item){ ?>
                            <div class="product-placeholder col-sm-2 col-md-2">
                                <img src="assets/<?=$item["img"]?>" class="preview-img" alt="product preview image">
                                <p>
                                    <?=$item["name"]?>
                                </p>
                                <p>Qty:
                                    <?=$item["quantity"]?>
                                </p>
                                <p>
                                    <?="$".($item["price"]*$item["quantity"])?>
                                </p>
                            </div>
                            <?php } }?>
                        </div>
                    </div>
                </article>
            </div>
            <?php } ?>
        </section>
        <!-- modal windoe to give error if user try to checkout with less items than 3 -->
        <div class="modal fade" id="checkout-error" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Error</h3>
                        <a type="button" class="close" href="shop2.php?step=2">&#x292B;</a>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <p class="red">*Dear customer, 1 box can be made by 3 jam jars only! Please select atleast 3 items or in multiple of 3.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default" href="shop2.php?step=2">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
// <!-- Footer -->
include("partials/footer.php"); ?>