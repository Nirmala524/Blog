<?php


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$user = $_POST['uname'];
$password = $_POST['password'];
$role = $_POST['role'];

$con = mysqli_connect('localhost', 'root', '', 'blog');
$query =  "SELECT uname FROM users WHERE uname='{$user}'";
$username = mysqli_query($con, $query);

if (mysqli_num_rows($username) != 0) {
    echo "User Name Already Exists";
} else {


    $query = "INSERT INTO users(fname,lname,uname ,password,role) values ('{$fname}','{$lname}','{$user}','{$password}','{$role}') ";
    mysqli_query($con, $query);
}

echo "dgfj";
mysqli_close($con);

// header('location:http://localhost/PHP/blog/admin/users.php');
