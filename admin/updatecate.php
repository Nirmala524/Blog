<?php 
$id = $_POST['id'];

$categorys=$_POST['cat_name'];
 

$con = mysqli_connect('localhost', 'root', '', 'blog');
$query = "UPDATE categories set category='{$categorys}' WHERE cid = '$id' ";
mysqli_query($con,$query);
// echo "success";


mysqli_close($con);
header('location:http://localhost/Nirmala_php/blog/admin/category.php');









