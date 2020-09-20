<?php include "header.php";
if($_SESSION["user_role"] == '0'){
  header("Location: {$hostname}/admin/cards.php");
}
if(isset($_POST['submit'])){
  include "includes/config.php";

  $userid =mysqli_real_escape_string($conn,$_POST['user_id']);
  $fname =mysqli_real_escape_string($conn,$_POST['f_name']);
  $lname = mysqli_real_escape_string($conn,$_POST['l_name']);
  $user = mysqli_real_escape_string($conn,$_POST['username']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $password = mysqli_real_escape_string($conn,md5($_POST['password']));
  $role = mysqli_real_escape_string($conn,$_POST['role']);

  $sql = "UPDATE dealer SET first_name = '{$fname}', last_name = '{$lname}', didDealer = '{$user}', emailDealer = '{$email}', pwdDealer = '{$password}', role = '{$role}' WHERE idDealer = {$userid}";

    if(mysqli_query($conn,$sql)){
      header("Location: {$hostname}/admin/dealers.php");
    }
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                <?php
                include "includes/config.php";
                $user_id = $_GET['id'];
                $sql = "SELECT * FROM dealer WHERE idDealer = {$user_id}";
                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
                ?>
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['idDealer'];  ?>">
                      </div>
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name'];  ?>" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'];  ?>" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['didDealer'];  ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>E-mail</label>
                          <input type="text" name="email" class="form-control" value="<?php echo $row['emailDealer'];  ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>password</label>
                          <input type="text" name="password" class="form-control" value="<?php echo $row['pwdDealer'];  ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                            <?php
                              if($row['role'] == 1){
                                echo "<option value='0'>Dealer</option>
                                      <option value='1' selected>Admin</option>";
                              }else{
                                echo "<option value='0' selected>Dealer</option>
                                      <option value='1'>Admin</option>";
                              }
                            ?>
                          </select>
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
