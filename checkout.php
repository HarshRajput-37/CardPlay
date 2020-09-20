<?php
	session_start();

	require 'includes/dbh.php';

	$grand_total = 0;
	$allItems = '';
	$items = array();

	$sql = "SELECT CONCAT(product_name,'(',qty,')')AS ItemQty, total_price FROM cart";
	$stmt = $conn->prepare($sql);
	$stmt ->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
		$grand_total +=$row['total_price'];
		$items[] = $row['ItemQty'];
	}
	$allItems = implode(",", $items);
	
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>CardPlay | Checkout </title>
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
					<li>Checkout</li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>

	<!-- //banner -->
	
	<div class="container">
		<div class="row justify-content-center" style="text-align: center;">
			<div class="px-4 pb-4" id="order">
				<h4 class="text-center text-info p-2" style="margin-top: 25px; margin-bottom: 25px;">Complete your order !</h4>
				<div class="jumbotron p-3 mb-2 text-center">
					<h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
					<h6 class="lead"><b>Delivery charge : </b> Free</h6>
					<h5><b>Total Amount Payable : </b><?= number_format($grand_total,2);?>/-</h5>
				</div>
				<form action="" method="post" id="placeOrder">
					<input type="hidden" name="products" value="<?= $allItems;?>">
					<input type="hidden" name="grand_total" value="<?= $grand_total;?>">
					<input type="hidden" name="userid" value="<?php echo $_SESSION["userId"]; ?>">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Enter your name" required="">
					</div>
					<div class="form-group">
						<input type="text" name="mail" class="form-control" placeholder="Enter your email" required="">
					</div>
					<<!-- div class="form-group">
						<input type="text" name="email" class="form-control" placeholder="Enter your email" required="">
					</div> -->
					<div class="form-group">
						<input type="number" name="phone" class="form-control" placeholder="Enter your phone number" required="">
					</div>
					<div class="form-group">
						<textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter delivery address..."></textarea>
					</div>
					<h6 class="text-center lead">Select Payment Mode</h6>
					<div class="form-group">
						<select name="pmode" class="form-control">
							<option value="" selected disabled="">-Select Payment Mode-</option>
							<option value="Cash on Dilevery">Cash on Dilevery </option>
							<option value="Netbanking">Net Banking</option>
							<option value="Cards">Debit/Credit Card</option>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
					</div>
				</form>
			</div>
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

			$("#placeOrder").submit(function(e){
				e.preventDefault();

			$.ajax({
				url: 'includes/action.php',
				method: 'post',
				data: $('form').serialize()+"&action=order",
				success: function(response){
					$("#order").html(response);
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