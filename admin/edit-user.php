<?php 

$id = $_POST['id'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$user=$_POST['username'];
$role=$_POST['role'];


echo "<pre>";
print_r($_POST);
echo "</pre>";

$con = mysqli_connect('localhost', 'root', '', 'blog');
$query = "UPDATE users set fname='{$fname}',lname='{$lname}',uname='{$user}',role='{$role}' WHERE uid = '$id' ";
mysqli_query($con,$query);
echo "success";


mysqli_close($con);
header('location:http://localhost/Nirmala_php/Blog/Admin/users.php');
