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
                <h1 class="admin-heading">Update Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form for show edit-->

                <?php
                $pid = $_GET['pid'];

                $con = mysqli_connect('localhost', 'root', '', 'blog');
                $query = "SELECT * FROM posts WHERE id=$pid";
                $post = mysqli_query($con, $query);
                if (mysqli_num_rows($post) > 0) {
                    foreach ($post as $key => $getvalue) {

                ?>

                        <form action="edit-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <input type="hidden" name="post_id" class="form-control" value="<?php echo $getvalue['id'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTile">Title</label>
                                <input type="text" name="post_title" class="form-control" id="exampleInputUsername" value="<?php echo $getvalue['title'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"> Description</label>
                                <textarea name="postdesc" class="form-control" required rows="5"><?php echo $getvalue['description'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCategory">Category</label>
                                <select class="form-control" name="category">

                                    <?php
                                    $con  = mysqli_connect('localhost', 'root', '', 'blog');
                                    $dropdownquery = "SELECT * FROM categories";
                                    $cate = mysqli_query($con, $dropdownquery);
                                    if (mysqli_num_rows($cate) > 0) {
                                        foreach ($cate as $dropdownkey => $dropdownvalue) {
                                    ?>
                                            <option value="<?php echo $dropdownvalue['cid'] ?>" <?php echo ($dropdownvalue['cid'] == $getvalue['catName']) ? 'selected' : '' ?>><?php echo $dropdownvalue['category'] ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "<option> No Record Found </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Post image</label>
                                <input type="file" name="new-image">
                                <img src="upload/<?php echo $getvalue['img'] ?>" height="200px">
                                <!-- <input type="hidden" name="old-image" value=""> -->
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                        </form>
                <?php
                    }
                } else {
                    echo "Record Not Found";
                }

                ?>
                <!-- Form End -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>