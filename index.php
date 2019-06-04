<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Riya Foods</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<?php
		require './shared/individual_components/header_component.php';
	?>

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>Riya</span> Foods</h1>
									<h2>Food Store</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<!-- <button type="button" class="btn btn-default get">Get it now</button> -->
								</div>
								<div class="col-sm-6">
									<img src="images/home/food1.jpg" class="girl img-responsive" alt="" />
									<!-- <img src="images/home/pricing.png"  class="pricing" alt="" /> -->
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Riya</span> Foods</h1>
									<h2>100% Responsive </h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<!-- <button type="button" class="btn btn-default get">Get it now</button> -->
								</div>
								<div class="col-sm-6">
									<img src="images/home/food2.jpg" class="girl img-responsive" alt="" />
									<!-- <img src="images/home/pricing.png"  class="pricing" alt="" /> -->
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Riya</span> Foods</h1>
									<h2>24*7 Available</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<!-- <button type="button" class="btn btn-default get">Get it now</button> -->
								</div>
								<div class="col-sm-6">
									<img src="images/home/food3.jpg" class="girl img-responsive" alt="" />
									<!-- <img src="images/home/pricing.png" class="pricing" alt="" /> -->
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Food Category</h2>
						<?php
							require 'shared/classcategory.php';
							$conn=new category;
							$result=$conn->selectAll();
							if($result->num_rows>=1){
								while($row=$result->fetch_assoc()){
									echo '<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="products.php?cat_id='.$row["cat_id"].'">'.$row["cat_name"].'</a></h4>
									</div>
								</div>';
								}
							}
							else{
								echo '<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Category Not Available</a></h4>
								</div>
							</div>';
							}
						?>
						
						</div>		
					</div>
				<!-- </div> -->
<!-- 
	Individual Product
				<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/product1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
													</div>
												</div>
										</div>
										<div class="choose">
											<ul class="nav nav-pills nav-justified">
												<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
												<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
											</ul>
										</div>
									</div>
								</div> -->
				
			</div>
		</div>
	</section>
	<?php
		require './shared/individual_components/footer_component.php';
	?>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>