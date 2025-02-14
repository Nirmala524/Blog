<?php


$categorys = $_POST['cat'];



$con = mysqli_connect('localhost', 'root', '', 'blog');
$query = "INSERT INTO categories(category) values ('{$categorys}') ";
mysqli_query($con, $query);
echo "success";

mysqli_close($con);

 header('location:http://localhost/Nirmala_php/blog/admin/category.php');