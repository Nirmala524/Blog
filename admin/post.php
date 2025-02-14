<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Posts</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-post.php">add post</a>
            </div>
            <div class="col-md-12">

                <?php


                $limit = 5;
                if (isset($_GET['page'])) {
                    $urlpage = $_GET['page'];
                } else {
                    $urlpage  = 1;
                }
                $offset = ($urlpage - 1) * $limit;

                $con = mysqli_connect('localhost', 'root', '', 'blog');
                $query = "SELECT * FROM posts INNER JOIN categories ON catName =categories.cid INNER JOIN users ON author =users.uid 
                  LIMIT {$offset},{$limit}";
                $post = mysqli_query($con, $query);

                if (mysqli_num_rows($post) > 0) {



                ?>
                    <table class="content-table">
                        <thead>
                            <th>S.No.</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Author</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($post as $key => $values) {

                            ?>
                                <tr>
                                    <td><?php echo $values['id'] ?></td>
                                    <td><?php echo $values['title'] ?></td>
                                    <td><?php echo $values['category'] ?></td>
                                    <td><?php echo $values['date'] ?></td>
                                    <td><?php echo $values['fname'] ?> <?php echo $values['lname'] ?></td>
                                    <td class='edit'><a href='update-post.php?pid=<?php echo $values['id'] ?>'><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='delete-post.php?pid=<?php echo $values['id'] ?>'><i class='fa fa-trash-o'></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table> <br><br>

                <?php } else {
                    echo " <h1>Record Not Found </h1>";
                }

                $pagequery = "SELECT * FROM posts";
                $total = mysqli_query($con, $pagequery);
                $totalpages = mysqli_num_rows($total);
                $pages =  ceil($totalpages / $limit);

                mysqli_close($con);
                ?>
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
    </div>
</div>
<?php include "footer.php"; ?>