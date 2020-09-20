<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>CardPlay | Home </title>
	<!-- custom-theme -->
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
	<link rel="stylesheet" href="css/swiper.min.css" />
  <link rel="stylesheet" href="css/swiper-style.css" />
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
	<div class="banner_top" id="home">
		<div class="wrapper_top_cardplay">

			<div class="header_agileits">
				<div class="logo">
          <?php
          include "includes/dbh.php";

          $query = "SELECT * FROM settings";

           $queryfire = mysqli_query($conn, $query) or die("Query Failed.");
          if(mysqli_num_rows($queryfire) > 0){
            while($row = mysqli_fetch_assoc($queryfire)) {
          ?>
					<h1><a class="navbar-brand" href="index.php"><img src="images/<?php echo $row['logo'];?>"></a></h1>
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
                      <li><a href="index.php" class="active">Home</a></li>
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
                        <li><a href="index.php" class="active">Home</a></li>
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
			</div>
			<!-- /slider -->
			<div class="slider">
				<div class="callbacks_container">
					<ul class="rslides callbacks callbacks1" id="slider4">

						<li>
							<div class="banner-top2">
								<div class="banner-info-wthree">
									<h3>Marriages</h3>
									<p>Cherish yoour moments with your loved ones</p>

								</div>

							</div>
						</li>
						<li>
							<div class="banner-top3">
								<div class="banner-info-wthree">
									<h3>Baby showers</h3>
									<p>Come togeather with the ones you value the most</p>

								</div>

							</div>
						</li>
						<li>
							<div class="banner-top">
								<div class="banner-info-wthree">
									<h3>Parties</h3>
									<p>Get together in touch and live your moments</p>

								</div>

							</div>
						</li>
						<li>
							<div class="banner-top1">
								<div class="banner-info-wthree">
									<h3>Birthdays</h3>
									<p>Enjoy your moments with your close ones</p>

								</div>

							</div>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- //slider -->
			<ul class="top_icons">
				<li><a href="https://www.facebook.com/harsh.rajput.56829/" target="_blank"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
				<li><a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
				<li><a href="https://www.linkedin.com/in/harsh-rajput-b18b831a2/" target="_blank"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
				<li><a href="https://www.instagram.com/icarus_31/"><span class="fa fa-instagram" aria-hidden="true"></span></a></li>

			</ul>
		</div>
	</div>
	<!-- //banner -->
	
	<!--===============================Bread-Crumbs-Section==================================-->
		<!-- <nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item active" aria-current="page">Birthday Cards :</li>
		  </ol>
		</nav> -->
<!--=============================Swipper-Category-Section================================-->
    <div>
      <hr>
      <div class="swiper-container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="category.php?cid=1">Birthday cards:</a></li>
          </ol>
        </nav>

        <div class="swiper-wrapper">
          <?php
            include "includes/dbh.php";

            $sql = "SELECT  products.category, products.product_id, products.product_name, products.product_template, product_categories.category_id FROM products LEFT JOIN product_categories ON products.category = product_categories.category_id WHERE products.category = 1 ORDER BY products.product_id ASC LIMIT 6";

            $result = mysqli_query($conn, $sql) or die("Query Failed products");
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)) {
           ?>
          <div class="swiper-slide">
            <div class="Slide">
              <img src="admin/product_images/sample/<?php echo $row['product_template'];?>">
              <div class="details">
              <p><?php echo $row['product_name'];?></p><br>
              <p><a href='single.php?id=<?php echo $row['product_id'];?>&&cid=<?php echo $row['category_id'];?>'> more info</a></p>
              </div>
            </div>
          </div>
          <?php
              }
            }
          ?>

          <div class="swiper-slide">
            <div class="Slide">
              <a href="category.php?cid=1"><img src="images/view-more.png"></a>
            </div>
          </div>
        </div> 
      </div>  
      <script src="js/swiper.min.js"></script>
      <script>
        var swiper = new Swiper('.swiper-container', 
        {
          effect: 'coverflow',
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: 'auto',
          coverflowEffect: {
            rotate: 30,
            stretch: 0,
            depth: 200,
            modifier: 1,
            slideShadows : true,
          },
          pagination: {
            el: '.swiper-pagination',
          },
        });
      </script>
    </div>  
<!--===============================Bread-Crumbs-Section==================================-->
		<!-- <nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item active" aria-current="page">Baby Shower Cards :</li>
		  </ol>
		</nav> -->
