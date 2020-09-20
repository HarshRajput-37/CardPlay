<?php
  include "includes/config.php";
  if(isset($_FILES['samplefileToUpload'])){
    $errors = array();

    $file_name = $_FILES['samplefileToUpload']['name'];
    $file_size = $_FILES['samplefileToUpload']['size'];
    $file_tmp = $_FILES['samplefileToUpload']['tmp_name'];
    $file_type = $_FILES['samplefileToUpload']['type'];
    $file_ext = end(explode('.',$file_name));

    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if($file_size > 2097152){
      $errors[] = "File size must be 2mb or lower.";
    }
    $sample_name = basename($file_name);
    $target = "product_images/sample/".$sample_name;

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }

  if(isset($_FILES['clearfileToUpload'])){
    $errors = array();

    $file_name = $_FILES['clearfileToUpload']['name'];
    $file_size = $_FILES['clearfileToUpload']['size'];
    $file_tmp = $_FILES['clearfileToUpload']['tmp_name'];
    $file_type = $_FILES['clearfileToUpload']['type'];
    $file_ext = end(explode('.',$file_name));

    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if($file_size > 2097152){
      $errors[] = "File size must be 2mb or lower.";
    }
    $clear_name = basename($file_name);
    $target = "product_images/clear/".$clear_name;

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }

  session_start();
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);
  $discount = mysqli_real_escape_string($conn, $_POST['discount']);
  $size = mysqli_real_escape_string($conn, $_POST['size']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $stock = mysqli_real_escape_string($conn, $_POST['stock']);
  $dealer = $_SESSION['user_id'];

  $sql = "INSERT INTO products(category, product_name, product_template, product_template_clear, price, discount, size, description, dealer, avail_stock) VALUES('{$category}','{$title}','{$sample_name}','{$clear_name}',{$price},{$discount},{$size},'{$description}',{$dealer},{$stock});";
  $sql .= "UPDATE product_categories SET cards = cards + 1 WHERE category_id = {$category}";

  if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/admin/cards.php");
  }else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }

?>
