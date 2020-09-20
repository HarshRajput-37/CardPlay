<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Cards</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-cards.php">add card</a>
              </div>
              <div class="col-md-12">
                <?php
                  include "includes/config.php"; // database configuration
                  /* Calculate Offset Code */
                  $limit = 6;
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;

                  if($_SESSION["user_role"] == '1'){
                    /* select query of post table for admin user */
                    $sql = "SELECT products.product_id, products.product_name, products.product_template, products.product_template_clear, products.price, products.discount, products.size, products.description, products.dealer, products.avail_stock, product_categories.category_name,dealer.didDealer,dealer.first_name,dealer.last_name,products.category FROM products
                    LEFT JOIN product_categories ON products.category = product_categories.category_id
                    LEFT JOIN dealer ON products.dealer = dealer.idDealer
                    ORDER BY product_categories.category_id DESC LIMIT {$offset},{$limit}";
                  }elseif($_SESSION["user_role"] == '0'){
                    /* select query of post table for normal user */
                    $sql = "SELECT products.product_id, products.product_name, products.product_template, products.product_template_clear, products.price, products.discount, products.size, products.description, products.dealer, products.avail_stock, product_categories.category_name,dealer.didDealer,dealer.first_name,dealer.last_name,products.category FROM products
                    LEFT JOIN product_categories ON products.category = product_categories.category_id
                    LEFT JOIN dealer ON products.dealer = dealer.idDealer
                    WHERE products.dealer = {$_SESSION['user_id']}
                    ORDER BY product_categories.category_id DESC LIMIT {$offset},{$limit}";
                  }

                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Card Name</th>
                          <th>Category</th>
                          <th>Product Template</th>
                          <th>Clear Product Template</th>
                          <th>Price</th>
                          <th>Discount</th>
                          <th>Card Size</th>
                          <th>Description</th>
                          <th>Dealer & ID</th>
                          <th>Available Stock</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                        $serial = $offset + 1;
                        while($row = mysqli_fetch_assoc($result)) {?>
                          <tr>
                              <td class='id'><?php echo $serial; ?></td>
                              <td><?php echo $row['product_name']; ?></td>
                              <td><?php echo $row['category_name']; ?></td>
                              <td><img src="product_images/sample/<?= $row['product_template'] ?>" width="50"></td>
                              <td><img src="product_images/clear/<?= $row['product_template_clear'] ?>" width="50"></td>
                              <td><?php echo $row['price']; ?></td>
                              <td><?php echo $row['discount']; ?></td>
                              <td><?php echo $row['size']; ?></td>
                              <td><?php echo $row['description']; ?></td>
                              <td><?php echo $row['first_name'] . " ". $row['last_name']; ?>,<?php echo $row['dealer']; ?></td>
                              <td><?php echo $row['avail_stock']; ?></td>
                              <td class='edit'><a href='update-cards.php?id=<?php echo $row['product_id']; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-cards.php?id=<?php echo $row['product_id']; ?>&catid=<?php echo $row['category']; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php
                          $serial++;
                        } ?>
                      </tbody>
                  </table>
                  <?php
                }else {
                  echo "<h3>No Results Found.</h3>";
                }
                // show pagination
                if($_SESSION["user_role"] == '1'){
                  /* select query of post table for admin user */
                  $sql1 = "SELECT * FROM products";
                }elseif($_SESSION["user_role"] == '0'){
                  /* select query of post table for normal user */
                  $sql1 = "SELECT * FROM products
                  WHERE dealer = {$_SESSION['user_id']}";
                }
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);

                  $total_page = ceil($total_records / $limit);

                  echo '<ul class="pagination admin-pagination">';
                  if($page > 1){
                    echo '<li><a href="cards.php?page='.($page - 1).'">Prev</a></li>';
                  }
                  for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="'.$active.'"><a href="cards.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($total_page > $page){
                    echo '<li><a href="cards.php?page='.($page + 1).'">Next</a></li>';
                  }

                  echo '</ul>';
                }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
