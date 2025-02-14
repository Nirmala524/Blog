<?php
$id = $_POST['post_id'];
$title = $_POST['post_title'];
$description = $_POST['postdesc'];
$category = $_POST['category'];
$img = $_FILES['new-image']['name'];
$tmp_name = $_FILES['new-image']['tmp_name'];
$imagename =  explode('.', $img);
$ext = end($imagename);

$con = mysqli_connect('localhost', 'root', '', 'blog');
$query = "UPDATE posts set title='{$title}',description='{$description}',catName='{$category}',img='{$img}' WHERE id =$id;";
mysqli_query($con, $query);
move_uploaded_file($tmp_name, 'upload/' . $img);

$data = "SELECT * FROM categories";
$dataquery = mysqli_query($con,$data);
if(mysqli_num_rows($dataquery)>0){
    foreach ($dataquery as $key => $value) {
$postcount= "SELECT * FROM  posts where catName= {$value['cid']}";
$categorycount = mysqli_num_rows(mysqli_query($con,$postcount));
mysqli_query($con,"UPDATE categories SET post_of_category = {$categorycount}  WHERE  cid = {$value['cid']}");
        
    }
}


echo "Success";
mysqli_close($con);
header('location:http://localhost/Nirmala_php/Blog/Admin/post.php');
