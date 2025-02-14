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
                <h1 class="admin-heading">Add User</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>

                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="uname" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role">
                            <option value="0">Normal User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>

                    <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                </form>
                <?php
                if (isset($_POST['save'])) {

                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $user = $_POST['uname'];
                    $password = $_POST['password'];
                    $pass = md5($password);
                    $role = $_POST['role'];

                    $con = mysqli_connect('localhost', 'root', '', 'blog');
                    $query =  "SELECT uname FROM users WHERE uname='{$user}'";
                    $username = mysqli_query($con, $query);

                    if (mysqli_num_rows($username) != 0) {
                        echo "User Name Already Exists";
                    } else {


                        $query = "INSERT INTO users(fname,lname,uname ,password,role) values ('{$fname}','{$lname}','{$user}','{$pass}','{$role}') ";
                        mysqli_query($con, $query);
                        header('location:http://localhost/Nirmala_php/blog/admin/users.php');
                    }
                    mysqli_close($con);
                }
                ?>
                <!-- Form End-->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>