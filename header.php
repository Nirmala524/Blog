<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.jpg"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              
                <ul class='menu'>
                <?php 
            $con = mysqli_connect('localhost', 'root', '', 'blog');
            $query="SELECT * FROM categories";
            $categorys=mysqli_query($con,$query);
            if (mysqli_num_rows($categorys) > 0) {
                foreach ($categorys as $key => $value) { 

?>
                    <li><a href='category.php?id=<?php echo  $value['cid'] ?>'><?php echo  $value['category'] ?></a></li>
                    <?php
                                }
                            } else {
                                echo " <h1>Record Not Found </h1>";
                            }
?>
                </ul>
                
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
