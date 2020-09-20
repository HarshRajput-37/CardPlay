<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>CardPlay | Cart</title>
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
	<link rel="stylesheet" href="css/about.css" type="text/css" media="screen" property="" />
	<link rel="stylesheet" href="css/shop.css" type="text/css" media="screen" property="" />
	<link href="css/style7.css" rel="stylesheet" type="text/css" media="all" />
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
			                      <li><a href="about.php" class="active">About</a></li>
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
			                        <li><a href="about.php" class="active">About</a></li>
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
					<li>cart</li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>

	<!-- //banner -->
	

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div style="display: <?php if (isset($_SESSION['showAlert'])){
												echo $_SESSION['showAlert'];
												}
											else { 
												echo 'none'; 
												}
												unset($_SESSION['showAlert']); 
										?>" class="alert alert-success alert-dismissible mt-3">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong><?php if (isset($_SESSION['message'])){
												echo $_SESSION['message'];
												}unset($_SESSION['message']); ?></strong>
				</div>
				<div class="table-responsive" style="margin-top: 40px;">
					<table class="table table-bordered table-striped text-center">
						<thead>
							<tr>
								<td colspan="7">
									<h4 class="text-center text-info m-0" style="margin-top: 15px;margin-bottom: 15px;">Products in your cart !</h4>
								</td>
							</tr>
							<tr>
								<th>S.No.</th>
								<th>Image</th>
								<th>Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total Price</th>
								<th>
									<a href="includes/action.php?clear=all" class="badge-danger badge" onclick="return confirm('Are you sure that you want to clear your cart ?');"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Clear Cart</a>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
								require 'includes/dbh.php';
								/* Calculate Offset Code */
				                  $limit = 3;
				                  if(isset($_GET['page'])){
				                    $page = $_GET['page'];
				                  }else{
				                    $page = 1;
				                  }
				                  $offset = ($page - 1) * $limit;
				                $userid = $_SESSION['userId'];
								$stmt = $conn->prepare("SELECT * FROM cart WHERE userid = {$userid}");
								$stmt->execute();
								$result = $stmt->get_result();
								$grand_total = 0;
								$serial = $offset + 1;

								while ($row = $result->fetch_assoc()):
							?>
							<tr>
								<td><?php echo $serial; ?></td>
								<input type="hidden" class="pid" value="<?= $row['id']?>">
								<td><img src="admin/product_images/sample/<?= $row['product_image'] ?>" width="50"></td>
								<td><?= $row['product_name']?></td>
								<td> &#8377; <?= number_format($row['product_price'],2);?></td>
								<input type="hidden" class="pprice" value="<?= $row['product_price']?>">
								<td><input type="number" class="form-control itemQty" value="<?= $row['qty']?>" style="width: 120px;"></td>
								<td> &#8377; <?= number_format($row['total_price'],2);?></td>
								<td>
									<a href="includes/action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure that you want to remove this item ?');"><i class="fa fa-trash-o"></i></a>
								</td>
									<?php
		                          $serial++;
		                        ?>
							</tr>
							<?php $grand_total +=$row['total_price']; ?>
						<?php endwhile;?>
							<tr>
								<td colspan="3">
									<a href="index.php" class="btn btn-success"><i class="fa fa-cart-plus"></i>&nbsp;&nbsp; Continue Shopping</a>
								</td>
								<td colspan="2"><b>Grand Total</b></td>
								<td><b> &#8377; <?= number_format($grand_total,2);?></b></td>
								<td>
									<a href="checkout.php" class="btn btn-info <?= ($grand_total>1)?"":"disabled"; ?>"><i class="fa fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
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
      
      $(".itemQty").on('change',function(){
      	var $el = $(this).closest('tr');

      	var pid = $el.find(".pid").val();
      	var pprice = $el.find(".pprice").val();
      	var qty = $el.find(".itemQty").val();

   		location.reload(true);
      	$.ajax({
      		url: 'includes/action.php',
      		method: 'post',
      		cache: false,
      		data: {qty:qty,pid:pid,pprice:pprice},
      		success: function(response){
      			console.log(response);
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