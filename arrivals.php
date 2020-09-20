<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>CardPlay | New Arrivals </title>
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
			            	include "includes/dbh.php";
			              	
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
			<div class="inner_breadcrumb_agileits_w3">

				<ul class="short">
					<li><a href="index.php">Home</a><i>|</i></li>
					<li>New Arrivals</li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>

	<!-- //banner -->
	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<!-- tittle heading -->

			<!-- //tittle heading -->
			<!-- product left -->
 		<?php include 'includes/sidemenu.php'; ?>
			<!-- //product left -->
			<div class="left-ads-display col-md-9">
				<div class="wrapper_top_shop">
					<div id="message"></div>
					<!-- product-sec1 -->
					<div class="product-sec1">

					<?php
                        include "includes/dbh.php";

                        /* Calculate Offset Code */
                        $limit = 6;
                        if(isset($_GET['page'])){
                          $page = $_GET['page'];
                        }else{
                          $page = 1;
                        }
                        $offset = ($page - 1) * $limit;

                        $sql = "SELECT  products.category, products.product_id, products.product_name, products.product_template, products.product_template_clear, products.price, products.discount, products.description, product_categories.category_id FROM products LEFT JOIN product_categories ON products.category = product_categories.category_id ORDER BY products.product_id DESC LIMIT {$offset},{$limit}";

                        $result = mysqli_query($conn, $sql) or die("Query Failed products");
                        if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_assoc($result)) {
                      ?>
						<!--/products-->
						<div class="col-md-4 product-men">
							<div class="product-card-info card">
								<div class="men-pro-item">
									<div class="men-thumb-item">
										<img src="admin/product_images/sample/<?php echo $row['product_template'];?>" alt="">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href='single.php?id=<?php echo $row['product_id']; ?>' class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
									</div>
									<div class="item-info-product">
										<h4>
											<a href='single.php?id=<?php echo $row['product_id']; ?>'><?php echo $row['product_name'];?></a>
										</h4>
										<div class="info-product-price">
											<div class="grid_meta">
												<div class="product_price">
													<div class="grid-price ">
														<span class="money "> &#8377; <?php echo $row['price'];?></span>
													</div>
												</div>
												<ul class="stars">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="card single-item hvr-outline-out">
												<form action="" class="form-submit">
													<input type="hidden" class="pid" value="<?= $row['product_id'] ?>">
													<input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
													<input type="hidden" class="pprice" value="<?= $row['price'] ?>">
													<input type="hidden" class="pimage" value="<?= $row['product_template'] ?>">
													<input type="hidden" class="pcode" value="<?= $row['product_id'] ?>">
													<button class="card-cart pcard-cart addItemBtn"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
												</form>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<?php
                          }
                        }else{
                          echo "<h2>No Record Found.</h2>";
                        }
						
						// show pagination
                        $sql1 = "SELECT * FROM products";
                        $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                        if(mysqli_num_rows($result1) > 0){

                          $total_records = mysqli_num_rows($result1);

                          $total_page = ceil($total_records / $limit);

                          echo '<ul class="pagination admin-pagination">';
                          if($page > 1){
                            echo '<li><a href="arrivals.php?page='.($page - 1).'">Prev</a></li>';
                          }
                          for($i = 1; $i <= $total_page; $i++){
                            if($i == $page){
                              $active = "active";
                            }else{
                              $active = "";
                            }
                            echo '<li class="'.$active.'"><a href="arrivals.php?page='.$i.'">'.$i.'</a></li>';
                          }
                          if($total_page > $page){
                            echo '<li><a href="arrivals.php?page='.($page + 1).'">Next</a></li>';
                          }

                          echo '</ul>';
                        }
                        ?>
						
						<!-- //products -->
						<div class="clearfix"></div>

					</div>
				</div>
			</div>

					
			<!-- product right -->
			
	</div>
</div>
	
	<!-- footer and newsletter -->
	<?php include 'footer.php'; ?>
	<!-- footer and newsletter -->
	
    <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- /nav -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/demo1.js"></script>
	<!-- //nav -->
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		card.render();

		card.cart.on('card_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<!--search-bar-->
	<script src="js/search.js"></script>
	<!--//search-bar-->
	<script src="js/responsiveslides.min.js"></script>
	
	<!-- js for portfolio lightbox -->
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