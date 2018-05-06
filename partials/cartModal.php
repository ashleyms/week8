
        <!-- Modal -->
        <div class="modal fade" id="cart-modal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">shopping cart</h3>
					   		<button type="button" class="close" data-dismiss="modal">&#x292B;</button>          		
					</div>
                    <div>
                    <?php if(isset($_SESSION["cart_item"])) {
                        $orderTotal = 0; ?>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Preview</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php		
                                    foreach ($_SESSION["cart_item"] as $item){
                                    $itemTotal = ($item["price"]*$item["quantity"]);
                                    // var_dump($itemTotal);
                                    ?>
                                    <tr>
                                        <td><img src="assets/<?=$item["img"]?>" class="preview-img" alt="preview of product"></td>
                                        <td><?=$item["name"]?></td>
                                        <td><?=$item["price"]?></td>
                                        <td><?=$item["quantity"]?></td>
                                        <td><?=$itemTotal?></td>
                                    </tr>
                                    <?php $orderTotal += $itemTotal; }?>
                                    <tr>
                                        <td colspan="4" style="text-align:right">Total:</td>
                                        <td><?=$orderTotal?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">                       
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a type="button" class="btn btn-primary" href="checkout.php">Checkout</a> 
                        </div>
                        <?php } else { ?>   
                        <div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <p>No itms in cart!</p>
                                </div>
                            </div>
                            <div class="modal-footer">                       
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a type="button" class="btn btn-primary" href="step1.php">continue shopping</a> 
                            </div>
                        </div>
                        <?php } ?>
                    </div>
				</div>
			</div>
		</div>

        <div>
        