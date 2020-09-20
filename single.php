<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>CardPlay | Hydrangea</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() { 
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			if (window.scrollY == 0) window.scrollTo(0,1);
		};
	</script>
	<!-- //custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/shop.css" type="text/css" media="screen" property="" />
	<link href="css/style7.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<!-- Owl-carousel-CSS -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<!-- banner -->
	<div class="banner_top innerpage" id="home">
		<div class="wrapper_top_w3layouts">
			<div class="header_agileits">
				<div class="logo inner_page_log">
					<?php
                    include "includes/dbh.php";

                    $query = "SELECT * FROM settings";

                    $queryfire = mysqli_query($conn, $query) or die("Query Failed.");
                    if(mysqli_num_rows($queryfire) > 0){
                      while($row = mysqli_fetch_assoc($queryfire)) {
                    ?>
					<a class="navbar-brand" href="index.php"><img src="images/<?php echo $row['logo'];?>" width="150"></a>
					<?php
                            }
                        }
                    ?>
				</div>
				<div class="overlay overlay-contentpush">
					<button type="button" class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></button>

					<nav>
			            <?php 

			              if (isset($_SESSION['userId'])) {
			               echo '<ul>
			                      <li><a href="index.php">Home</a></li>
			                      <li><a href="dashboard.php">Dashboard</a></li>
			                      <li><a href="about.php">About</a></li>
			                      <li><a href="contact.php">Contact</a></li>
			                      <li><form action="includes/logout.php" method="post">
			                          <button type="submit" name="logout-submit">Logout</button>
			                          </form>
			                      </li>
			                    </ul>';
			              }
			              else {
			                echo '<ul>
			                        <li><a href="index.php">Home</a></li>
			                        <li><a href="login.php">Login</a></li>
			                        <li><a href="about.php">About</a></li>
			                        <li><a href="contact.php">Contact</a></li>
			                      </ul>';
			              }
			            ?>
						
					</nav>
				</div>
				<div class="mobile-nav-button">
					<button id="trigger-overlay" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
				</div>
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="cardcart cardcart2 cart cart box_1">
						<form action="cart.php" method="post" class="last">
							<button class="top_card_cart" type="submit" name="open-cart"><i class="fa fa-cart-arrow-down" aria-hidden="true"> <span id="cart-item" class="badge badge-danger"></span></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- //cart details -->
		<!-- search -->
		<div class="search_w3ls_agileinfo">
			<div class="cd-main-header">
				<ul class="cd-header-buttons">
					<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
				</ul>
			</div>
			<div id="cd-search" class="cd-search">
				<form action="#" method="post">
					<input name="Search" type="search" placeholder="Click enter after typing...">
				</form>
			</div>
		</div>
		<!-- //search -->
		<div class="clearfix"></div>
		<!-- /banner_inner -->
		<div class="services-breadcrumb_w3ls_agileinfo">
			<?php
                    include "includes/dbh.php";
                    $post_id = $_GET['id'];
                    $query = "SELECT * FROM products LEFT JOIN product_categories ON products.category = product_categories.category_id WHERE products.product_id = {$post_id}";

                    $queryfire = mysqli_query($conn, $query) or die("Query Failed.");
                    if(mysqli_num_rows($queryfire) > 0){
                      while($row = mysqli_fetch_assoc($queryfire)) {
                    ?>
			<div class="inner_breadcrumb_agileits_w3">
				<ul class="short">
					<li><a href="index.php">Home</a><i>|</i></li>
					<li><a href="category.php?cid=<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?> Cards</a><i>|</i></li>
					<li><?php echo $row['product_name'];?></li>
				</ul>
			</div>
			<?php
                            }
                        }
                    ?>
		</div>
		<!-- //banner_inner -->
	</div>

	<!-- //banner -->
	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div id="message"></div>
			<?php
                include "includes/dbh.php";

                $post_id = $_GET['id'];

               	$sql = "SELECT products.product_id, products.product_name, products.product_template, products.product_template_clear, products.price, products.discount, products.size, products.description, product_categories.category_name, products.category FROM products LEFT JOIN product_categories ON products.category = product_categories.category_id WHERE products.product_id = {$post_id}";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {
            ?>
			<div>
				<div class="col-md-4 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">

							<ul class="slides">
								<li data-thumb="admin/product_images/sample/<?php echo $row['product_template'];?>">
									<div class="thumb-image"> <img src="admin/product_images/sample/<?php echo $row['product_template'];?>" data-imagezoom="true" class="img-responsive"> </div>
								</li>
								<li data-thumb="admin/product_images/clear/<?php echo $row['product_template_clear'];?>">
									<div class="thumb-image"> <img src="admin/product_images/clear/<?php echo $row['product_template_clear'];?>" data-imagezoom="true" class="img-responsive"> </div>
								</li>
								
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="col-md-8 single-right-left simpleCart_shelfItem">
					<h3><?php echo $row['product_name']; ?></h3>
					<p><span class="item_price"> &#8377; <?php echo $row['price']; ?></span>
						<del> &#8377; <?php echo $row['discount']; ?></del>
					</p>
					<div class="rating1">
						<ul class="stars">
							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<div class="description">
						<h5>Check delivery, payment options and charges at your location</h5>
						<form action="#" method="post">
							<input type="text" value="Enter pincode" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter pincode';}"
							    required="">
							<input type="submit" value="Check">
						</form>
					</div>
					
					<div class="occasion-cart">
						<div class="shoe single-item single_page_b">
							<form action="" class="form-submit">
								<input type="hidden" class="pid" value="<?= $row['product_id'] ?>">
								<input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
								<input type="hidden" class="pprice" value="<?= $row['price'] ?>">
								<input type="hidden" class="pimage" value="<?= $row['product_template'] ?>">
								<input type="hidden" class="pcode" value="<?= $row['product_id'] ?>">
								<input type="submit" value="Add to cart" class="button add addItemBtn">
								<!-- <button class="card-cart pcard-cart button addItemBtn"></button> -->
							</form>
						</div>
					</div>

					<ul class="social-nav model-3d-0 footer-social social single_page" style="padding-top: 12px">
						<li class="share">Share On : </li>
						<li>
							<a href="#" class="facebook">
								<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
								<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
							</a>
						</li>
						<li>
							<a href="#" class="twitter">
								<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
								<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
							</a>
						</li>
						<li>
							<a href="#" class="instagram">
								<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
								<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
							</a>
						</li>
						<li>
							<a href="#" class="linkedin">
								<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
								<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
							</a>
						</li>
					</ul>

				</div>
				<div class="clearfix"> </div>
				<!--/tabs-->
				<div class="responsive_tabs">
					<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Description</li>
							<li>Information</li>
						</ul>
						<div class="resp-tabs-container">
							<!--/tab_one-->
							<div class="tab1">

								<div class="single_page">
									<h6><?php echo $row['size']; ?></h6>
									<p></p>
									<p class="para"><?php echo $row['description']; ?></p>
								</div>
							</div>
							<!--//tab_one-->
							
							<div class="tab2">

								<div class="single_page">
									<h6><?php echo $row['product_name']; ?></h6>
									<p><?php echo $row['description']; ?></p>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
                 }
                }else{
                echo "<h2>No Record Found.</h2>";
                }

            ?>
			<!--//tabs-->
			<!-- /new_arrivals -->
			<div>
				<div class="new_arrivals">
					<h3>Featured Products</h3>
					<!-- /featured -->
					<?php
                        include "includes/dbh.php";

                        $sql1 = "SELECT  products.category, products.product_id, products.product_name, products.product_template, products.product_template_clear, products.price, products.discount, products.description, product_categories.category_id FROM products LEFT JOIN product_categories ON products.category = product_categories.category_id ORDER BY rand() DESC LIMIT 0,4";

                        $result = mysqli_query($conn, $sql1) or die("Query Failed products");
                        if(mysqli_num_rows($result) > 0){
                          while($row1 = mysqli_fetch_assoc($result)) {
                    ?>
                    <div>
					<div class="col-md-3 product-men">
						<div class="product-shoe-info shoe">
							<div class="men-pro-item">
								<div class="men-thumb-item">
									<img src="admin/product_images/sample/<?php echo $row1['product_template'];?>" alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href='single.php?id=<?php echo $row1['product_id'];?>&&cid=<?php echo $row1['category_id'];?>' class="link-product-add-cart">Quick View</a>
										</div>
									</div>
									<span class="product-new-top">New</span>
								</div>
								<div class="item-info-product">
									<h4>
										<a href='single.php?id=<?php echo $row1['product_id'];?>&&cid=<?php echo $row1['category_id'];?>'><?php echo $row1['product_name'];?></a>
									</h4>
									<div class="info-product-price">
										<div class="grid_meta">
											<div class="product_price">
												<div class="grid-price ">
													<span class="money "> &#8377; <?php echo $row1['price']; ?></span>
												</div>
											</div>
											<ul class="stars">
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
											</ul>
										</div>
										<div class="card single-item hvr-outline-out">
											<form action="" class="form-submit">
												<input type="hidden" class="pid" value="<?= $row1['product_id'] ?>">
												<input type="hidden" class="pname" value="<?= $row1['product_name'] ?>">
												<input type="hidden" class="pprice" value="<?= $row1['price'] ?>">
												<input type="hidden" class="pimage" value="<?= $row1['product_template'] ?>">
												<input type="hidden" class="pcode" value="<?= $row1['product_id'] ?>">
												<button class="card-cart pcard-cart addItemBtn"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
											</form>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
					<?php
							}
						}
					?>
					<!--  featured -->
					<div class="clearfix"></div>
				</div>
			</div>
			<!--//new_arrivals-->


		</div>
	</div>
	
	
	<!-- footer and newsletter -->
	<?php include 'footer.php'; ?>
	<!-- footer and newsletter -->


    <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		shoe.render();

		shoe.cart.on('shoe_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<!-- /nav -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/demo1.js"></script>
	<!-- //nav -->
	<!-- single -->
	<script src="js/imagezoom.js"></script>
	<!-- single -->
	<!-- script for responsive tabs -->
	<script src="js/easy-responsive-tabs.js"></script>
	<script>
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
			$('#verticalTab').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true
			});
		});
	</script>
	<!-- FlexSlider -->
	<script src="js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->

	<!--search-bar-->
	<script src="js/search.js"></script>
	<!--//search-bar-->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smoth-scrolling -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$(".addItemBtn").click(function(e){
				e.preventDefault();
				var $form = $(this).closest(".form-submit");
				var pid = $form.find(".pid").val();
				var pname = $form.find(".pname").val();
				var pprice = $form.find(".pprice").val();
				var pimage = $form.find(".pimage").val();
				var pcode = $form.find(".pcode").val();

				$.ajax({
					url: 'includes/action.php',
					method: 'post',
					data: {pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
					success:function(response){
						$("#message").html(response);
						window.scrollTo(0,0);
						load_cart_item_number();
					}
				});
			});

			load_cart_item_number();

			function load_cart_item_number(){
				$.ajax({
					url: 'includes/action.php',
					method: 'get',
					data: {cartItem:"cart_item"},
					success: function(response){
						$("#cart-item").html(response);
					}
				})
			}
		});
	</script>


</body>

</html>