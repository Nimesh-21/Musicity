
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
    <link rel="stylesheet" href="">
    <title>Musicity</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik+Distressed&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap');

    .tagline {
        font-family: 'Rubik Distressed', cursive;
        font-size: 1.7rem;

    }

    .explore {
        font-family: 'Dancing Script', cursive;
        font-size: 2rem;
        /* padding: 20px; */
        text-align: center;

        border: 2px solid purple;
        padding: 10px 10px;
        margin: 20px auto;
        width: 200px;
        display: block;
        box-shadow: 2px 2px 2px 1px purple;
    }

    .more {
       text-decoration: none;
        font-size: 1.1rem;
        color: purple;
        text-align: center;
        font-weight: bolder;

        border: 2px solid lightsalmon;
        padding: 5px 5px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 20px;
        margin-top: 8px;
        width: 100px;
        display: block;
        box-shadow: 1px 1px 1px 0.5px lightsalmon;
    }

    .allsongs {
        margin-top: 25px;
        margin-left: 25px;
        margin-right: 25px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
    }

    .song img {
        width: 180px;
        border-radius: 15px;
    }

    .song {
        display: flex;
        justify-content: space-evenly;
        /* background-color: rgba(238, 235, 235, 0.838); */
        background-color: rgb(241, 243, 244);
        padding: 15px;
        border-radius: 10px;
        margin: 15px;
    }

    .songinfo {
        padding: 10px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
    }

    h3 {
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        font-size: 20px;
        padding: 2px;
    }

    p {
        font-family: cursive;
        font-weight: 300;
        font-size: 14px;
        padding: 2px;
    }

    h5 {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-weight: 400;
        font-size: 13px;
        padding: 2px;
    }
</style>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="IMG/pngegg.png" alt="Logo">
            <h1 class="head">M u s i C i t y</h1>
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
        <big ><b>Administration</b>
              </big>
          </section>
    
          <section class="content" style="background-color: rgb(252,252,251); display:flex; align-items:center ; justify-content:space-evenly;">
        <img style="width: 400px;" src="https://media.tenor.com/QM-si3_EAyIAAAAC/listening-to-music-dancing.gif" alt="">
        <p class="tagline" style="font-family: 'Rubik Distressed', cursive;">
            Life without music is like a journey without a road
        </p>
    </section>
    <section>
        <p class="explore">Explore Now !</p>
        <div class="allsongs">

            <?php
            
            include('../Utils/DBconn.php');
            $sql = "SELECT * FROM `song` GROUP BY RAND() LIMIT 2";
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
           </div>
       </div>';
            }
            ?>

        </div>

        <p><a class="more" href="../Editsongadmin/index.php">More Songs</a></p>
    </section>

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