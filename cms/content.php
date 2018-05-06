<?php
    include("partials/session-start.php");
    include("partials/cmsheader.php");
    require_once("../classes/DBController.php");
    require_once("../classes/cms.php");
    $CMSControl = new CMS();
    $arrContent = $CMSControl->getResults("SELECT *
    FROM `pages_table`
    LEFT JOIN content_table
    ON pages_table.id = content_table.nPageId
    WHERE pages_table.id = '" . $_GET['page']. "'");
?>
<!-- Open Container -->
<main class="container-fluid">
  <!-- Heading -->
  <?php foreach ($arrContent as $content) { ?>
	<h1 class="cms-head"><?=$content['strName']?></h1>
  <?php
    //HOME PAGE, ABOUT, SHOP
    if($_GET['page'] == 1 || $_GET['page'] == 2 || $_GET['page'] == 5){ ?>
      <!-- Open Form -->
      <form action="actions/edit.php?id=<?=$_GET['page']?>&page=content" class="content-form" method="POST" enctype="multipart/form-data">
            <!-- Sub Heading -->
            <div class="form-group">
                <label>Subheading</label>
                <input type="text" class="form-control" name="strSubHeading" value="<?=$content["strSubHeading"]?>"/>
            </div>

            <!-- Text -->
            <div class="form-group">
                <label>Body Text</label>
                <textarea type="text" class="form-control text-lg" name="strText"><?=$content["strText"]?></textarea>
            </div>
            <!-- Image -->
            <div class="form-group">
                <label>Image</label><br />
                <img class="thumb-img" src="../assets/<?=$content["strImage"]?>"/><br/>
                <input type="file" name="strImage"/>
            </div>
            <!-- Submit -->
            <a href="pages.php" class="btn btn-danger btn-bottom"> Cancel</a>
            <input type="submit" class="btn btn-primary btn-bottom" value="Save Changes">

      </form>
      <!-- Close Form -->
    <?php
      }

      //CONTACT
      if($_GET['page'] == 6){ ?>
        <!-- Open Form -->
        <form action="actions/edit.php?id=<?=$_GET['page']?>&page=content" class="content-form" method="POST" enctype="multipart/form-data">
              <!-- Text -->
              <div class="form-group">
                  <label>Body Text</label>
                  <textarea type="text" class="form-control" name="strText"><?=$content["strText"]?></textarea>
              </div>

              <!-- Submit -->
              <a href="pages.php" class="btn btn-danger btn-bottom"> Cancel</a>
              <input type="submit" class="btn btn-primary btn-bottom" value="Save Changes">
          </form>
          <!-- Close Form -->
        <?php
          }
        }

        //Template 2 -MEDIA
        if($_GET['temp'] == 2){
          //Data from Extra content Table
          $arrExtraContent = $CMSControl->getResults("SELECT extra_element_table.strExtraElement, extra_element_table.id
          FROM `pages_table`
          LEFT JOIN extra_element_table
          ON pages_table.id = extra_element_table.nPageId
          WHERE pages_table.id = '".$_GET['page']."'
          ORDER BY extra_element_table.id ASC");

          ?>
          <!-- Add Link -->
           <button class="btn btn-success add-link" data-toggle="modal" data-target="#modalnewlink"><i class="fa fa-plus fa-lg"></i>  New Link</button>
          <!-- Open Table -->
          <table class="pages gallery-table">
              <!-- Headings -->
              <tr>
                  <th>Title</th><th>Link</th>
              </tr>
              <!-- Loop through links -->
              <?php
                  foreach ($arrExtraContent as $extra) {
                  $data = explode("|", $extra['strExtraElement']); ?>
              <tr>
                  <!-- Display Title -->
                  <td class="textRow"><?=$data[1]?></td>
                  <!-- Display Link -->
                  <td class="textRow"><?=$data[2]?></td>
                  <!-- Delete Button -->
                  <td>
                      <button class="btn btn-lg" data-toggle="modal" data-target="#modaldelete<?=$extra["id"]?>">
                           <i class=" fa fa-trash fa-lg size"></i>
                      </button>
                  </td>
              </tr>
              <?php
                  }
              ?>
              <!-- Close Loop -->
          </table>
          <!-- Close Table -->
          <?php
          }

          //Template 1 - 2 column
          if($_GET['temp'] == 1){
            //Data from Extra content Table
            $arrExtraContent = $CMSControl->getResults("SELECT extra_element_table.strExtraElement, extra_element_table.id
            FROM `pages_table`
            LEFT JOIN extra_element_table
            ON pages_table.id = extra_element_table.nPageId
            WHERE pages_table.id = '".$_GET['page']."'
            ORDER BY extra_element_table.id ASC");

            ?>
            <!-- Add Link -->
             <button class="btn btn-success add-link" data-toggle="modal" data-target="#modalnewcolumn"><i class="fa fa-plus fa-lg"></i>  New</button>
            <!-- Open Table -->
            <table class="pages gallery-table">
                <!-- Headings -->
                <tr>
                    <th>Title</th><th>Text</th>
                </tr>
                <!-- Loop through links -->
                <?php
                    foreach ($arrExtraContent as $extra) {
                    $data = explode("|", $extra['strExtraElement']); ?>
                <tr>
                    <!-- Display Title -->
                    <td class="textRow"><?=$data[0]?></td>
                    <!-- Display Link -->
                    <td class="textRow"><?=$data[2]?></td>
                    <!-- Delete Button -->
                    <td>
                        <button class="btn btn-lg" data-toggle="modal" data-target="#modaldelete<?=$extra["id"]?>">
                             <i class=" fa fa-trash fa-lg size"></i>
                        </button>
                    </td>
                </tr>
                <?php
                    }
                ?>
                <!-- Close Loop -->
            </table>
            <!-- Close Table -->
            <?php
            }?>

          <!-- ************ MODAL WINDOWS ************ -->

          <!-- Modal Delete -->
          <?php foreach ($arrExtraContent as $page) {
          $data = explode("|", $page['strExtraElement']); ?>

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
                              Are you sure you want to delete "<?=$data[1]?>"?
                          </p>
                          <!-- Open Form -->
                          <form action="actions/delete.php?pg=pages" method="POST" enctype="multipart/form-data">
                                <!-- id -->
                                <input type="hidden" class="form-control" name="nID" value="<?=$page['id']?>"/>
                                <!-- table -->
                                <input type="hidden" class="form-control" name="strTable" value="extra_element_table"/>
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

          <!-- Modal New Link -->
          <div class="modal fade" id="modalnewlink" tabindex="-1" role="dialog"
                   aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">
                              New Link
                          </h4>
                          <button type="button" class="close" data-dismiss="modal">
                              <span aria-hidden="true">&times;</span>
                              <span class="sr-only">Close</span>
                          </button>
                      </div>

                      <!-- Modal Body -->
                      <div class="modal-body">
                          <!-- Open Form -->
                          <form action="actions/add.php?page=link" method="POST" enctype="multipart/form-data">
                                  <!-- Title -->
                                  <div class="form-group">
                                      <label>Title</label>
                                      <input type="text" class="form-control" name="strTitle"/>
                                  </div>
                                  <!--Link -->
                                  <div class="form-group">
                                      <label>Link</label>
                                      <input type="text" class="form-control" name="strLink"/>
                                  </div>
                                  <!-- Image -->
                                  <div class="form-group">
                                      <label>Select Image</label><br />
                                      <input type="file" name="strImage"/>
                                  </div>
                                  <input type="hidden" class="form-control" name="nPageId" value="<?=$_GET['page']?>"/>
                                <!-- Submit -->
                                <input type="submit" class="btn btn-primary" value="Add">
                            </form>
                            <!-- Close Form -->
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Close Modal New Link -->

              <!-- Modal New Column -->
              <div class="modal fade" id="modalnewcolumn" tabindex="-1" role="dialog"
                       aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <!-- Modal Header -->
                          <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel">
                                  New
                              </h4>
                              <button type="button" class="close" data-dismiss="modal">
                                  <span aria-hidden="true">&times;</span>
                                  <span class="sr-only">Close</span>
                              </button>
                          </div>

                          <!-- Modal Body -->
                          <div class="modal-body">
                              <!-- Open Form -->
                              <form action="actions/add.php?page=column" method="POST" enctype="multipart/form-data">
                                      <!-- Title -->
                                      <div class="form-group">
                                          <label>Title</label>
                                          <input type="text" class="form-control" name="strTitle"/>
                                      </div>
                                      <!-- Text -->
                                      <div class="form-group">
                                          <label>Text</label>
                                          <textarea type="text" class="form-control" name="strText"></textarea>
                                      </div>
                                      <!-- Image -->
                                      <div class="form-group">
                                          <label>Select Image</label><br />
                                          <input type="file" name="strImage"/>
                                      </div>
                                      <input type="hidden" class="form-control" name="nPageId" value="<?=$_GET['page']?>"/>
                                    <!-- Submit -->
                                    <input type="submit" class="btn btn-primary" value="Add">
                                </form>
                                <!-- Close Form -->
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Close Modal New Column -->

</main>
<!-- Close Container -->
<?php include("partials/cmsfooter.php"); ?>
