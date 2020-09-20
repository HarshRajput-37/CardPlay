<!-- product left -->
    
			<div class="side-bar col-md-3">
				<div class="left-side">
                    <div class="sb-sidenav-menu" id="navbarSupportedContent">
                    	<div class="sidebar-heading">Categories :</div>
					    <div class="list-group list-group-flush">
					    	<?php
			                include "dbh.php";

			                if(isset($_GET['cid'])){
			                  $cat_id = $_GET['cid'];
			                }

			                $sql = "SELECT * FROM product_categories WHERE cards > 0";
			                $result = mysqli_query($conn, $sql) or die("Query Failed. : Category");
			                if(mysqli_num_rows($result) > 0){
			                  $active = "";
			              ?>
					    	<ul>
					    	<?php echo "<li><a href='arrivals.php'>Newest arrivals</a></li>"; ?>
					    	<?php while($row = mysqli_fetch_assoc($result)) {
		                    if(isset($_GET['cid'])){
		                      if($row['category_id'] == $cat_id){
		                        $active = "active";
		                      }else{
		                        $active = "";
		                      }
		                    }
		                    echo "<li><a class='{$active}' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
		                  } ?>
					      	</ul>
					      	<?php } ?>
					    </div> 
				 	</div>
				</div>
				
			</div>
			<!-- //product left -->