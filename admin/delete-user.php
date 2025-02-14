<?php

$id=$_GET['id'];
$con = mysqli_connect('localhost', 'root', '', 'blog');
$query="DELETE FROM users WHERE uid = '$id'";
mysqli_query($con,$query);

 

mysqli_close($con);


header('location:http://localhost/Nirmala_php/Blog/Admin/users.php');

