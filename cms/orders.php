<?php
    include("../partials/session-start.php");
    include("../partials/cmsheader.php");
    require_once("../classes/DBController.php");
    require_once("../classes/cms.php");
    $CMSControl = new CMS();
    $arrOrders = $CMSControl->getResults("SELECT *, if(bOrderStatus = 0,'In-Progress', 'Full-Filled') as strStatus, order_table.id as orderNum FROM order_table LEFT JOIN customer_table ON order_table.nCustomerId = customer_table.id ORDER BY order_table.dOrderDate DESC");


    if(isset($_GET["find"])){
      $arrOrders = $CMSControl->getResults("SELECT *, if(bOrderStatus = 0,'In-Progress', 'Full-Filled') as strStatus, order_table.id as orderNum FROM order_table LEFT JOIN customer_table ON order_table.nCustomerId = customer_table.id WHERE order_table.id = ".$_GET['find']." ");
    }


?>
<!-- Open Container -->
<main class="container-fluid">
  <!-- Heading -->
	<h1 class="cms-head">Orders</h1>
    <!-- Info Para -->
    <p class="descipt">
      List of all of your orders. Here you can view order details or delete an order by clicking on the icon.<br />You can also find an order by number or email by clicking on the search icon.<br />
      <!-- Find Order -->
      <button class="btn btn-success add-gal" data-toggle="modal" data-target="#modalfindorder"><i class="fa fa-search fa-lg"></i>  Find Order</button>
      <!-- See All Orders -->
      <a class="btn add-gal" href="orders.php" >  View All Orders</a>
    </p>
      <?php
      //If no record found
       if(isset($_GET["error"])){
         echo "<h5 class='error'>Error: No Order Found</h5>";
       }
       ?>
    <!-- Open Table -->
    <table class="pages gallery-table">
        <!-- Headings -->
        <tr>
            <th>Order #</th><th>Name</th><th>Email</th><th>Date Placed</th><th>Total Price</th><th>Status</th>
        </tr>

        <!-- Loop through orders -->
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

    <!-- Modal View Order -->
    <?php foreach ($arrOrders as $order) {
      //Get city and province info
      $arrCity = $CMSControl->getResults("SELECT customer_table.id, cityTable.strName AS strCity, stateTable.strName as strProv FROM customer_table
                                          LEFT JOIN cityTable ON customer_table.strCustCity = cityTable.id
                                          LEFT JOIN stateTable ON customer_table.strCustProvince = stateTable.id WHERE customer_table.id = ".$order['id']."");
      ?>
        <div class="modal fade" id="modaledit<?=$order['orderNum']?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">
                            Order #<?=$order["orderNum"]?>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">
                               <span aria-hidden="true">&times;</span>
                               <span class="sr-only">Close</span>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Open Form -->
                              <!-- Name -->
                              <div class="form-group">
                                <h4>Customer:</h4>
                                <h5><?=$order["strCustName"]?></h5>
                                <p><?=$order["strCustEmail"]?><br/><?=$order["strCustAddress"]?><br/><?=$arrCity[0]["strCity"]?><br/><?=$arrCity[0]["strProv"]?> <?=$order["strCustZip"]?><br/><?=$order["nCustContactNo"]?></p>
                                <hr />
                                <h4>Order:</h4>
                                <?php $arrOrderDetails = $CMSControl->getResults("SELECT * FROM order_item_table LEFT JOIN order_table ON order_item_table.nOrderId = order_table.id LEFT JOIN product_table ON order_item_table.nProductId = product_table.id WHERE order_table.id = '".$order['orderNum']."'");  ?>
                                <!-- Open Table -->
                                <table class="pages modal-table">
                                    <!-- Headings -->
                                    <tr>
                                        <th>Product</th><th></th><th>Qty</th><th>Price</th>
                                    </tr>
                                    <!-- Loop through detail -->
                                    <?php foreach ($arrOrderDetails as $orders){?>
                                    <tr>
                                        <!-- Customer Name -->
                                        <td class="modal-textRow"><?=$orders["strProductName"]?></td>
                                        <!-- Order Num -->
                                        <td class="table-img"><img src="../assets/<?=$orders["strProductImg"]?>"/></td>
                                        <!-- Customer Email -->
                                        <td class="modal-textRow"><?=$orders["nProdQty"]?></td>
                                        <!-- Total -->
                                        <td class="modal-textRow">$<?=$orders["nProductPrice"]?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    <!-- Close Loop -->
                                </table>
                                <!-- Close Table -->
                                <hr />
                                <h5 class="total">Total: $<?=$orders["nOrderAmount"]?></h5>
                              </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }?>
        <!-- Close Modal Edit -->


        <!-- Modal Find Order -->
        <div class="modal fade" id="modalfindorder" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Search</h4>
                        <button type="button" class="close" data-dismiss="modal">
                               <span aria-hidden="true">&times;</span>
                               <span class="sr-only">Close</span>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Open Form -->
                        <form action="actions/findorder.php" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                              <!-- Search -->
                              <label>Enter the order number or email:</label>
                              <input type="text" class="form-control" name="strFind"/>
                          </div>
                          <!-- submit -->
                          <input type="submit" class="btn btn-success" value="Search">

                        </form>
                        <!-- Close Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Close Modal Find Order -->

</main>
<!-- Close Container -->
<?php include("../partials/cmsfooter.php"); ?>
