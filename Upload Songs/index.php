<!DOCTYPE html>
<html lang="en">
<?php
include('../Utils/DBconn.php');
$sql = "SELECT * FROM `genres`;";
$Genre = array();
$res = $conn->query($sql);
while ($data = $res->fetch_assoc()) {
    array_push($Genre, $data);
}

$Artist = array();
$sql2 = "SELECT * FROM `artist`;";
$res2 = $conn->query($sql2);
while ($data = $res2->fetch_assoc()) {
    array_push($Artist, $data);
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/responsive.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/utils.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="">
    <title>Musicity</title>
</head>

<body>
    <nav class="navbar" style="padding: 0px;">
        <div class="logo">
            <img src="IMG/pngegg.png" alt="Logo">
            <h1 class="head"  style="font-size: 25px; padding-top:3px">M u s i C i t y</h1>
        </div>
        <ul class="navlist">
            <li><a href="../User Dashboard/index.php">Home</a></li>
            <li><a href="../All Songs/index.php">All Songs</a></li>
            <li><a href="../My Songs/index.php">My Songs</a></li>
            <li><a href="../Search/searchbygenre.php">Search</a></li>
            <li><a href="./index.php">Upload Songs</a></li>
            <li><a href="../EditUserByUser/edituser1.php">Edit Info</a></li>
            <li><a id="logout" href="../Logout/logout.php">Log Out</a></li>
        </ul>
    </nav>
    <section class="welcome">
        <big><b>Upload Your Latest Song Now</b>
        </big>


    </section>


    <section class="content">
        <form class="m-5" action="uploadSong.php" method="post" enctype="multipart/form-data">
            <div class="form-group m-4">
                <label for="exampleInputEmail1">Song Name :</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your Masterpiece"
                    name="songName">

            </div>

            <div class="form-group m-4">
                <label for="exampleFormControlFile1">Upload Your Song Cover</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="songPhoto">
            </div>


            <div class="form-group m-4">
                <label for="exampleFormControlFile2">Upload The Song</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile2" name="songFile">
            </div>
            <div class="form-group m-4">
                <label for="artist">Select The Artist</label>
                <select class="form-control" name="artist">
                <option value="" selected>Select The Artist</option>
                <?php
            foreach ($Artist as $key  => $a) :
            ?>
                <option value="<?php echo $a['artist_name'] ?>"><?php echo $a['artist_name'] ?> :&nbsp; 
                <?php echo $a['artist_username'] ?></option>
            <?php endforeach ?>
                </select>
            </div>
            <div class="form-group m-4">
                <label for="genre">Select the Genre</label>
                <select class="form-control" name="genre">
                    <option value="" selected>Select Your Genre</option>
                <?php
            foreach ($Genre as $key  => $a) :
            ?>
                <option value="<?php echo $a['genre_name'] ?>"><?php echo $a['genre_name'] ?></option>
            <?php endforeach ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn mx-4">Upload The Song</button>
        </form>
    </section>
    <footer class="ftrr">
        <p class="copyright12345">
            Copyright &copy 2022; Musicity All Rights Reserved.
        <p class="copyright12345">
            &nbsp An Initiative By DON
        </p>
        </p>
    </footer>

</body>
<script src="JS/script.js"></script>

</html>