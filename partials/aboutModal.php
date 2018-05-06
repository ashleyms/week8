<?php 
    if (!empty($arrAllProduct)) {
        foreach ($arrAllProduct as $key=>$value) { ?>
        <!-- Modal -->
        <div class="modal fade" id="detailmodal<?=$arrAllProduct[$key]["id"]?>" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class = "col-md-5">
                                    <img src="assets/<?=$arrAllProduct[$key]["strProductImg"]?>" alt="">
                                </div>
                                <div class = "col-md-7">
                                    <h2><?=$arrAllProduct[$key]["strProductName"]?></h2>
                                    <p><?=$arrAllProduct[$key]["strProductDescription"]?></p>
                                    <p>Price: $<?=$arrAllProduct[$key]["nProductPrice"]?></p>
                                </div>
                                <div class = "col-md-8">
                                    <h2>Ingredients</h2>
                                    <p><?=$arrAllProduct[$key]["strProductDescription"]?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">                       
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a type="button" class="btn btn-primary" href="step1.php">continue shopping</a> 
                    </div>
				</div>
			</div>
		</div>
    <?php } } ?>