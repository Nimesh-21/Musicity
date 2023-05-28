<?php 
session_start();
if (isset($_SESSION['admin'])) {
    //echo("<pre>Logged in");
    //print_r($_SESSION['user']); 
} else {
    header("Location: ../User%20Login/login.html");
    die();
}?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/responsive.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/utils.css">
    <link rel="stylesheet" href="../Utils/bootstrap.css">
    <title>Musicity</title>
</head>

<body>
    <nav class="navbar" style="padding: 0px;">
        <div class="logo">
            <img src="IMG/pngegg.png" alt="Logo">
            <h1 class="head" style="font-size: 25px; padding-top:3px">M u s i C i t y</h1>
        </div>
        <ul class="navlist">
            <li><a href="../Admin Dashboard/index.php">Home</a></li>
            <li><a href="../Edituseradmin/index.php">Edit Users</a></li>
            <li><a href="../Editsongadmin/index.php">Edit Songs</a></li>
            <li><a href="../Editartistadmin/index.php">Edit Artists</a></li>
            <li><a id="logout" href="../Logout/logout.php">Log Out</a></li>
        </ul>
    </nav>
    <section class="welcome">
        <big><b>Administration</b>
        </big>
    </section>

    <div class="bs-example">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                       
                        <h2 class="pull-left" style=" font-size: 35px; padding:10px 1px">Users List</h2>
                     
                    </div>
                    <h4 style="font-style: italic;padding: 12px 1px;"> Number Of Users :  <?php
                    include('../Utils/DBconn.php');
                    $numuser = "SELECT COUNT(*) FROM `users`";
                    $resnum = mysqli_query($conn, $numuser);
                    $result2 = mysqli_fetch_assoc($resnum);
                    echo $result2['COUNT(*)'];

                   
                    ?></h4>
                   


                    <?php
                    include('../Utils/DBconn.php');
                    $sql = "SELECT * FROM `users`";
                    $res = mysqli_query($conn, $sql);
                    ?>


                    <table class="table table-bordered table-striped">
                        <tr style="background-color: rgb(74, 8, 110); ">
                            <th style="color: white;font-size: 20px;">User ID</th>
                            <th style="color: white; font-size: 20px;">Name</th>
                            <th style="color: white; font-size: 20px;">Username</th>
                            <th style="color: white; font-size: 20px;">Gender</th>
                            <th style="color: white; font-size: 20px;">Age</th>
                            <th style="color: white; font-size: 20px;">Action</th>
                        </tr>
                        <?php
                        $i = 0;
                        while ($result = mysqli_fetch_assoc($res)) {
                        ?>
                            <tr>
                                <td><?php echo $result["user_id"]; ?></td>
                                <td><?php echo $result["name"]; ?></td>
                                <td><?php echo $result["username"]; ?></td>
                                <td><?php echo $result["gender"]; ?></td>
                                <td><?php echo $result["age"]; ?></td>
                                <td><button class="btn btn-danger mx-2"><?php echo '<a href="deleteuser.php?uid=' . $result['user_id'] . '" style="text-decoration:none;color:white">Delete</a>' ?></button></td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </table>





                </div>
            </div>
        </div>
    </div>

    <footer>
        <p class="copyright">
            Copyright &copy 2022; Musicity All Rights Reserved.
        <p class="copyright">
            &nbsp An Initiative By DON
        <p></p>
        </p>
        </p>


    </footer>

</body>
<script src="JS/script.js"></script>

</html>