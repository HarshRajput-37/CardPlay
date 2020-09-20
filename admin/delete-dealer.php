<?php
include "includes/config.php";
if($_SESSION["user_role"] == '0'){
  header("Location: {$hostname}/admin/cards.php");
}
$userid = $_GET['id'];

$sql = "DELETE FROM dealer WHERE idDealer = {$userid}";

if(mysqli_query($conn, $sql)){
  header("Location: {$hostname}/admin/dealers.php");
}else{
  echo "<p style='color:red;margin: 10px 0;'>Can\'t Delete the User Record.</p>";
}

mysqli_close($conn);

?>
