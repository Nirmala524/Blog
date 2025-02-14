<?php
 include "header.php";
 if ($_SESSION['user_role'] == 0) {
    header('location:http://localhost/Nirmala_php/blog/admin/post.php');
}
 
 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">

              <?php

        $id = $_GET['id'];
        $con = mysqli_connect('localhost', 'root', '', 'blog');
        $query = "SELECT * FROM categories WHERE cid = $id";
        $categorys =   mysqli_query($con, $query);
        if (mysqli_num_rows($categorys) > 0) {
            foreach ($categorys as $getvalues) {


        ?>
                  <form action="updatecate.php" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="id"  class="form-control" value="<?php echo $getvalues['cid'] ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $getvalues['category'] ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php
            }
        } else {
            "record not found";
        }
        ?>
                 
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