<!--=============================Swipper-Category-Section================================-->
    <hr>
    <div class="swiper-container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="category.php?cid=2">Baby Shower cards:</a></li>
        </ol>
      </nav>
      <div class="swiper-wrapper">
        <?php
            include "includes/dbh.php";

            $sql = "SELECT  products.category, products.product_id, products.product_name, products.product_template, product_categories.category_id FROM products LEFT JOIN product_categories ON products.category = product_categories.category_id WHERE products.category= 2 ORDER BY products.product_id DESC LIMIT 6";

            $result = mysqli_query($conn, $sql) or die("Query Failed products");
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)) {
           ?>
          <div class="swiper-slide">
            <div class="Slide">
              <img src="admin/product_images/sample/<?php echo $row['product_template'];?>">
              <div class="details">
              <p><?php echo $row['product_name'];?></p><br>
              <p><a href='single.php?id=<?php echo $row['product_id'];?>&&cid=<?php echo $row['category_id'];?>'> more info</a></p>
              </div>
            </div>
          </div>
          <?php
              }
            }
          ?>

        <div class="swiper-slide">
          <div class="Slide">
            <a href="category.php?cid=2"><img src="images/view-more.png"></a>
          </div>
        </div>
      </div> 
    </div>  
    <script src="js/swiper.min.js"></script>
    <script>
    var swiper = new Swiper('.swiper-container', 
    {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 30,
        stretch: 0,
        depth: 200,
        modifier: 1,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>
<!--===============================Bread-Crumbs-Section==================================-->
		<!-- <nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item active" aria-current="page"> Wedding Cards :</li>
		  </ol>
		</nav> -->
<!--=============================Swipper-Category-Section================================-->
    <hr>
    <div class="swiper-container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="category.php?cid=3">Wedding Cards :</a></li>
        </ol>
      </nav>
      <div class="swiper-wrapper">
        <?php
            include "includes/dbh.php";

            $sql = "SELECT  products.category, products.product_id, products.product_name, products.product_template, product_categories.category_id FROM products LEFT JOIN product_categories ON products.category = product_categories.category_id WHERE products.category = 3 ORDER BY products.product_id DESC LIMIT 6";

            $result = mysqli_query($conn, $sql) or die("Query Failed products");
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)) {
           ?>
          <div class="swiper-slide">
            <div class="Slide">
              <img src="admin/product_images/sample/<?php echo $row['product_template'];?>">
              <div class="details">
              <p><?php echo $row['product_name'];?></p><br>
              <p><a href='single.php?id=<?php echo $row['product_id'];?>&&cid=<?php echo $row['category_id'];?>'> more info</a></p>
              </div>
            </div>
          </div>
          <?php
              }
            }
          ?>

        <div class="swiper-slide">
          <div class="Slide">
            <a href="category.php?cid=3"><img src="images/view-more.png"></a>
          </div>
        </div>
      </div> 
    </div>  
    <script src="js/swiper.min.js"></script>
    <script>
    var swiper = new Swiper('.swiper-container', 
    {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 30,
        stretch: 0,
        depth: 200,
        modifier: 1,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>
<!--===============================Bread-Crumbs-Section==================================-->
		<!-- <nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item active" aria-current="page"> Party Cards :</li>
		  </ol>
		</nav> -->
<!--=============================Swipper-Category-Section================================-->
    <hr>
    <div class="swiper-container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><a href="category.php?cid=4">Party Cards :</a></li>
        </ol>
      </nav>
      <div class="swiper-wrapper">
        <?php
            include "includes/dbh.php";

            $sql = "SELECT  products.category, products.product_id, products.product_name, products.product_template, product_categories.category_id FROM products LEFT JOIN product_categories ON products.category = product_categories.category_id WHERE products.category = 4 ORDER BY products.product_id DESC LIMIT 6";

            $result = mysqli_query($conn, $sql) or die("Query Failed products");
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)) {
           ?>
          <div class="swiper-slide">
            <div class="Slide">
              <img src="admin/product_images/sample/<?php echo $row['product_template'];?>">
              <div class="details">
              <p><?php echo $row['product_name'];?></p><br>
              <p><a href='single.php?id=<?php echo $row['product_id'];?>&&cid=<?php echo $row['category_id'];?>'> more info</a></p>
              </div>
            </div>
          </div>
          <?php
              }
            }
          ?>

        <div class="swiper-slide">
          <div class="Slide">
            <a href="category.php?cid=4"><img src="images/view-more.png"></a>
          </div>
        </div>
      </div> 
    </div>  
    <script src="js/swiper.min.js"></script>
    <script>
    var swiper = new Swiper('.swiper-container', 
    {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 30,
        stretch: 0,
        depth: 200,
        modifier: 1,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>
	

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
	<script>
		$(function () {
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script>
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