<?php
session_start();
if (isset($_POST['submit'])) {
    $title = $_POST['post_title'];
    $description = $_POST['postdesc'];
    $catName = $_POST['category'];
    $img = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $imagename =  explode('.', $img);
    $ext = end($imagename);
    $date = date('d M, Y');
    $auther_id = $_SESSION['id'];
    if ($ext === 'jpg' || $ext === 'webp' || $ext === 'jpeg' || $ext === 'png') {
        $con = mysqli_connect('localhost', 'root', '', 'blog');
        $query = "INSERT INTO posts(title,description,catName,date,author,img) values ('{$title}','{$description}',{$catName},'{$date}', {$auther_id},'{$img}');";
        $query.= "UPDATE categories SET post_of_category = post_of_category + 1 WHERE  cid = {$catName}";
        mysqli_multi_query($con, $query);
        move_uploaded_file($tmp_name, 'upload/' . $img);
        header('location: http://localhost/Nirmala_php/blog/admin/post.php');
    } else {
        echo "choose jpg file";
    }
    mysqli_close($con);
}
