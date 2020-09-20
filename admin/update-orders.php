<?php include "header.php";
if($_SESSION["user_role"] == '0'){
  header("Location: {$hostname}/admin/cards.php");
}
if(isset($_POST['submit'])){
  include "includes/config.php";

  $orderid =mysqli_real_escape_string($conn,$_POST['order_id']);
  $name =mysqli_real_escape_string($conn,$_POST['name']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $phone = mysqli_real_escape_string($conn,$_POST['phone']);
  $address = mysqli_real_escape_string($conn,$_POST['address']);

  $sql = "UPDATE orders SET name = '{$name}', email = '{$email}', phone = '{$phone}', address = '{$address}' WHERE id = {$orderid}";

    if(mysqli_query($conn,$sql)){
      header("Location: {$hostname}/admin/orders.php");
    }
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify Order Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                <?php
                include "includes/config.php";
                $order_id = $_GET['id'];
                $sql = "SELECT * FROM orders WHERE id = {$order_id}";
                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
                ?>
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="order_id" class="form-control" value="<?php echo $row['id'];  ?>">
                      </div>
                      <div class="form-group">
                          <label>Reciever's Name</label>
                          <input type="text" name="name" class="form-control" value="<?php echo $row['name'];  ?>" required>
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" value="<?php echo $row['email'];  ?>" required>
                      </div>
                      <div class="form-group">
                          <label>Phone Number</label>
                          <input type="text" name="phone" class="form-control" value="<?php echo $row['phone'];  ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Address</label>
                          <input type="text" name="address" class="form-control" value="<?php echo $row['address'];  ?>" placeholder="" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
                  <?php
                }
              }
                   ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
