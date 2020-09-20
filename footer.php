
<!-- /newsletter-->
	<div class="newsletter_w3layouts_agile">
		<div class="col-sm-6 newsleft">
			<h3>Sign up for Newsletter !</h3>
		</div>
		<div class="col-sm-6 newsright">
			<form action="#" method="post">
				<input type="email" placeholder="Enter your email..." name="email" required="">
				<input type="submit" value="Submit">
			</form>
		</div>

		<div class="clearfix"></div>
	</div>
	<!-- //newsletter-->
	<!-- footer -->
	<div class="footer_agileinfo_w3">
		<?php
	                include "includes/dbh.php";

	                $query = "SELECT * FROM settings";

	                $queryfire = mysqli_query($conn, $query) or die("Query Failed.");
	                if(mysqli_num_rows($queryfire) > 0){
	                  while($row = mysqli_fetch_assoc($queryfire)) {
	              ?>
		<div class="footer_inner_info_w3ls_agileits">
			<div class="col-md-3 footer-left">
			  
				<h2><a href="index.php"><img src="images/<?php echo $row['logo'];?>" height="70" width=""></a></h2>
				<p><?php echo $row['site_description'];?></p>
				<ul class="social-nav model-3d-0 footer-social social two">
					<li>
						<a href="https://www.facebook.com/harsh.rajput.56829/" target="_blank" class="facebook">
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
						<a href="https://www.instagram.com/icarus_31/" target="_blank" class="instagram">
							<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="https://www.linkedin.com/in/harsh-rajput-b18b831a2/" target="_blank" class="linkedin">
							<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
						</a>
					</li>
				</ul>
				
			</div>
			<div class="col-md-9 footer-right">
				<div class="sign-grds">
					<div class="col-md-4 sign-gd">
						<h4>Our <span>Information</span> </h4>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</div>

					<div class="col-md-5 sign-gd-two">
						<h4>Store <span>Information</span></h4>
						<div class="address">
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-phone" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Phone Number</h6>
									<p><?php echo $row['contact'];?></p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Email Address</h6>
									<p>Email :<a href="mailto:<?php echo $row['email'];?>"> <?php echo $row['email'];?></a></p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Location</h6>
									<p><?php echo $row['location'];?></p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>

			<p class="copy-right-w3ls-agileits"><?php echo $row['footer_description'];?></p>
		</div>
		<?php
                }
              }
              ?>
	</div>
	</div>
	<!-- //footer -->