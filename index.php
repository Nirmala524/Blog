<?php include 'header.php'; ?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <div class="post-content">
                  

                        <div class="row">
                        <?php
                            $limit = 3;
                            if (isset($_GET['page'])) {
                                $urlpage = $_GET['page'];
                            } else {
                                $urlpage  = 1;
                            }
                            $offset = ($urlpage - 1) * $limit;
                            $con = mysqli_connect('localhost', 'root', '', 'blog');
                            $query = "SELECT * FROM  posts INNER JOIN categories ON catName =categories.cid INNER JOIN users ON author =users.uid 
                                 LIMIT {$offset},{$limit}  ";
                            $students =   mysqli_query($con, $query);

                            if (mysqli_num_rows($students) > 0) {
                                foreach ($students as $key => $value) { ?>

                            <div class="col-md-6">
                                <a class="post-img" href="single.php?id=<?php echo  $value['id'] ?>"><img src="admin/upload/<?php  echo $value['img'] ?>" alt="" /></a>

                            </div>
                            
                                    <div class="col-md-6">
                                        <div class="inner-content clearfix">

                                            <h3><a href='single.php?id=<?php echo  $value['id'] ?>'><?php echo  $value['title'] ?></a> </h3>
                                            <div class="post-information">
                                                <span>
                                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                                    <a href='category.php?id=<?php echo  $value['id'] ?>' ><?php echo  $value['category'] ?> </a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <a href='author.php?uid=<?php echo $value['uid']?>'><?php echo  $value['fname'] ?><?php echo  $value['lname'] ?>
                                                    </a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <?php echo  $value['date'] ?>
                                                </span>
                                            </div>
                                            <p class="description">
                                                <?php echo  $value['description'] ?>
                                                <a class='read-more pull-right' href='single.php?id=<?php echo  $value['id'] ?>'>read more</a>

                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo " <h1>Record Not Found </h1>";
                            }



                            $pagequery = "SELECT * FROM posts";
                            $total = mysqli_query($con, $pagequery);
                            $totalpages = mysqli_num_rows($total);
                            $pages =  ceil($totalpages / $limit);

                            mysqli_close($con);
                            ?>
                        </div>
                    </div>
                    <ul class='pagination admin-pagination'>

                        <?php
                        if ($urlpage > 1) { ?>
                            <li><a href="?page=<?php echo $urlpage - 1 ?>"> Prev</a></li>
                        <?php  }  ?>

                        <?php

                        for ($i = 1; $i <= $pages; $i++) { ?>
                            <li class=" "><a href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                        <?php } ?>
                        <?php

                        if ($urlpage < $pages) { ?>
                            <li><a href="?page=<?php echo $urlpage + 1 ?> ">Next</a></li>

                        <?php  } ?>
                    </ul>


                </div>
            </div>
             <?php include 'sidebar.php'; ?> 
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>