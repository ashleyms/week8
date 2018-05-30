<?php
session_start();
include("partials/header.php");
include("partials/addToCartProcess.php");
?>
    <!-- Shop step-2 Main Section -->
    <main class="container">
        <!-- Side Navbar for steps direction -->
        <section class="row">
            <article class="col-sm-2 col-md-2 horizontal">
                <div id="step1-icon">
                    <div class="step-div">
                        <img src="assets/box-icon.jpg" alt="step 1" class="step-icon">
                        <p>step 1</p>
                    </div>
                    <div></div>
                    <div class="fa-lg">
                        <span class="fa-layers fa-fw">
                            <i class="fas fa-circle whiteDot"></i>
                            <!-- <i class="fa-inverse fas fa-check" data-fa-transform="shrink-6"></i> -->
                        </span>
                    </div>
                </div>
                <div id="step2-icon">
                    <div class="step-div">
                        <img src="assets/jar.jpg" alt="step 2" class="step-icon">
                        <p>step 2</p>
                    </div>
                    <div></div>
                    <div class="fa-lg">
                        <span class="fa-layers fa-fw">
                            <i class="fas fa-circle <?=$step2Dot?>"></i>
                            <!-- <i class="fa-inverse fas fa-check" data-fa-transform="shrink-6"></i> -->
                        </span>
                    </div>
                </div>
                <div id="step3-icon">
                    <div class="step-div">
                        <img src="assets/checkout.jpg" alt="step 3" class="step-icon">
                        <p>step 3</p>
                    </div>
                    <div class="fa-lg">
                        <span class="fa-layers fa-fw">
                            <i class="fas fa-circle <?=$step3Dot?>"></i>
                            <!-- <i class="fa-inverse fas fa-check" data-fa-transform="shrink-6"></i> -->
                        </span>
                    </div>
                </div>
            </article>

            <!-- Step 2 : Choose your flavours section -->
            <div class="col-sm-12 col-md-5 steps <?=$Step2?>">
                <h3>2. Choose your flavours</h3>
                <p>choose 3 flavours of your choice<br>
                <small>*A box can be formed by minimum 3 jam bottles </small></p>
                <!-- empty the session -->
                <a id="btnEmpty" class="secondary-btn" href="shop2.php?step=2&action=empty&id=Shop">Empty Cart</a>
                <!-- use cookie for the no of boxes selected by user -->
                <?php $noOfBoxes = $_COOKIE['boxQty'];
                // loop through the no. of boxes selected by user
                        for ($i=0; $i < $noOfBoxes ; $i++) { ?>
                <!-- Box with the choice of jam flavours added to cart -->
                <div class="cart-box">
                    <img src="assets/box.png" alt="box img" class="box-img">
                    <!-- Cheeck if session exists -->
                    <?php
                            if(isset($_SESSION["cart_item"])){
                            // <!-- Set total order amount to 0 -->
                                $item_total = 0; ?>
                    <!-- Loop through all the products added to cart -->
                    <div class="row">
                        <?php $totalQty = 0 ;
                            foreach ($_SESSION["cart_item"] as $item) { ?>
                        <div class="product-placeholder col-sm-2 col-md-2">
                            <a href="shop2.php?step=2&action=remove&code=<?=$item["code"]?>&id=Shop"><i class="far fa-trash-alt"></i></a>
                            <img src="assets/<?=$item['img']?>" alt="cart product" class="cart-product">
                            <p>
                                <?=$item["name"]?>
                            </p>
                            <p>Qty:
                                <?=$item["quantity"]?>
                            </p>
                            <p>
                                <?="$".$item["price"]?>
                            </p>
                        </div>
                        <?php $totalQty += $item["quantity"]; } ?>
                    </div>
                    <?php } ?>
                </div>
                <?php
                // add total qty of all the products in session/cart
                            if (!empty($_SESSION["cart_item"])){
                                $items = $totalQty;
                            }
                            else {
                            // if session empty set qty to 0
                                $items = 0;
                            }
                        }?>

                <p><small class="red" id="error-msg">*Dear customer, 1 box can be made by 3 jam jars only! Please select atleast 3 items or in multiple of 3.</small></p>
                <!-- redirect to step1 -->
                <a class="btn secondary-btn" href="step1.php?id=Shop">back</a>
                <a class="btn btn-main add-margin" onclick="checkCondition('<?=$items?>')">next step</a>
            </div>
            <!-- List of all products -->
            <div class="col-sm-12 col-md-5 <?=$Step2?>">
                <article class="row">
                    <!-- Cheeck if products are not 0/empty -->
                    <?php if (!empty($arrAllProduct)) {
                            // <!-- Loop Through All Products -->
                            foreach ($arrAllProduct as $key=>$value) { ?>
                    <div class="col-sm-12 col-md-4 shop-product">
                        <form method="post" action="shop2.php?step=2&id=Shop&action=add&code=<?=$arrAllProduct[$key]["strCode"]?>" id="addToCart">
                            <input type="hidden" name="box-qty" value="<?=$_COOKIE['boxQty']?>" />
                            <div>
                                <img src="assets/<?=$arrAllProduct[$key]["strProductImg"] ?>" class="product-image" alt="products">
                            </div>
                            <div>
                                <h3 data-toggle="modal" data-target="#detailmodal<?=$arrAllProduct[$key]["id"]?>">
                                    <?=$arrAllProduct[$key]["strProductName"] ?>
                                </h3>
                                <p>
                                    <?=$arrAllProduct[$key]['strProductIntro']?>
                                </p>
                            </div>
                            <div>
                                <?="$".$arrAllProduct[$key]["nProductPrice"] ?>
                            </div>
                            <div>
                                <label>qty</label>
                                <!-- set default value of qty as 1 for better ser experience -->
                                <input type="number" name="quantity" value="1" min="1" max="<?=$arrAllProduct[$key]['nProductQty']?>" />
                                <button class="btn btn-main add btn-product" type="submit">Add to Box</button>
                            </div>
                        </form>
                    </div>
                    <?php } }?>
                </article>
            </div>

            <!-- Step 3 : Confirm your box -->
            <!-- Order Details/Summary -->
            <div class="col-sm-12 col-md-6 steps <?=$Step3?>">
                <h3>3. Confirm your box</h3>
                <?php if(isset($_SESSION["cart_item"])) {
                    $orderTotal = 0; ?>
                <table class="table table-striped table-dark summary-table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($_SESSION["cart_item"] as $item){
                        // calculate the total amount of order
                            $itemTotal = ($item["price"]*$item["quantity"]);
                            ?>
                            <tr>
                                <td>
                                    <?=$item["name"]?>
                                </td>
                                <td>
                                    <?=$item["price"]?>
                                </td>
                                <td>
                                    <?=$item["quantity"]?>
                                </td>
                                <td>
                                    <?=$itemTotal?>
                                </td>
                            </tr>
                            <!-- calculate the total amount of order -->
                            <?php $orderTotal += $itemTotal;} ?>
                            <tr>
                                <td colspan="3" style="text-align:right">Total:</td>
                                <td>
                                    <?php echo $orderTotal; ?>
                                </td>
                            </tr>
                    </tbody>
                </table>
                <div>
                    <p>Note: Review and proceed to checkout your order</p>
                </div>
                <a class="btn secondary-btn" href="shop2.php?step=2&id=Shop">back</a>
                <a class="btn btn-main add-margin" href="checkout.php?id=Shop">Checkout</a>
            <?php } ?>
            </div>
            <!-- Order Details/Summary -->
            <div class="col-sm-12 col-md-4 <?=$Step3?>">
                <article class="row">
                    <!-- Loop through products in the cart -->
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
                            </div>
                            <?php } }?>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    </main>

<?php
// <!-- Footer -->
include("partials/footer.php"); ?>
