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
            <li><a href="../User Dashboard/index.php">Home</a></li>
            <li><a href="../All Songs/index.php">All Songs</a></li>
            <li><a href="../My Songs/index.php">My Songs</a></li>
            <li><a href="../Search/searchbygenre.php">Search</a></li>
            <li><a href="../Upload Songs/index.php">Upload Songs</a></li>
            <li><a href="../EditUserByUser/edituser1.php">Edit Info</a></li>
            <li><a id="logout" href="../Logout/logout.php">Log Out</a></li>
        </ul>
    </nav>
    <section class="welcome">
        <big><b>All Songs</b>
        </big>
    </section>


    <div class="allsongs">
       
        <?php
        
        include('../Utils/DBconn.php');
        session_start();
       
        if (isset($_SESSION['user'])) {

        $current_user = $_SESSION['user']['user_id'];
        $username = $_SESSION['user']['name'];
        $sql = "SELECT * FROM `song` WHERE user_id=$current_user";
        $res = mysqli_query($conn, $sql);
        
        $sql2 = "SELECT COUNT(*) FROM song WHERE user_id=$current_user";
        $res2 = mysqli_query($conn, $sql2);

        $result2 = mysqli_fetch_assoc($res2);
        // echo $result2['COUNT(*)'];

        if ($result2['COUNT(*)']==0) {
            echo '<h4 style="font-style: italic ;">Hey '.$username.' Please Upload Songs</h4>';

        }
        // if ($result==NULL) {
            
            // echo '<h4 style="font-style: italic ;">Hey '.$username.' Please Upload Songs</h4>';
       
        // }
        while ($result = mysqli_fetch_assoc($res)) {
            $artid = $result['artist_id'];
            $sqlart = "SELECT `artist_name` FROM `artist` WHERE `artist_id`=$artid";
            $resart = mysqli_query($conn, $sqlart);
            $resultart = mysqli_fetch_assoc($resart);
            echo ' <div class="song">
            <img style="width:180px ;height: 180px;" src="../Upload Songs/UploadedPhoto/'.$result['song_photo_path'].'" alt="Image">
            <div class="songinfo">
                <div class="songname">
                    <h3>'.$result['song_name'].'</h3>
                    <p>By '.$resultart['artist_name'].'</p>
                    <h5>'.$result['genre'].'</h5>
                </div>
                <audio controls>
                    <source src="../Upload Songs/UploadedSongs/'.$result['song_path'].'" type="audio/mpeg">
                </audio>
                <div>
                <button type="button" class="btn btn-info mx-2" ><a href="editsong1.php?songID='.$result['song_id'].'" style="text-decoration: none; color:white">Edit</a></button>
                <button type="button" class="btn btn-danger mx-2" ><a href="deletesong.php?sid='.$result['song_id'].'" style="text-decoration: none; color:white">Delete</a></button>

            </div>
            </div>
        </div>';
        }
    }
    else {
        header("Location: ../User%20Login/login.html");
        die();
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