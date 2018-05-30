  <!-- Featured Products -->
  <?php foreach ($arrFeaturedProduct as $product) { ?>
  <div class="col-sm-12 col-md-4 product">
      <img class="product-img" src="assets/<?=$product['strProductImg']?>" alt="products"/>
      <h3><?=$product['strProductName']?></h3>
      <p><?=$product['strProductIntro']?></p>
      <button class="btn add add-margin" type="button" data-toggle="modal" data-target="#detailmodal<?=$product['id']?>">More Details</button>
  </div>
  <?php
  }
  ?>

  <!-- Product Modal -->
  <?php
      foreach ($arrFeaturedProduct as $product) { ?>   
    <!-- About product Modal window -->
    <div class="modal fade" id="detailmodal<?=$product["id"]?>" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <!-- Modal body-->
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="assets/<?=$product["strProductImg"]?>" alt="product">
                            </div>
                            <div class="col-md-7">
                                <h1><?=$product["strProductName"]?></h1>
                                <p><?=$product["strProductIntro"]?></p>
                                <p><?=$product["strProductDescription"]?></p>
                                <p class="price">Price: $<?=$product["nProductPrice"]?></p>
                            </div>
                            <div class="col-md-8">
                                <h2>Ingredients</h2>
                                <p class="ingredients"><?=$product["strIngredients"]?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn add" data-dismiss="modal">Close</button>
                    <a type="button" class="btn btn-main" href="step1.php?id=Shop">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
      <?php } ?>
