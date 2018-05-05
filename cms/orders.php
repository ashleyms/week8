<?php
    include("partials/session-start.php");
    include("partials/cmsheader.php");
    require_once("../classes/DBController.php");
    require_once("../classes/cms.php");
    $CMSControl = new CMS();
    $arrOrders = $CMSControl->getResults("SELECT *, if(bOrderStatus = 0,'In-Progress', 'Full-Filled') as strStatus, order_table.id as orderNum FROM order_table LEFT JOIN customer_table ON order_table.nCustomerId = customer_table.id ORDER BY order_table.dOrderDate DESC");
?>
<!-- Open Container -->
<main class="container-fluid">
  <!-- Heading -->
	<h1 class="cms-head">Orders</h1>
    <!-- Info Para -->
    <p class="descipt">
      List of pages on your site. Here you can add, edit and delete pages by clicking on the icons.<br />Please note, deletion cannot be undone.<br />
    </p>

    <!-- Open Table -->
    <table class="pages gallery-table">
        <!-- Headings -->
        <tr>
            <th>Order #</th><th>Name</th><th>Email</th><th>Date Placed</th><th>Total Price</th><th>Status</th>
        </tr>
        <!-- Loop through Products -->
        <?php if($arrOrders){
            foreach ($arrOrders as $orders){?>
        <tr>
            <!-- Order Num -->
            <td class="textRow"><?=$orders["orderNum"]?></td>
            <!-- Customer Name -->
            <td class="textRow"><?=$orders["strCustName"]?></td>
            <!-- Customer Email -->
            <td class="textRow"><?=$orders["strCustEmail"]?></td>
            <!-- Date -->
            <td class="textRow"><?=$orders["dOrderDate"]?></td>
            <!-- Total -->
            <td class="textRow">$<?=$orders["nOrderAmount"]?></td>
            <!-- Status -->
            <td class="textRow">
              <select class="status" data-order="<?=$orders["orderNum"]?>">
                <option><?=$orders["strStatus"]?></option>
                <option><?php
                  if($orders["strStatus"] === "In-Progress"){
                    echo "Full-Filled";
                  }
                  else{
                    echo "In-Progress";
                  } ?>
                </option>
              </select>
            </td>
            <!-- Edit Button -->
            <td>
                <button class="btn btn-sm" data-toggle="modal" data-target="#modaledit<?=$orders['orderNum']?>">
                    View Details
                </button>
            </td>
            <!-- Delete Button -->
            <td>
                <button class="btn btn-lg" data-toggle="modal" data-target="#modaldelete<?=$orders["orderNum"]?>">
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
    <?php foreach ($arrOrders as $order) {?>
    <div class="modal fade" id="modaldelete<?=$order['orderNum']?>" tabindex="-1" role="dialog"
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
                        Are you sure you want to delete order #<?=$order['orderNum']?>?
                    </p>
                    <!-- Open Form -->
                    <form action="actions/delete.php?pg=orders" method="POST" enctype="multipart/form-data">
                          <!-- id -->
                          <input type="hidden" class="form-control" name="nID" value="<?=$order["orderNum"]?>"/>
                          <!-- table -->
                          <input type="hidden" class="form-control" name="strTable" value="order_table"/>
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
