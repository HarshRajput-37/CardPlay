<?php
    include 'includes/config.php';
    if($_SESSION["user_role"] == '0'){
      header("Location: {$hostname}/admin/cards.php");
    }
    $cat_id = $_GET["id"];

    /*sql to delete a record*/
    $sql = "DELETE FROM product_categories WHERE category_id ='{$cat_id}'";

    if (mysqli_query($conn, $sql)) {
        header("location:{$hostname}/admin/category.php");
    }

    mysqli_close($conn);

?>
