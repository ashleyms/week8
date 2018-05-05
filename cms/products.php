<?php
    include("partials/session-start.php");
    include("partials/cmsheader.php");
    require_once("../classes/DBController.php");
    require_once("../classes/cms.php");
    $CMSControl = new CMS();
    $arrProd = $CMSControl->getResults("SELECT *, if(bFeatured = 0,'Yes', 'No') as strRecommend FROM `product_table`");
?>
<!-- Open Container -->
<main class="container-fluid">
  <!-- Heading -->
	<h1 class="cms-head">Products</h1>
    <!-- Info Para -->
    <p class="descipt">List of pages on your site. Here you can add, edit and delete pages by clicking on the icons.<br />Please note, deletion cannot be undone.<br />
        <!-- Add Product -->
        <button class="btn btn-success add-gal" data-toggle="modal" data-target="#modalnewpage"><i class="fa fa-plus fa-lg"></i>  New Product</button>
    </p>

    <!-- Open Table -->
    <table class="pages gallery-table">
        <!-- Headings -->
        <tr>
            <th>Name</th><th>Image</th><th>Price</th><th>Qty</th><th>Description</th><th>Featured</th>
        </tr>
        <!-- Loop through Products -->
        <?php if($arrProd){
            foreach ($arrProd as $prod){?>
        <tr>
            <!-- Display Name -->
            <td class="textRow"><?=$prod["strProductName"]?></td>
            <!-- Display Image -->
            <td class="table-img"><img src="../assets/<?=$prod["strProductImg"]?>"/></td>
            <!-- Display Price -->
            <td class="textRow">$<?=$prod["nProductPrice"]?></td>
            <!-- Display QTY -->
            <td class="textRow"><?=$prod["nProductQty"]?></td>
            <!-- Display Description -->
            <td class="textRow"><?=$prod["strProductDescription"]?></td>
            <!-- Display Star Rating -->
            <td class="textRow"><?=$prod["strRecommend"]?></td>
            <!-- Edit Button -->
            <td>
                <button class="btn btn-lg" data-toggle="modal" data-target="#modaledit<?=$prod['id']?>">
                    <i class=" fa fa-pencil-square-o fa-lg"></i>
                </button>
            </td>
            <!-- Delete Button -->
            <td>
                <button class="btn btn-lg" data-toggle="modal" data-target="#modaldelete<?=$prod["id"]?>">
                     <i class=" fa fa-trash fa-lg size"></i>
                </button>
            </td>
        </tr>
        <?php
            }
        }?>
        <!-- Close Loop -->
    </table>
    <!-- Close Table -->

    <!-- ************ MODAL WINDOWS ************ -->

    <!-- Modal Delete -->
    <?php foreach ($arrProd as $prod) {?>
    <div class="modal fade" id="modaldelete<?=$prod['id']?>" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Confirm</h4>
                    <button type="button" class="close" data-dismiss="modal">
                           <span aria-hidden="true">&times;</span>
                           <span class="sr-only">Close</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p>
                        Are you sure you want to delete "<?=$prod['strProductName']?>"?
                    </p>
                    <!-- Open Form -->
                    <form action="actions/delete.php?pg=products" method="POST" enctype="multipart/form-data">
                          <!-- id -->
                          <input type="hidden" class="form-control" name="nID" value="<?=$prod["id"]?>"/>
                          <!-- table -->
                          <input type="hidden" class="form-control" name="strTable" value="product_table"/>
                          <!-- submit -->
                          <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                    <!-- Close Form -->
                </div>
            </div>
        </div>
    </div>
    <?php
    }?>
    <!-- Close Modal Delete -->

    <!-- Modal Edit -->
    <?php foreach ($arrProd as $prod) {?>
        <div class="modal fade" id="modaledit<?=$prod['id']?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">
                            Edit: <?=$prod["strName"]?>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">
                               <span aria-hidden="true">&times;</span>
                               <span class="sr-only">Close</span>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Open Form -->
                        <form action="../actions/save_record.php?id=<?=$prod["id"]?>&page=product" method="POST" enctype="multipart/form-data">
                              <!-- Name -->
                              <div class="form-group">
                                  <label>Name</label>
                                  <input type="text" class="form-control" name="strName" value="<?=$prod["strName"]?>"/>
                              </div>
                              <!--Description -->
                              <div class="form-group">
                                  <label>Description</label>
                                  <textarea type="text" class="form-control" name="strDesc"><?=$prod["strDesc"]?></textarea>
                              </div>
                              <!-- Rating -->
                              <div class="form-group">
                                  <label>Rating (1-5)</label>
                                   <input type="number" class="form-control" name="nRating" value="<?=$prod["nRating"]?>"/>
                              </div>

                              <!-- Upload Image -->
                              <div class="form-group">
                                  <label>Select Image</label><br />
                                  <img class="thumb-prod" src="../assets/<?=$prod["strImage"]?>"/>
                                  <input type="file"  name="strImage"/>
                              </div>

                              <!--About -->
                              <div class="form-group">
                                  <label>About</label>
                                  <textarea type="text" class="form-control txtarea" name="strAbout"><?=$prod["strAbout"]?></textarea>
                              </div>

                              <!--Directions -->
                              <div class="form-group">
                                  <label>Directions</label>
                                  <textarea type="text" class="form-control txtarea" name="strDirections"><?=$prod["strDirections"]?></textarea>
                              </div>

                              <!-- Submit -->
                              <input type="submit" class="btn btn-primary" value="Save">
                        </form>
                        <!-- Close Form -->
                    </div>
                </div>
            </div>
        </div>
        <?php
        }?>
        <!-- Close Modal Edit -->


        <!-- Modal New Product -->
        <div class="modal fade" id="modalnewpage" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">
                            New Product
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Open Form -->
                        <form action="actions/add.php?page=product" method="POST" enctype="multipart/form-data">
                                <!-- Name -->
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" name="strProductName"/>
                                </div>

                                <div class="row">
                                  <!-- Code -->
                                  <div class="form-group col-md-6">
                                      <label>Product Code</label>
                                      <input type="text" class="form-control" name="strCode"/>
                                  </div>
                                  <!-- Price -->
                                  <div class="form-group col-md-3">
                                      <label>Price</label>
                                      <input type="number" class="form-control" name="nProductPrice"/>
                                  </div>
                                  <!-- Qty -->
                                  <div class="form-group col-md-3">
                                      <label>Quanity</label>
                                      <input type="number" class="form-control" name="nProductQty"/>
                                  </div>
                                </div>

                                <!--Description -->
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea type="text" class="form-control" name="strProductDescription"></textarea>
                                </div>
                                <!-- Featured -->
                                <div class="form-group">
                                    <label>Feature Product On Home Page?</label><br/>
                                     <select name="bFeatured">
                                       <option value="1">No</option>
                                       <option value="0">Yes</option>
                                   </select>
                                </div>

                                <!-- Upload Image -->
                                <div class="form-group">
                                    <label>Upload Product Image</label><br />
                                    <input type="file"  name="strProductImg"/>
                                </div>
                              <!-- Submit -->
                              <input type="submit" class="btn btn-primary" value="Add">
                          </form>
                          <!-- Close Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Close Modal New Product -->

</main>
<!-- Close Container -->
<?php include("partials/cmsfooter.php"); ?>
