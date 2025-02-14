<?php

$id = $_GET['pid'];
$con = mysqli_connect('localhost', 'root', '', 'blog');
$dataQuery = "SELECT * FROM posts WHERE id = $id";
$postData =  mysqli_query($con, $dataQuery);

foreach ($postData as $key => $value) {
  
    $categoryId = $value['catName'];
    $query = "DELETE FROM posts WHERE id = $id";
    mysqli_query($con, $query);
    $countQuery = "UPDATE categories SET post_of_category = post_of_category - 1 WHERE  cid = {$categoryId}";
    mysqli_query($con, $countQuery);

}
mysqli_close($con);
header('location: http://localhost/Nirmala_php/Blog/Admin/post.php');
