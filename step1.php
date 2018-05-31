<?php
    session_start();
    include("partials/header.php");
    if(!empty($_GET['session'])){
        unset($_SESSION["cart_item"]);
    }
?>
        <!-- Shop Main Section -->
        <main class="container">
            <!-- Side Navbar for steps directio -->
            <section class="row">
                <article class="col-sm-2 col-md-2 horizontal">
                    <div id="step1-icon">
                        <div class="step-div opacityH">
                            <img src="assets/box-icon.jpg" alt="step 1" class="step-icon">
                            <p>step 1</p>
                        </div>
                        <div></div>
                        <div class="fa-lg">
                            <span class="fa-layers fa-fw">
                                <i class="fas fa-circle blackDot"></i>
                                <!-- <i class="fa-inverse fas fa-check" data-fa-transform="shrink-6"></i> -->
                            </span>
                        </div>
                    </div>
                    <div id="step2-icon">
                        <div class="step-div opacityL">
                            <img src="assets/jar.jpg" alt="step 2" class="step-icon">
                            <p>step 2</p>
                        </div>
                        <div></div>
                        <div class="fa-lg">
                            <span class="fa-layers fa-fw">
                                <i class="fas fa-circle whiteDot"></i>
                                <!-- <i class="fa-inverse fas fa-check" data-fa-transform="shrink-6"></i> -->
                            </span>
                        </div>
                    </div>
                    <div id="step3-icon">
                        <div class="step-div opacityL">
                            <img src="assets/checkout.jpg" alt="step 3" class="step-icon">
                            <p>step 3</p>
                        </div>
                        <div class="fa-lg">
                            <span class="fa-layers fa-fw">
                                <i class="fas fa-circle whiteDot"></i>
                                <!-- <i class="fa-inverse fas fa-check" data-fa-transform="shrink-6"></i> -->
                            </span>
                        </div>
                    </div>
                </article>
                
            <!-- Step 1 : Build A box -->
                <!-- Step details and choose qty option -->
                <?php foreach ($arrPageContent as $shop) { ?>
                <div class="col-sm-10 col-md-4">
                    <h3>1. <?=$shop['strSubHeading']?></h3>
                    <p><?=$shop['strText']?></p>
                    <!-- form to send qty of boxes selected by user -->
                    <!-- on submit sending form data to js function  -->
                    <form method="post" action="javascript:saveBoxQty();">
                        <label>qty</label>
                        <input type="number" id="box-qty" min="1" max="10" value="1"/><br>
                        <small>*A box can be formed by minimum 3 jam bottles </small></p>
                        <button class="btn btn-main add" type="submit">next step</button>
                    </form>                    
                </div>
                <!-- Box Image -->
                <div class="col-sm-10 col-md-6">
                    <img class="product-img" src="assets/<?=$shop['strImage']?>" alt="products"/>
                </div>
                <?php } ?>
            </section>
        </main>
    <?php
// <!-- Footer -->
include("partials/footer.php"); ?>