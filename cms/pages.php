<?php
    include("partials/session-start.php");
    include("partials/cmsheader.php");
    require_once("../classes/DBController.php");
    require_once("../classes/cms.php");
    $CMSControl = new CMS();
    $arrPages = $CMSControl->getResults("SELECT *, pages_table.id as nPageID
    FROM `pages_table`
    LEFT JOIN template_table
    ON pages_table.nTemplateID = template_table.id");
?>
<!-- Open Container -->
<main class="container-fluid">
  <!-- Heading -->
	<h1 class="cms-head">Pages</h1>
    <!-- Info Para -->
    <p class="descipt">List of pages on your site. Here you can add, edit and delete pages by clicking on the icons.<br />Please note, deletion cannot be undone.<br />
      <i class=" fa fa-pencil-square-o fa-lg"></i>Quick Edit <br/>
      <i class=" fa fa-file-text fa-lg"></i> Edit All Detailed Content <br/>
       <!-- Add Page -->
        <button class="btn btn-success add-gal" data-toggle="modal" data-target="#modalnewpage"><i class="fa fa-plus fa-lg"></i>  New Page</button>
    </p>

    <!-- Open Table -->
    <table class="pages gallery-table">
        <!-- Headings -->
        <tr>
            <th>Name</th>
        </tr>
        <!-- Loop through Products -->
        <?php if($arrPages){
            foreach ($arrPages as $page){?>
        <tr>
            <!-- Display Name -->
            <td class="textRow"><?=$page["strName"]?></td>
            <!-- Edit Button -->
            <td>
                <button class="btn btn-lg" data-toggle="modal" data-target="#modaledit<?=$page["nPageID"]?>">
                    <i class=" fa fa-pencil-square-o fa-lg"></i>
                </button>
            </td>
            <!-- Edit Button -->
            <td>
                <a class="btn btn-lg" href="content.php?page=<?=$page["nPageID"]?>&temp=<?=$page["nTemplateID"]?>">
                    <i class=" fa fa-file-text fa-lg"></i>
                </a>
            </td>
            <!-- Delete Button -->
            <td>
                <button class="btn btn-lg" data-toggle="modal" data-target="#modaldelete<?=$page["nPageID"]?>">
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
    <div class="modal fade" id="modaldelete<?=$page['nPageID']?>" tabindex="-1" role="dialog"
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
                          <input type="hidden" class="form-control" name="nID" value="<?=$page["nPageID"]?>"/>
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
    <?php foreach ($arrPages as $page) {?>
        <div class="modal fade" id="modaledit<?=$page["nPageID"]?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">
                            Edit: <?=$page["strName"]?>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">
                               <span aria-hidden="true">&times;</span>
                               <span class="sr-only">Close</span>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Open Form -->
                        <form action="actions/edit.php?id=<?=$page["nPageID"]?>&page=pages" method="POST" enctype="multipart/form-data">
                              <!-- Name -->
                              <div class="form-group">
                                  <label>Name</label>
                                  <input type="text" class="form-control" name="strName" value="<?=$page["strName"]?>"/>
                              </div>
                              <?php
                              $arrPageContent = $CMSControl->getResults("SELECT *
                              FROM `pages_table`
                              LEFT JOIN content_table
                              ON pages_table.id = content_table.nPageId
                              WHERE pages_table.id = '" . $page["nPageID"]. "'");

                              foreach ($arrPageContent as $content) {

                              ?>
                              <!--Heading -->
                              <div class="form-group">
                                  <label>Heading</label>
                                  <input type="text" class="form-control" name="strHeading" value="<?=$content["strHeading"]?>"/>
                              </div>
                              <!-- Banner Image -->
                              <div class="form-group">
                                  <label>Change Banner</label><br />
                                  <img class="thumb-banner" src="../assets/<?=$content["strHeroImage"]?>"/>
                                  <input type="file" name="strHeroImage"/>
                              </div>
                              <?php
                              }?>

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


        <!-- Modal New Page -->
        <div class="modal fade" id="modalnewpage" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">
                            New Page
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Open Form -->
                        <form action="actions/add.php?page=pages" method="POST" enctype="multipart/form-data">
                                <!-- Name -->
                                <div class="form-group">
                                    <label>Page Name</label>
                                    <input type="text" class="form-control" name="strName"/>
                                </div>
                                <!--Heading -->
                                <div class="form-group">
                                    <label>Page Heading</label>
                                    <input type="text" class="form-control" name="strHeading"/>
                                </div>
                                <!-- Upload Banner -->
                                <div class="form-group">
                                    <label>Select Banner Image</label><br />
                                    <input type="file" name="strHeroImage"/>
                                </div>
                                <!--Template -->
                                <div class="form-group">
                                    <label>Select Template</label><br/>
                                    <select name="nTemplateID">
                                      <option value="1">2 Column Grid</option>
                                      <option value="2">Media Box Template</option>
                                    </select>
                                </div>
                              <!-- Submit -->
                              <input type="submit" class="btn btn-primary" value="Save">
                          </form>
                          <!-- Close Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Close Modal New Page -->

</main>
<!-- Close Container -->
<?php include("partials/cmsfooter.php"); ?>
