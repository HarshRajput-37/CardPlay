<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>CardPlay | Contact</title>
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
	<link rel="stylesheet" type="text/css" href="css/contact.css">
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
			                      <li><a href="contact.php" class="active">Contact</a></li>
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
			                        <li><a href="contact.php" class="active">Contact</a></li>
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
					<li>Contact</li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>

	<!-- //banner -->
	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<h3 class="head">Contact Us</h3>
			<p class="head_para">Add Some Description</p>
			<div class="inner_section_w3ls">
				<div class="col-md-7 contact_grid_right">
					<h6>Please fill this form to contact with us.</h6>
					<form action="contact.php" method="post">
						<div class="col-md-6 col-sm-6 contact_left_grid">
							<input type="text" name="name" placeholder="Name" required="">
							<input type="email" name="email" placeholder="Email" required="">
						</div>
						<div class="col-md-6 col-sm-6 contact_left_grid">
							<input type="text" name="telephone" placeholder="Telephone" required="">
							<input type="text" name="subject" placeholder="Subject" required="">
						</div>
						<div class="clearfix"> </div>
						<textarea name="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required=""></textarea>
						<input type="submit" name="submit" value="Submit">
						<input type="reset" value="Clear">
					</form>
				</div>
				<?php
	                include "includes/dbh.php";

	                $query = "SELECT * FROM settings";

	                $queryfire = mysqli_query($conn, $query) or die("Query Failed.");
	                if(mysqli_num_rows($queryfire) > 0){
	                  while($row = mysqli_fetch_assoc($queryfire)) {
	              ?>
				<div class="col-md-5 contact-left">
					<h6>Contact Info</h6>
					<div class="visit">
						<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
							<span class="fa fa-home" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10 contact-text">
							<h4>Visit us</h4>
							<p><?php echo $row['location'];?></p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="mail-us">
						<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
							<span class="fa fa-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10 contact-text">
							<h4>Mail us</h4>
							<p>Email :<a href="mailto:<?php echo $row['email'];?>"> <?php echo $row['email'];?></a></p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="call">
						<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
							<span class="fa fa-phone" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10 contact-text">
							<h4>Call us</h4>
							<p><?php echo $row['contact'];?></p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="visit">
						<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
							<span class="fa fa-fax" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10 contact-text">
							<h4>Fax</h4>
							<p><?php echo $row['contact'];?></p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<?php
                }
              }
              ?>
				<div class="clearfix"> </div>

			</div>

			<div class="clearfix"></div>

		</div>
	</div>
	<div class="contact-map">
		
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60381.948473154414!2d72.80892825839443!3d18.93706874200322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7d1db120d9313%3A0xcd9460a6efdac78c!2sMumbai%2C%20Maharashtra%20400001!5e0!3m2!1sen!2sin!4v1589530908681!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-></iframe>
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