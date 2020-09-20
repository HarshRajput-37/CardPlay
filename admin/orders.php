<?php include "header.php";
if($_SESSION["user_role"] == '0'){
  header("Location: {$hostname}/admin/cards.php");
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Orders</h1>
              </div>
              <div class="col-md-12">
                <?php
                  include "includes/config.php"; // database configuration
                  /* Calculate Offset Code */
                  $limit = 3;
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;
                  /* select query of user table with offset and limit */
                  $sql = "SELECT orders.id, orders.name, orders.email, orders.phone, orders.address, orders.paymode, orders.products, orders.ammount_paid, orders.userid, user.idUsers, user.uidUsers FROM orders LEFT JOIN user ON orders.userid = user.idUsers ORDER BY orders.id DESC LIMIT {$offset},{$limit}";
                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Order ID</th>
                          <th>Reciver Name</th>
                          <th>User Name</th>
                          <th>Phone Number</th>
                          <th>E-mail</th>
                          <th>Address</th>
                          <th>Payment Mode</th>
                          <th>Products</th>
                          <th>Ammount Paid</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                          $serial = $offset + 1;
                          while($row = mysqli_fetch_assoc($result)) {
                        ?>
                          <tr>
                              <td class='id'><?php echo $serial; ?></td>
                              <td><?php echo $row['id']; ?></td>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['uidUsers']; ?>,<?php echo $row['idUsers']; ?></td>
                              <td><?php echo $row['phone']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['address']; ?></td>
                              <td><?php echo $row['paymode']; ?></td>
                              <td><?php echo $row['products']; ?></td>
                              <td><?php echo $row['ammount_paid']; ?></td>
                              <td class='edit'><a href='update-orders.php?id=<?php echo $row["id"]; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-orders.php?id=<?php echo $row["id"]; ?>'><i class='fa fa-trash-o'></i></a></td>
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
                $sql1 = "SELECT * FROM orders";
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);

                  $total_page = ceil($total_records / $limit);

                  echo '<ul class="pagination admin-pagination">';
                  if($page > 1){
                    echo '<li><a href="orders.php?page='.($page - 1).'">Prev</a></li>';
                  }
                  for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="'.$active.'"><a href="orders.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($total_page > $page){
                    echo '<li><a href="orders.php?page='.($page + 1).'">Next</a></li>';
                  }

                  echo '</ul>';
                }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
