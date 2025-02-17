<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN | Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div id="wrapper-admin" class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <img class="logo" src="images/news.jpg">
                    <h3 class="heading">Admin</h3>
                    <!-- Form Start -->
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="" required>
                        </div>
                        <input type="submit" name="login" class="btn btn-primary" value="login" />
                    </form>
                    <!-- /Form  End -->
                    <?php
                    session_start();
                    $con = mysqli_connect('localhost', 'root', '', 'blog');
                    if (isset($_POST['login'])) {
                        $username = mysqli_escape_string($con, $_POST['username']);
                        $password = md5($_POST['password']);
                        $query = "SELECT * FROM users WHERE uname='{$username}' AND password ='{$password}'";
                        $result = mysqli_query($con, $query);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $key => $value) {
                                $_SESSION['id']=$value['uid'];
                                $_SESSION['username'] = $value['uname'];
                                $_SESSION['user_role'] = $value['role'];
                            }
                            
                            header('location:http://localhost/Nirmala_php/blog/admin/post.php');
                        } else {
                            echo "<p class=text-danger> Please Enter Valid User Name Or Password </p>";
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>