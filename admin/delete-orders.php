<?php
include "includes/config.php";
if($_SESSION["user_role"] == '0'){
  header("Location: {$hostname}/admin/cards.php");
}
$orderid = $_GET['id'];

$sql = "DELETE FROM orders WHERE id = {$orderid}";

if(mysqli_query($conn, $sql)){
  header("Location: {$hostname}/admin/orders.php");
}else{
  echo "<p style='color:red;margin: 10px 0;'>Can\'t Delete the Order record.</p>";
}

mysqli_close($conn);

?>
