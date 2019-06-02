<div class="col-sm-9 padding-right">
        <div class="features_items">
            <!--features_items-->
            <h2 class="title text-center">Our Items</h2>
            <?php
							require 'shared/classproduct.php';
							$conn=new product;
							$result=$conn->selectAll();
							if($result->num_rows>0){
								while($row=$result->fetch_assoc()){
									echo '<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/product1.jpg" alt="" />
													<p>'.$row["product_name"].'</p>
													<button href="#" onclick="addToKart('.$row["product_id"].')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
												<div class="product-overlay">
													<div class="overlay-content">
														<p>'.$row["product_name"].'</p>
														<button href="#" onclick="addToKart('.$row["product_id"].')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
													</div>
												</div>
										</div>
									</div>
								</div>';
								}
							}
							else{
								echo '<div class="col-sm-4">Not Available Any Products</div>';
							}
						?>
        </div>
    </div>