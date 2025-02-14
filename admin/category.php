<?php
include "header.php";
$con = mysqli_connect('localhost', 'root', '', 'blog');
// session_start();
if ($_SESSION['user_role'] == 0) {
    header('location:http://localhost/Nirmala_php/blog/admin/post.php');
}

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
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
                $query = "SELECT * FROM categories LIMIT {$offset},{$limit}";
                $students =   mysqli_query($con, $query);

                if (mysqli_num_rows($students) > 0) { ?>

                    <table class="content-table">
                        <thead>
                            <th>S.No.</th>
                            <th>Category Name</th>
                            <th>No. of Posts</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($students as $key => $value) { ?>
                                <tr>
                                    <td><?php echo  $value['cid'] ?> </td>
                                    <td> <?php echo  $value['category'] ?></td>
                                    <td> <?php echo  $value['post_of_category'] ?></td>
                                    <td class='edit'><a href='update-category.php?id=<?php echo  $value['cid'] ?>'><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='delete-category.php?id=<?php echo  $value['cid'] ?>'><i class='fa fa-trash-o'></i></a></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    echo " <h1>Record Not Found </h1>";
                }

                $pagequery = "SELECT * FROM categories";
                $total = mysqli_query($con, $pagequery);
                $totalpages = mysqli_num_rows($total);
                $pages =  ceil($totalpages / $limit);
                mysqli_close($con);
                ?>
                <ul class='pagination admin-pagination'>

                    <?php
                    if ($urlpage > 1) { ?>
                        <li><a href="?page=<?php echo $urlpage - 1 ?>"> Prev</a></li>
                    <?php } ?>

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