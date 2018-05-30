    <!-- Shopping cart Modal window -->
    <div class="modal fade" id="cart-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <!-- modal header -->
                <div class="modal-header">
                    <h3 class="modal-title">shopping cart</h3>
                    <button type="button" class="close" data-dismiss="modal">&#x292B;</button>
                </div>
                <div>
                    <!-- modal body if session contains items then -->
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
                                        <th scope="col" colspan="2">Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        foreach ($_SESSION["cart_item"] as $item){
                                        $itemTotal = ($item["price"]*$item["quantity"]);
                                        ?>
                                        <tr>
                                            <td><img src="assets/<?=$item["img"]?>" class="preview-img" alt="preview of product"></td>
                                            <td>
                                                <?=$item["name"]?>
                                            </td>
                                            <td>
                                                <?=$item["price"]?>
                                            </td>
                                            <td>
                                                <?=$item["quantity"]?>
                                            </td>
                                            <td>
                                                <?=$itemTotal?>
                                            </td>
                                            <td><a href="shop2.php?step=2&action=remove&code=<?=$item["code"]?>"><i class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        <?php $orderTotal += $itemTotal; }?>
                                        <tr>
                                            <td colspan="4">Total:</td>
                                            <td>
                                                <?=$orderTotal?>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn add add-margin" data-dismiss="modal">Close</button>
                        <a type="button" class="btn btn-main add-margin" href="checkout.php">Checkout</a>
                    </div>
                    <!-- modal body if no items exists in shopping cart -->
                    <?php } else { ?>
                    <div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <p>No itms in cart!</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn add" data-dismiss="modal">Close</button>
                            <a class="btn btn secondary-btn add-margin" href="step1.php?id=Shop">shop now</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
