
        <!-- Modal -->
        <div class="modal fade" id="cart-modal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">shopping cart</h3>
					   		<button type="button" class="close" data-dismiss="modal">&#x292B;</button>          		
					</div>
					<div class="modal-body">
						<div class="container-fluid">
                        <?php foreach ($arrPageContent as $shop) { ?>
                            <!-- Order Summary -->
                            <div class="col-sm-12 col-md-12">
                                <?php if(isset($_SESSION["cart_item"])) {
                                    $orderTotal = 0;
                                } ?>
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
                                    <?php
                                    $orderTotal += $itemTotal;
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="4" style="text-align:right">Total:</td>
                                        <td><?=$orderTotal?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>
						</div>
					</div>
					<div class="modal-footer">                       
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" data-target="checkout.php">Checkout</button> 
					</div>
				</div>
			</div>
		</div>
    <!-- Open Footer -->
    <footer class="main-footer row">
            <div class="col-sm-4 col-md-6">
              <!-- Open Email Form -->
                <p class="newsletter">
                    Join our mailing list to receive exclusive offers <br />and be the first to hear about new products!
                </p>
                <form action="#" method="post">
                    <input type="email" name="email" class="newsletter-input" placeholder="email@example.com" required/>
                    <input type="submit" class="btn btn-primary" value="SIGN UP">
                </form>
              <!-- Close Email Form -->
            </div>
            <!-- Copyright Footer -->
            <div class="sub-footer">
                <p>&#xA9; <?php echo date("Y"); ?> East Van Jam</p>
            </div>
            <!-- Close Copyright -->
    </footer>
    <!-- Close Footer -->



    <!-- Script Links -->
    <script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- <script src="js/jquery.js"></script> -->

    </body>
</html>
