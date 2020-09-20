<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Card</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="save-cards.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="category">Category</label>
                          <select name="category" class="form-control">
                              <option disabled selected> Select Category</option>
                              <?php
                                include "includes/config.php";
                                $sql = "SELECT * FROM product_categories";

                                $result = mysqli_query($conn, $sql) or die("Query Failed.");

                                if(mysqli_num_rows($result) > 0){
                                  while($row = mysqli_fetch_assoc($result)){
                                    echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                                  }
                                }
                              ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="card_title">Title</label>
                          <input type="text" name="title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="sample_template">Sample template</label>
                          <input type="file" name="samplefileToUpload" required>
                      </div>
                      <div class="form-group">
                          <label for="clear_template">Clear temmplate</label>
                          <input type="file" name="clearfileToUpload" required>
                      </div>
                      <div class="form-group">
                          <label for="card_price">Price</label>
                          <input type="text" name="price" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="card_discount">Discount</label>
                          <input type="text" name="discount" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="card_price">Size</label>
                          <input type="text" name="size" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="card_description"> Description</label>
                          <textarea name="description" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="card_price">Stock</label>
                          <input type="text" name="stock" class="form-control" autocomplete="off" required>
                      </div>
                      
                      
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
