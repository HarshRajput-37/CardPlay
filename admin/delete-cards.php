<?php
  include "includes/config.php";

  $post_id = $_GET['id'];
  $cat_id = $_GET['catid'];

  $sql1 = "SELECT * FROM products WHERE product_id = {$post_id}";
  $result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
  $row = mysqli_fetch_assoc($result);

  unlink("upload/".$row['product_template']);
  // unlink("upload/".$row['product_template_clear']);

  $sql = "DELETE FROM products WHERE product_id = {$post_id};";
  $sql .= "UPDATE product_categories SET cards= cards - 1 WHERE category_id = {$cat_id}";

  if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/admin/cards.php");
  }else{
    echo "Query Failed";
  }
?>
