<?php
    include("../functions/myfunctions.php");
    include("partials/session-start.php");
    include("partials/cmsheader.php");
    $arrTest = getResults("SELECT * FROM `testimonials` ORDER BY dateSubmit DESC");
?>
<!-- Open Container -->
<main class="container-fluid">
    <!-- Heading -->
	<h1 class="cms-head">Testimonials</h1>
    <!-- Info Para -->
    <p class="descipt">List of Testimonials on your site. Here you can add, edit and delete testimonials by clicking on the icons.<br />Please note, deletion cannot be undone.<br />
        <!-- Add Testimonial -->
        <button class="btn btn-success add-gal" data-toggle="modal" data-target="#modalnewtest"><i class="fa fa-plus fa-lg"></i>  Add Testimonial</button>
    </p>

    <!-- Open Table -->
    <table class="pages gallery-table">
        <!-- Headings -->
        <tr>
            <th>Name</th><th>Title</th><th>Image</th><th>Testimonial</th><th>Star Rating</th><th>Submitted</th>
        </tr>
        <!-- Loop through Testimonials -->
        <?php if($arrTest){
            foreach ($arrTest as $test){?>
        <tr>
            <!-- Display Name -->
            <td class="textRow"><?=$test["strName"]?></td>
            <!-- Display Title -->
            <td class="textRow"><?=$test["strTitle"]?></td>
            <!-- Display Image -->
            <td class="table-img"><img src="../assets/<?=$test["strImage"]?>"/></td>
            <!-- Display Paragraph -->
            <td class="textRow"><?=$test["strReview"]?></td>
            <!-- Display Rating -->
            <td class="textRow"><?=$test["nRating"]?></td>
            <!-- Display Date -->
            <td class="textRow"><?=$test["dateSubmit"]?></td>
            <!-- Edit Button -->
            <td>
                <button class="btn btn-lg" data-toggle="modal" data-target="#modaledit<?=$test['id']?>">
                    <i class=" fa fa-pencil-square-o fa-lg"></i>
                </button>
            </td>
            <!-- Delete Button -->
            <td>
                <button class="btn btn-lg" data-toggle="modal" data-target="#modaldelete<?=$test["id"]?>">
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
    <?php foreach ($arrTest as $test) {?>
    <div class="modal fade" id="modaldelete<?=$test['id']?>" tabindex="-1" role="dialog"
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
                        Are you sure you want to delete "<?=$test['strName']?>"?
                    </p>
                    <a href='../actions/delete_record.php?id=<?=$test['id']?>&page=test'>
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
    <?php foreach ($arrTest as $test) {?>
        <div class="modal fade" id="modaledit<?=$test['id']?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">
                            Edit: <?=$test["strName"]?>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">
                               <span aria-hidden="true">&times;</span>
                               <span class="sr-only">Close</span>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Open Form -->
                        <form action="../actions/save_record.php?id=<?=$test["id"]?>&page=test" method="POST" enctype="multipart/form-data">
                            <!-- Name -->
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="strName" value="<?=$test["strName"]?>"/>
                             </div>
                             <!-- Title -->
                             <div class="form-group">
                                 <label>Title</label>
                                 <input type="text" class="form-control" name="strTitle" value="<?=$test["strTitle"]?>"/>
                              </div>

                             <!-- Testimonial -->
                             <div class="form-group">
                                 <label>Testimonial</label>
                                 <textarea type="text" class="form-control txtarea" name="strReview"><?=$test["strReview"]?></textarea>
                              </div>

                              <!-- Upload Image -->
                              <div class="form-group">
                                  <label>Select Image</label><br />
                                  <img class="thumb" src="../assets/<?=$test["strImage"]?>"/>
                                  <input type="file"  name="strImage"/>
                              </div>

                              <!-- Rating -->
                              <div class="form-group">
                                  <label>Rating (1-5)</label>
                                   <input type="number" class="form-control" name="nRating" value="<?=$test["nRating"]?>"/>
                              </div>

                              <!-- Date -->
                              <div class="form-group">
                                  <label>Date Submitted (YYYY-MM-DD)</label>
                                  <input type="text" class="form-control" name="dateSubmit" value="<?=$test["dateSubmit"]?>"/>
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


        <!-- Modal New Testimonial -->
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
                        <form action="../actions/new_record.php?page=test" method="POST" enctype="multipart/form-data">
                            <!-- Name -->
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="strName"/>
                             </div>
                             <!-- Title -->
                             <div class="form-group">
                                 <label>Title</label>
                                 <input type="text" class="form-control" name="strTitle"/>
                              </div>

                             <!-- Testimonial -->
                             <div class="form-group">
                                 <label>Testimonial</label>
                                 <textarea type="text" class="form-control" name="strReview"></textarea>
                              </div>

                              <!-- Upload Image -->
                              <div class="form-group">
                                  <label>Select Image</label><br />
                                  <input type="file"  name="strImage"/>
                              </div>

                              <!-- Rating -->
                              <div class="form-group">
                                  <label>Rating (1-5)</label>
                                   <input type="number" class="form-control" name="nRating"/>
                              </div>

                              <!-- Date -->
                              <div class="form-group">
                                  <label>Date Submitted (YYYY-MM-DD)</label>
                                  <input type="text" class="form-control" name="dateSubmit"/>
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
