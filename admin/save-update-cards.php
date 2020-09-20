<?php
include "includes/config.php";

if(empty($_FILES['new-image']['name'])){
  $new_name = $_POST['old_image'];
}else{
  $errors = array();

  $file_name = $_FILES['new-image']['name'];
  $file_size = $_FILES['new-image']['size'];
  $file_tmp = $_FILES['new-image']['tmp_name'];
  $file_type = $_FILES['new-image']['type'];
  $file_ext = end(explode('.',$file_name));

  $extensions = array("jpeg","jpg","png");

  if(in_array($file_ext,$extensions) === false)
  {
    $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
  }

  if($file_size > 2097152){
    $errors[] = "File size must be 2mb or lower.";
  }

  if($file_size > 2097152){
    $errors[] = "File size must be 2mb or lower.";
  }
  $new_name = time(). "-".basename($file_name);
  $target = "upload/".$new_name;
  $image_name = $new_name;
  if(empty($errors) == true){
    move_uploaded_file($file_tmp,$target);
  }else{
    print_r($errors);
    die();
  }
}

$sql = "UPDATE products SET category={$_POST["category"]}, product_name='{$_POST["card_title"]}',product_template='{$image_name}',product_template_clear='{$image_name}', price='{$_POST["price"]}', discount='{$_POST["discount"]}', description='{$_POST["carddesc"]}'
        WHERE product_id={$_POST["post_id"]};";
if($_POST['old_category'] != $_POST["category"] ){
  $sql .= "UPDATE product_categories SET cards= cards - 1 WHERE category_id = {$_POST['old_category']};";
  $sql .= "UPDATE product_categories SET cards= cards + 1 WHERE category_id = {$_POST["category"]};";
}

$result = mysqli_multi_query($conn,$sql);

if($result){
  header("location: {$hostname}/admin/cards.php");
}else{
  echo "Query Failed";
}




?>
