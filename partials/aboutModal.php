<?php 
    if (!empty($arrAllProduct)) {
        foreach ($arrAllProduct as $key=>$value) { ?>
    <!-- About product Modal window -->
    <div class="modal fade" id="detailmodal<?=$arrAllProduct[$key]["id"]?>" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <!-- Modal body-->
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="assets/<?=$arrAllProduct[$key]["strProductImg"]?>" alt="product">
                            </div>
                            <div class="col-md-7">
                                <h1><?=$arrAllProduct[$key]["strProductName"]?></h1>
                                <p><?=$arrAllProduct[$key]["strProductIntro"]?></p>
                                <p><?=$arrAllProduct[$key]["strProductDescription"]?></p>
                                <p class="price">Price: $<?=$arrAllProduct[$key]["nProductPrice"]?></p>
                            </div>
                            <div class="col-md-8">
                                <h2>Ingredients</h2>
                                <p class="ingredients"><?=$arrAllProduct[$key]["strIngredients"]?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn add " data-dismiss="modal">Close</button>
                    <a class="btn btn-main" href="step1.php?id=Shop">shop now</a>
                </div>
            </div>
        </div>
    </div>
<?php } } ?>