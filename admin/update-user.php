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
                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <div class="col-md-offset-4 col-md-4">
                <!-- Form Start -->


                <?php
                $id = $_GET['id'];


                $con = mysqli_connect('localhost', 'root', '', 'blog');
                $query = "SELECT * FROM users WHERE uid = $id";
                $user =   mysqli_query($con, $query);
                if (mysqli_num_rows($user) > 0) {
                    foreach ($user as $getvalues) {


                ?>
                        <form action="edit-user.php" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="id" class="form-control" value="<?php echo $getvalues['uid'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="fname" class="form-control" value="<?php echo $getvalues['fname'] ?>" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="form-control" value="<?php echo $getvalues['lname'] ?>" placeholder="" required>
                            </div>
                            <div class="form-group">

                                
                                <label>User Name</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $getvalues['uname'] ?>" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>User Role</label>
                                <select class="form-control" name="role" value="<?php echo $row['role']; ?>">

                                    <option value="0">Normal User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                        </form>
                <?php
                    }
                } else {
                   echo "Record not found";
                }
                ?>
                <!-- /Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>