<?php 
session_start();
if (isset($_SESSION['admin'])) {
    //echo("<pre>Logged in");
    //print_r($_SESSION['user']); 
} else {
    header("Location: ../Admin%20Login/login.html");
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
    <div class="allsongs">
        <?php

        ?>

        <!-- <div class="song">
            <img src="./IMG/Biebs and Chill.jpg" alt="Image">
            <div class="songinfo">
                <div class="songname">
                    <h3>Kesariya</h3>
                    <h6>Arjit Singh</h6>
                    <h5>Classical</h5>
                </div>
                <audio controls>
                    <source src="../Upload Songs/UploadedSongs/'.$result['song_path'].'" type="audio/mpeg">
                </audio>
                <div>
                    <button type="button" class="btn btn-info m-2"><a href="" style="text-decoration: none; color:white">Edit</a></button>
                    <button type="button" class="btn btn-danger m-2"><a href="" style="text-decoration: none; color:white">Delete</a></button>

                </div>
            </div>
        </div> -->

        <?php
        include('../Utils/DBconn.php');
        $sql = "SELECT * FROM `song`";
        $res = mysqli_query($conn, $sql);
        while ($result = mysqli_fetch_assoc($res)) {
            $artid = $result['artist_id'];
            $sqlart = "SELECT `artist_name` FROM `artist` WHERE `artist_id`=$artid";
            $resart = mysqli_query($conn, $sqlart);
            $resultart = mysqli_fetch_assoc($resart);
            echo ' <div class="song">
            <img src="../Upload Songs/UploadedPhoto/' . $result['song_photo_path'] . '" alt="Image">
            <div class="songinfo">
                <div class="songname">
                    <h3>' . $result['song_name'] . '</h3>
                    <p>By ' . $resultart['artist_name'] . '</p>
                    <h5>' . $result['genre'] . '</h5>
                </div>
                <audio controls>
                    <source src="../Upload Songs/UploadedSongs/' . $result['song_path'] . '" type="audio/mpeg">
                </audio>
                <div>
                <button type="button" class="btn btn-info m-2"><a href="editsong1.php?songID=' . $result['song_id'] . '" style="text-decoration: none; color:white">Edit</a></button>
                <button type="button" class="btn btn-danger m-2"><a href="deletesong.php?sid=' . $result['song_id'] . '" style="text-decoration: none; color:white">Delete</a></button>

            </div>
            </div>
        </div>';
        }
        ?>



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