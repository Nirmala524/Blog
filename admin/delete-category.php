<?php

$id=$_GET['id'];
$con = mysqli_connect('localhost', 'root', '', 'blog');
$query="DELETE FROM categories WHERE cid = '$id'";
mysqli_query($con,$query);

 

mysqli_close($con);


header('location:http://localhost/Nirmala_php/blog/admin/category.php');



