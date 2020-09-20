<?php include "header.php";
if($_SESSION["user_role"] == '0'){
  header("Location: {$hostname}/admin/cards.php");
}
if(isset($_POST['save'])){
  include "includes/config.php";

  $fname =mysqli_real_escape_string($conn,$_POST['fname']);
  $lname = mysqli_real_escape_string($conn,$_POST['lname']);
  $user = mysqli_real_escape_string($conn,$_POST['duser']);
  $email = mysqli_real_escape_string($conn,$_POST['demail']);
  $password = mysqli_real_escape_string($conn,md5($_POST['dpassword']));
  $role = mysqli_real_escape_string($conn,$_POST['role']);

  $sql = "SELECT didDealer FROM dealer WHERE didDealer = '{$user}'";

  $result = mysqli_query($conn, $sql) or die("Query Failed.");

  if(mysqli_num_rows($result) > 0){
    echo "<p style='color:red;text-align:center;margin: 10px 0;'>UserName already Exists.</p>";
  }else{
    $sql1 = "INSERT INTO dealer (first_name,last_name, didDealer, emailDealer, pwdDealer, role)
              VALUES ('{$fname}','{$lname}','{$user}','{$email}','{$password}','{$role}')";
    if(mysqli_query($conn,$sql1)){
      header("Location: {$hostname}/admin/dealers.php");
    }else{
      echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert User.</p>";
    }
  }
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add Dealer</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="duser" class="form-control" placeholder="Username" required>
                      </div>
                      <div class="form-group">
                          <label>E-mail</label>
                          <input type="text" name="demail" class="form-control" placeholder="E-mail" required>
                      </div>
                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="dpassword" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Dealer</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
