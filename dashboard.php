<?php
	session_start();
	$active ='dashboard';
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>CardPlay | Dashboard</title>
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
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
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
			                      <li><a href="dashboard.php" class="active>Dashboard</a></li>
			                      <li><a href="about.php"">About</a></li>
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
					<li>DashBoard</li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>

	<!-- //banner -->
	<!------------dashboard------------->
	<div class="container-fluid display-table">
        <div class="row display-table-row">
            <?php include 'includes/dashmenu.php'; ?>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!-- <button type="button" class="slide-toggle">Slide Toggle</button>  -->
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            <!-- <div class="search hidden-xs hidden-sm">
                                <input type="text" placeholder="Search" id="search">
                            </div> -->
                        </div>
                        
                    </header>
                </div>

                <div class="user-dashboard">
                	<?php
                    include "includes/dbh.php";

                    $userid = $_SESSION['userId'];
                    $query = "SELECT * FROM user WHERE idUsers = {$userid}";

                    $queryfire = mysqli_query($conn, $query) or die("Query Failed.");
                    if(mysqli_num_rows($queryfire) > 0){
                      while($row = mysqli_fetch_assoc($queryfire)) {
                    ?>

                    <h1>Hello,<?php echo $row['uidUsers'];?></h1>
                    
                    <div class="address_form">
							<section class="creditly-wrapper wrapper">
								
									<div class="first-row form-group">
										<div class="controls" style="margin-left: 30px;margin-bottom: 10px;">
											<h4>Full name : <span><?php echo $row['first_name'] . " ". $row['last_name']; ?></span></h4>	
										</div>
										
										<div class="controls" style="margin-left: 30px;margin-bottom: 10px;">
											<h4>Username : <span><?php echo $row['uidUsers'];?></span></h4>
										</div>

										<div class="controls" style="margin-left: 30px;margin-bottom: 10px;">
											<h4>Email : <span><?php echo $row['emailUsers'];?></span></h4> 
										</div>
										
										<div class="controls" style="margin-left: 30px;margin-bottom: 10px;">
											<h4>Password : <span>*********</span></h4> 
										</div>
										<div class="clear"> </div>

										<div class="col-md-2">
                  							<a href='edit-details.php?id=<?php echo $_SESSION["userId"];?>' style="
										    color: #fff;
										    background-color: #1E90FF;
										    font-size: 15px;
										    font-weight: 600;
										    text-align: center;
										    text-transform: uppercase;
										    padding: 7px 10px;
										    margin-top: 40px;
										    margin-bottom: 40px;
										    display: block;
										    transition: all 0.3s;">Edit info</a>
              							</div>
										
									</div>
									<!-- <button class="submit check_out">Delivery to this Address</button> -->
								
							</section>
						<!-- <div class="checkout-right-basket">
							<a href="payment.php">Make a Payment </a>
						</div> -->
					</div>

					<div class="clearfix"> </div>
					<?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

    </div>



    <!-- Modal -->
    <div id="add_project" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header login-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Add Project</h4>
                </div>
                <div class="modal-body">
                            <input type="text" placeholder="Project Title" name="name">
                            <input type="text" placeholder="Post of Post" name="mail">
                            <input type="text" placeholder="Author" name="passsword">
                            <textarea placeholder="Desicrption"></textarea>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="cancel" data-dismiss="modal">Close</button>
                    <button type="button" class="add-project" data-dismiss="modal">Save</button>
                </div>
            </div>

        </div>
    </div>
	<!------------dashboard------------->
	
	
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
	<script src="js/dashboard.js"></script>

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