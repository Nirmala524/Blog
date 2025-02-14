<?php

$title = $_POST['post_title'];
$description = $_POST['postdesc'];
$catName = $_POST['category'];
$img = $_POST['image'];


$con = mysqli_connect('localhost', 'root', '', 'blog');
$query = "INSERT INTO posts(title,description,catName,img) values ('{$title}','{$description}','{$catName}','{$img}') ";
mysqli_query($con, $query);

echo "success";

mysqli_close($con);
header('location:http://localhost/Nirmala_php/blog/admin/post.php');
