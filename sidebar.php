<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
       

        <h4>Recent Posts</h4>
        <?php 
         $con = mysqli_connect('localhost', 'root', '', 'blog');
         $query = "SELECT * FROM  posts INNER JOIN categories ON catName =categories.cid INNER JOIN users ON author =users.uid order by id desc limit 5";
         $students =   mysqli_query($con, $query);

         if (mysqli_num_rows($students) > 0) {
             foreach ($students as $key => $value) { ?>
        <div class="recent-post">
            
            <a class="post-img" href="">
                <img src="admin/upload/<?php  echo $value['img'] ?>" alt=""/>
            </a>
            <div class="post-content">
                <h5><a href="single.php?id=<?php echo  $value['id'] ?>"><?php echo  $value['title'] ?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.phpid=<?php echo  $value['cid'] ?>'><?php echo  $value['category'] ?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo  $value['category'] ?>
                </span>
                <a class="read-more" href="single.php?id=<?php echo  $value['id'] ?>">read more</a>
            </div>
         
        </div>
        <?php
                                }
                            } else {
                                echo " <h1>Record Not Found </h1>";
                            }
                            ?>
    </div>
    <!-- /recent posts box -->
</div>
