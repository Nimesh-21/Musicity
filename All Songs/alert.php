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

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="IMG/pngegg.png" alt="Logo">
            <h1 class="head">M u s i C i t y</h1>
        </div>
        <ul class="navlist">
            <li><a href="../User Dashboard/index.php">Home</a></li>
            <li><a href="#All">All Songs</a></li>
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
        $sql = "SELECT * FROM `song`";
        $res = mysqli_query($conn, $sql);
        while ($result = mysqli_fetch_assoc($res)) {
            $artid = $result['artist_id'];
            $sqlart = "SELECT `artist_name` FROM `artist` WHERE `artist_id`=$artid";
            $resart = mysqli_query($conn, $sqlart);
            $resultart = mysqli_fetch_assoc($resart);

            echo ' <div class="song">
            <img src="../Upload Songs/UploadedPhoto/'.$result['song_photo_path'].'" alt="Image">
            <div class="songinfo">
                <div class="songname">
                    <h3>'.$result['song_name'].'</h3>
                    <p>By '.$resultart['artist_name'].'</p>
                    <h5>'.$result['genre'].'</h5>
                </div>
                <audio controls>
                    <source src="../Upload Songs/UploadedSongs/'.$result['song_path'].'" type="audio/mpeg">
                </audio>
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
<script>
    alert("Congratulations!!\n Your Song has been Uploaded Succesfully.");
</script>

</html>