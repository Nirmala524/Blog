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
                <h1 class="admin-heading">Add New Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form action="add-post-save.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="postdesc" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select name="category" class="form-control">

                            <option value="" selected> Select Category</option>

                            <?php
                            $con  = mysqli_connect('localhost', 'root', '', 'blog');
                            $dropdownquery = "SELECT * FROM categories";
                            $cate = mysqli_query($con, $dropdownquery);
                            if (mysqli_num_rows($cate) > 0) {
                                foreach ($cate as $dropdownkey => $dropdownvalue) {
                            ?>
                                    <option value="<?php echo $dropdownvalue['cid'] ?>"><?php echo $dropdownvalue['category'] ?></option>
                            <?php 
                                }
                            } else {
                                echo "<option> No Record Found </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post image</label>
                        <input type="file" name="image" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>