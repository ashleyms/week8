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
            <td class="textRow"><?=$prod["nProductPrice"]?></td>
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
    <?php foreach ($arrPages as $page) {?>
    <div class="modal fade" id="modaldelete<?=$page['id']?>" tabindex="-1" role="dialog"
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
                        Are you sure you want to delete "<?=$page['strName']?>"?
                    </p>
                    <!-- Open Form -->
                    <form action="actions/delete.php?pg=pages" method="POST" enctype="multipart/form-data">
                          <!-- id -->
                          <input type="hidden" class="form-control" name="nID" value="<?=$page["id"]?>"/>
                          <!-- table -->
                          <input type="hidden" class="form-control" name="strTable" value="pages_table"/>
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
        <div class="modal fade" id="modalnewtest" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">
                            New Testimonial
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Open Form -->
                        <form action="../actions/new_record.php?page=product" method="POST" enctype="multipart/form-data">
                                <!-- Name -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="strName"/>
                                </div>
                                <!--Description -->
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea type="text" class="form-control" name="strDesc"></textarea>
                                </div>
                                <!-- Rating -->
                                <div class="form-group">
                                    <label>Rating (1-5)</label>
                                     <input type="number" class="form-control" name="nRating" value="<?=$prod["nRating"]?>"/>
                                </div>

                                <!-- Upload Image -->
                                <div class="form-group">
                                    <label>Select Image</label><br />
                                    <input type="file"  name="strImage"/>
                                </div>

                                <!--About -->
                                <div class="form-group">
                                    <label>About</label>
                                    <textarea type="text" class="form-control" name="strAbout"></textarea>
                                </div>

                                <!--Directions -->
                                <div class="form-group">
                                    <label>Directions</label>
                                    <textarea type="text" class="form-control" name="strDirections"></textarea>
                                </div>
                              <!-- Submit -->
                              <input type="submit" class="btn btn-primary" value="Save">
                          </form>
                          <!-- Close Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Close Modal New Testimonial -->

</main>
<!-- Close Container -->
<?php include("partials/cmsfooter.php"); ?>
