<?php include "header.php";

if ($_SESSION['user_role'] == 0) {
    header('location:http://localhost/Nirmala_php/blog/admin/post.php');
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Users</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-user.php">add user</a>
            </div>
            <div class="col-md-12">
                <?php

                $limit = 2;
                if (isset($_GET['page'])) {
                    $urlpage = $_GET['page'];
                } else {
                    $urlpage  = 1;
                }
                $offset = ($urlpage - 1) * $limit;

                $con = mysqli_connect('localhost', 'root', '', 'blog');
                $query = "SELECT * FROM users LIMIT {$offset},{$limit}";
                $students =   mysqli_query($con, $query);

                if (mysqli_num_rows($students) > 0) {


                ?>
                    <table class="content-table">
                        <thead>
                            <th>S.No.</th>
                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($students as $key => $value) {


                            ?>
                                <tr>
                                    <td><?php echo  $value['uid'] ?> </td>
                                    <td> <?php echo  $value['fname'] ?> <?php echo  $value['lname'] ?></td>

                                    <td> <?php echo  $value['uname'] ?></td>
                                    <td> <?php echo ($value['role'] == 1) ? 'Admin' : 'Normal User' ?></td>

                                    <td class='edit'><a href='update-user.php?id=<?php echo  $value['uid'] ?>'><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='delete-user.php?id=<?php echo  $value['uid'] ?>'><i class='fa fa-trash-o'></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    echo " <h1>Record Not Found </h1>";
                }

                $pagequery = "SELECT * FROM users";
                $total = mysqli_query($con, $pagequery);
                $totalpages = mysqli_num_rows($total);
                $pages =  ceil($totalpages / $limit);

                mysqli_close($con);
                ?>
                <ul class='pagination admin-pagination'>

                    <?php
                    if ($urlpage > 1) { ?>
                        <li><a href="?page=<?php echo $urlpage - 1 ?>"> Prev</a></li>
                    <?php
                    }

                    ?>

                    <?php

                    for ($i = 1; $i <= $pages; $i++) {
                    ?>
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