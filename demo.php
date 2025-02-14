<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <?php
    $con = mysqli_connect('localhost', 'root', '', 'crud');
    $query = "SELECT * FROM newstudents  INNER JOIN classes ON class_id = classes.cid";
    $students =   mysqli_query($con, $query);
    if (mysqli_num_rows($students) > 0) {


    ?>
        <table align="center" width="90%" cellpadding="5px" border="2px">


            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Class</th>
                    <th>Phone</th>
                    <th>Action</th>

                </tr>

            </thead>
            <tbody>
                <?php
                foreach ($students as $key => $value) {


                ?>
                    <tr>
                        <td><?php echo  $value['id'] ?> </td>
                        <td> <?php echo  $value['name'] ?></td>
                        <td> <?php echo  $value['city'] ?></td>
                        <td> <?php echo  $value['class'] ?></td>
                        <td> <?php echo  $value['phone'] ?></td>
                        <td>
                            <a  href="edit.php?id=<?php echo  $value['id'] ?>">Edit</a>
                            <a href="deletedata.php?id=<?php echo  $value['id'] ?>">Delete</a>

                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        <?php
    } else {
        echo " <h1>Record Not Found </h1>";
    }
    mysqli_close($con);
        ?>
        </table>
</body>

</html>