<?php
    include("../functions/myfunctions.php");
    include("partials/session-start.php");
    include("partials/cmsheader.php");
    $arrProd = getResults("SELECT * FROM `products`");
?>
<!-- Open Container -->
<main class="container-fluid">
    <!-- Heading -->
	<h1 class="cms-head">Products</h1>
    <!-- Info Para -->
    <p class="descipt">List of products on your site. Here you can add, edit and delete products by clicking on the icons.<br />Please note, deletion cannot be undone.<br />
        <!-- Add Product -->
        <button class="btn btn-success add-gal" data-toggle="modal" data-target="#modalnewtest"><i class="fa fa-plus fa-lg"></i>  New Product</button>
    </p>

    <!-- Open Table -->
    <table class="pages gallery-table">
        <!-- Headings -->
        <tr>
            <th>Name</th><th>Image</th><th>Description</th><th>Star Rating</th>
        </tr>
        <!-- Loop through Products -->
        <?php if($arrProd){
            foreach ($arrProd as $prod){?>
        <tr>
            <!-- Display Name -->
            <td class="textRow"><?=$prod["strName"]?></td>
            <!-- Display Image -->
            <td class=" table-img"><img src="../assets/<?=$prod["strImage"]?>"/></td>
            <!-- Display Description -->
            <td class="textRow"><?=$prod["strDesc"]?></td>
            <!-- Display Star Rating -->
            <td class="textRow"><?=$prod["nRating"]?></td>
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
                        Are you sure you want to delete "<?=$prod['strName']?>"?
                    </p>
                    <a href='../actions/delete_record.php?id=<?=$prod['id']?>&page=product'>
                        <button class="btn btn-danger btn-md" data-toggle="modal" data-target="#modaldelete">
                            Delete
                        </button>
                    </a>
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
