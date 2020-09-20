<?php include "header.php";

if($_SESSION["user_role"] == 0){
  include "includes/config.php";
  $post_id = $_GET['id'];
  $sql2 = "SELECT dealer FROM products WHERE product_id = {$post_id}";
  $result2 = mysqli_query($conn, $sql2) or die("Query Failed.");

  $row2 = mysqli_fetch_assoc($result2);

  if($row2['dealer'] != $_SESSION["user_id"]){
    header("location: {$hostname}/admin/cards.php");
  }

}
?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
      <?php
        include "includes/config.php";

        $post_id = $_GET['id'];
        $sql = "SELECT products.product_id, products.product_name, products.product_template, products.product_template_clear ,products.price, products.discount , products.size, products.description, products.avail_stock, product_categories.category_name, products.category FROM products
        LEFT JOIN product_categories ON products.category = product_categories.category_id
        LEFT JOIN user ON products.dealer = user.idUsers
        WHERE products.product_id = {$post_id}";

        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)) {
      ?>
        <!-- Form for show edit-->
        <form action="save-update-cards.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['product_id']; ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                  <option disabled> Select Category</option>
                  <?php
                    include "includes/config.php";
                    $sql1 = "SELECT * FROM product_categories";

                    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                    if(mysqli_num_rows($result1) > 0){
                      while($row1 = mysqli_fetch_assoc($result1)){
                        if($row['category'] == $row1['category_id']){
                          $selected = "selected";
                        }else{
                          $selected = "";
                        }
                        echo "<option {$selected} value='{$row1['category_id']}'>{$row1['category_name']}</option>";
                      }
                    }
                  ?>
                </select>
                <input type="hidden" name="old_category" value="<?php echo $row['category']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="card_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['product_name']; ?>">
            </div>
            <div class="form-group">
                <label for="">Sample template</label>
                <input type="file" name="new-image">
                <img  src="product_images/sample/<?= $row['product_template'] ?>" height="150px">
                <input type="hidden" name="old_image" value="<?php echo $row['post_img']; ?>">
            </div>
            <div class="form-group">
                <label for="">Clear template</label>
                <input type="file" name="new-image">
                <<img src="product_images/clear/<?= $row['product_template_clear'] ?>" height="150px">
                <input type="hidden" name="old_image" value="<?php echo $row['post_img']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Price</label>
                <input type="text" name="price"  class="form-control" id="exampleInputUsername" value="<?php echo $row['price']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Discount</label>
                <input type="text" name="discount"  class="form-control" id="exampleInputUsername" value="<?php echo $row['discount']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Size</label>
                <input type="text" name="size"  class="form-control" id="exampleInputUsername" value="<?php echo $row['size']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="carddesc" class="form-control"  required rows="5">
                    <?php echo $row['description']; ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Stock</label>
                <input type="text" name="stock"  class="form-control" id="exampleInputUsername" value="<?php echo $row['avail_stock']; ?>">
            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
        <?php
          }
        }else{
          echo "Result Not Found.";
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
