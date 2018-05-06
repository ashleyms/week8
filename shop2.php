<?php
    session_start();
    include("partials/header.php");
    $arrAllProduct = $productList->getAllProducts();
    switch($_GET["step"]) {
        case 1:
            die();
        break;
        case 2:
            $count = 0;
            $Step1 = 'hide';
            $Step2 = 'show';
            $Step3 = 'hide';
            $step2Dot = 'blackDot';
            $step3Dot = 'whiteDot';
        break;
        case 3:
            $Step1 = 'hide';
            $Step2 = 'hide';
            $Step3 = 'show';
            $step2Dot = 'whiteDot';
            $step3Dot = 'blackDot';
        break;
    }
    
    if(!empty($_GET["action"])) {
        switch($_GET["action"]) {
            case "add":
                if(!empty($_POST["quantity"])) {                 
                    $productByCode = $productList->getProduct("SELECT * FROM product_table WHERE strCode='" . $_GET["code"] . "'");
                    
                    $itemArray = array($productByCode["strCode"]=>array('img'=>$productByCode["strProductImg"], 'name'=>$productByCode["strProductName"], 'code'=>$productByCode["strCode"], 'inStock'=>$productByCode["nProductQty"], 'quantity'=>$_POST['quantity'], 'price'=>$productByCode["nProductPrice"]));

                    if(!empty($_SESSION["cart_item"])) {
                        if(in_array($productByCode["strCode"],array_keys($_SESSION["cart_item"]))) {
                            foreach($_SESSION["cart_item"] as $k => $v) {
                                    if($productByCode["strCode"] == $k) {
                                        if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                            $_SESSION["cart_item"][$k]["quantity"] = 0;
                                        }
                                        $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                    }
                            }
                        } else {
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                        }
                    } else {
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
            break;
            case "remove":
                if(!empty($_SESSION["cart_item"])) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($_GET["code"] == $k)
                                unset($_SESSION["cart_item"][$k]);				
                            if(empty($_SESSION["cart_item"]))
                                unset($_SESSION["cart_item"]);
                    }
                }
            break;
            case "empty":
                unset($_SESSION["cart_item"]);
            break;	
        }
        }
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
                                <i class="fas fa-circle whiteDot"></i>
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
                                <i class="fas fa-circle <?=$step2Dot?>"></i>
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
                                <i class="fas fa-circle <?=$step3Dot?>"></i>
                                <!-- <i class="fa-inverse fas fa-check" data-fa-transform="shrink-6"></i> -->
                            </span>
                        </div>
                    </div>
                </article>
                
            
            <!-- Step 2 : Choose your flavours -->
                <div class="col-sm-12 col-md-5 steps <?=$Step2?>">
                    <h3>2. Choose your flavours</h3>
                    <p>choose 3 flavours of your choice<br>
                    <small>*A box can be formed by minimum 3 jam bottles </small></p>
                    <a id="btnEmpty" href="shop2.php?step=2&action=empty">Empty Cart</a>
                    <?php $noOfBoxes = $_COOKIE['boxQty'];
                    for ($i=0; $i < $noOfBoxes ; $i++) { ?>
<!-- Box with the choice of jam flavours added to cart -->
                    <div class="cart-box">
                        <img src="assets/defaultProduct.jpg" alt="box img" class="box-img">
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
                                <a href="shop2.php?step=2&action=remove&code=<?=$item["code"]?>"><i class="far fa-trash-alt"></i></a>
                                <img src="assets/defaultProduct.jpg" alt="cart product" class="cart-product">
                                <p><?=$item["name"]?></p>
                                <p>Qty: <?=$item["quantity"]?></p>
                                <p><?="$".$item["price"]?></p>
                            </div>
                        <?php $totalQty += $item["quantity"]; } ?>
                        </div>
                        <?php } ?>
                    </div>
                    <?php 
                        if (!empty($_SESSION["cart_item"])){
                            $items = $totalQty;
                        }
                        else {
                            $items = 0;
                        }
                    }?>
                    <p><small id="error-msg">*Dear customer, 1 box can be made by 3 jam jars only! Please select atleast 3 items or in multiple of 3.</small></p>
                    <a class="btn" href="step1.php">back</a>
                    <!-- <a class="btn btn-primary" href="shop2.php?step=3&items=" >next step</a>                     -->
                    <a class="btn btn-primary" onclick="checkCondition('<?=$items?>')">next step</a>
                </div>
                <!-- List of all products -->
                <div class="col-sm-12 col-md-5 <?=$Step2?>"> 
                    <article class="row">
                        <!-- Cheeck if products are not 0/empty -->
                        <?php if (!empty($arrAllProduct)) {
                        // <!-- Loop Through All Products -->
                        foreach ($arrAllProduct as $key=>$value) { ?>
                        <div class="col-sm-12 col-md-4 shop-product">
                            <form method="post" action="shop2.php?step=2&action=add&code=<?=$arrAllProduct[$key]["strCode"]?>" id="addToCart">
                                <input type="hidden" name="box-qty" value="<?=$_COOKIE['boxQty']?>" />
                                <div>
                                    <img src="assets/<?=$arrAllProduct[$key]["strProductImg"] ?>" class="product-img" alt="products">
                                </div>
                                <div>
                                    <h3 data-toggle="modal" data-target="#detailmodal<?=$arrAllProduct[$key]["id"]?>"><?=$arrAllProduct[$key]["strProductName"] ?></h3>
                                    <p><?=$arrAllProduct[$key]['strProductDescription']?></p>
                                </div>
                                <div><?="$".$arrAllProduct[$key]["nProductPrice"] ?></div>
                                <div>
                                    <label>qty</label>
                                    <input type="number" name="quantity" min="1" max="<?=$arrAllProduct[$key]['nProductQty']?>"/>
                                    <button class="btn btn-primary add" type="submit" >Add to Box</button>
                                </div>
                            </form>
                        </div>
                        <?php } }?>
                    </article>
                </div>

            <!-- Step 3 : Confirm your box -->
                <?php foreach ($arrPageContent as $shop) { ?>
                <!-- Order Summary -->
                <div class="col-sm-12 col-md-6 steps <?=$Step3?>">
                    <h3>3. Confirm your box</h3>
                    <?php if(isset($_SESSION["cart_item"])) {
                        $orderTotal = 0;
                    } ?>
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
                           $itemTotal = ($item["price"]*$item["quantity"]);
                        // var_dump($itemTotal);
                        ?>
                        <tr>
                            <td><?=$item["name"]?></td>
                            <td><?=$item["price"]?></td>
                            <td><?=$item["quantity"]?></td>
                            <td><?=$itemTotal?></td>
                        </tr>
                        <?php
                        $orderTotal += $itemTotal;
                        }
                        ?>
                        <tr>
                            <td colspan="3" style="text-align:right">Total:</td>
                            <td><?=$orderTotal?></td>
                        </tr>
                        </tbody>
                    </table>
                    <div>
                        <p>Note: Preview review and proceed to checkout your order</p>
                    </div>
                    <a class="btn" href="shop2.php?step=2">back</a>
                    <a class="btn btn-primary" href="checkout.php">Checkout</a>
                </div>
                <?php } ?>
                <!-- Complete order -->
                <div class="col-sm-12 col-md-4 <?=$Step3?>">
                    <article class="row">
                        <!-- Loop Through All Products -->
                        <div class="cart-box">
                            <img src="assets/defaultProduct.jpg" alt="box img" class="box-img">
                            <div class="row">
                            <?php foreach ($_SESSION["cart_item"] as $item){ ?>
                                <div class="product-placeholder col-sm-2 col-md-2">
                                    <img src="assets/<?=$item["img"]?>" class="preview-img" alt="product preview image">
                                    <p><?=$item["name"]?></p>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
        </main>
    <?php
// <!-- Footer -->
include("partials/footer.php"); ?>