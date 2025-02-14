<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                $uid=$_GET['uid'];
                $con = mysqli_connect('localhost', 'root', '', 'blog');
                $query = "SELECT * FROM posts INNER JOIN categories ON catName =categories.cid INNER JOIN users ON author =users.uid  WHERE author=$uid";
                $categorys = mysqli_query($con, $query);
                $cate = mysqli_query($con, "SELECT * FROM users where uid={$uid}");

                if (mysqli_num_rows($categorys) > 0) {
                    foreach ($cate as $key => $userss) {


                ?>
                <!-- post-container -->
                <div class="post-container">
                  <h2 class="page-heading">Author Name:<?php echo $userss['fname'] ?><?php echo $userss['lname'] ?></h2>
                  <?php }?>
                    
                  <div class="post-content">
                    <?php
                            foreach ($categorys as $key => $value) {

                            ?>
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href="single.php?id=<?php echo  $value['id'] ?>"><img src="admin/upload/<?php  echo $value['img'] ?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.php?id=<?php echo  $value['id'] ?>'><?php echo  $value['title'] ?></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='category.php?id=<?php echo  $value['id'] ?>' ><?php echo  $value['category'] ?></a>
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
                                    <p class="description">
                                    <?php echo  $value['description'] ?>
                            </p>
                                                <a class='read-more pull-right' href='single.php?id=<?php echo  $value['id'] ?>'>read more</a>

                                </div>
                            </div>
                        </div>
                        <?php  }
                                ?>
                    </div>
                   

                    <?php
                        } else {
                            echo " <h1>Record Not Found </h1>";
                        }
                            ?>
                    <ul class='pagination'>
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                    </ul>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
