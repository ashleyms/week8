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

    $arrExtraContent = $CMSControl->getResults("SELECT extra_element_table.strExtraElement
    FROM `pages_table`
    LEFT JOIN extra_element_table
    ON pages_table.id = extra_element_table.nPageId
    WHERE pages_table.id = '".$_GET['page']."'
    ORDER BY extra_element_table.id ASC");
?>
<!-- Open Container -->
<main class="container-fluid">
  <!-- Heading -->
  <?php foreach ($arrContent as $content) { ?>
	<h1 class="cms-head"><?=$content['strName']?></h1>
  <?php
    //HOME PAGE
    if($_GET['page'] == 1){ ?>
      <!-- Open Form -->
      <form action="actions/edit.php?id=<?=$_GET['page']?>&page=content" class="content-form" method="POST" enctype="multipart/form-data">
            <!-- Name -->
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="strName" value="<?=$page["strName"]?>"/>
            </div>

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

  <?php
    }
  ?>



</main>
<!-- Close Container -->
<?php include("partials/cmsfooter.php"); ?>
