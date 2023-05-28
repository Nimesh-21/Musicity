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
    .search {
        margin: 20px 0px;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .searchbox {
        /* display: flex; */
        margin: 10px;
        width: 400px;

        ;
    }

    #inp {
        width: 250px;
        height: 25px;
        border: rgb(74, 8, 110) solid 1.5px;
        background-color: #EDE3FF;
        border-radius: 3px;
        padding: 2.5px 5px;
    }

    #searchbtn {
        padding: 5.2px;
        height: 33px;
        width: 70px;
        background-color: rgb(74, 8, 110);
        border: rgb(74, 8, 110) 1.5px solid;
        color: white;
        border-radius: 3px;
    }
</style>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="IMG/pngegg.png" alt="Logo">
            <h1 class="head">M u s i C i t y</h1>
        </div>
        <ul class="navlist">
            <li><a href="../User Dashboard/index.php">Home</a></li>
            <li><a href="../All Songs/index.php">All Songs</a></li>
            <li><a href="../My Songs/index.php">My Songs</a></li>
            <li><a href="./searchbygenre.php">Search</a></li>
            <li><a href="../Upload Songs/index.php">Upload Songs</a></li>
            <li><a href="../Admin Login/login.html">Edit Info</a></li>
            <li><a id="logout" href="../Logout/logout.php">Log Out</a></li>
        </ul>
    </nav>
    <section class="welcome">
        <big><b>Songs</b>
        </big>
    </section>
    <!-- <h3 ></h3> -->

    <!-- <section class="search">
        <form action="./search.php" method="POST">
            <div class="searchbox">
                <input type="text" id="inp">
                <button type="submit" id="searchbtn">Search</button>
            </div>
        </form>
    </section> -->


    <div class="allsongs">

        <?php
        include('../Utils/DBconn.php');
        $artist = $_POST['artist'];
        $genre=$_POST['genre'];

        if($artist==69 && $genre=="srchg")
        {
            header("location:./searchbygenre.php");
        }

        else if($artist!=-1 && $genre!="srchg")
        {
            $sql = "SELECT * FROM song WHERE artist_id=$artist AND genre='$genre'";
            $res = mysqli_query($conn, $sql);
            while ($result = mysqli_fetch_array($res)) {
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

        }

        else
        {
            $sql="SELECT * FROM song WHERE artist_id=$artist OR genre='$genre'";
           $res=mysqli_query($conn,$sql);
           while ($result = mysqli_fetch_array($res)) {
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
        }


        

        // $sql2 = "SELECT COUNT(*) FROM song WHERE artist_id=$artist OR genre=$genre";
        // $res2 = mysqli_query($conn, $sql2);
        // $row2 = mysqli_fetch_array($res2);
        // $count = $row2[0];
        // if ($count == 0) {
        //     echo '<h3 style="font-style:italic ;">No Results Found</h3>';
        // }

        

       
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