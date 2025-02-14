<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                   <?php 
                   
                   $id=$_GET['id'];
                   $con = mysqli_connect('localhost', 'root', '', 'blog');
                   $query = "SELECT * FROM posts INNER JOIN categories ON catName =categories.cid INNER JOIN users ON author =users.uid  WHERE id=$id";
                   $post = mysqli_query($con, $query);
                   if (mysqli_num_rows($post) > 0) {
                    foreach ($post as $key => $value) {
                   ?>
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?php echo  $value['title'] ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php echo  $value['category'] ?>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?uid=<?php echo $value['uid']?>'><?php echo  $value['fname'] ?><?php echo  $value['lname'] ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo  $value['date'] ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?php  echo $value['img'] ?>" alt=""/>
                            <p class="description">
                            <?php echo  $value['description'] ?>
                            </p>

                        </div>
                    </div>
                    <?php
                                }
                            } else {
                                echo " <h1>Record Not Found </h1>";
                            }
?>
                   
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
