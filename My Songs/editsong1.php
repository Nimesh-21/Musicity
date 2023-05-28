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

$id = $_GET['songID'];
// echo $id;

$sql3 = "SELECT * FROM `song` WHERE song_id = '{$id}' ;";
$singleSong = array();

$res3 = mysqli_query($conn, $sql3);
$result3 = mysqli_fetch_assoc($res3);
// echo $result3['song_name'];

$userid = $result3['user_id'];
// echo $userid;

$sql4 = "SELECT * FROM `users` WHERE user_id = '{$userid}'";
$singleUser = array();
$res4 = mysqli_query($conn, $sql4);
$result4 = mysqli_fetch_assoc($res4);


$sql1 = "SELECT * FROM `artist` WHERE artist_id = '{$result3['artist_id']}';";
$singleArtist = array();
$res5 = mysqli_query($conn, $sql1);
$result5 = mysqli_fetch_assoc($res5);

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
            <h1 class="head" style="font-size: 25px; padding-top:3px">M u s i C i t y</h1>
        </div>
        <ul class="navlist">
            <li><a href="../User Dashboard/index.php">Home</a></li>
            <li><a href="../All Songs/index.php">All Songs</a></li>
            <li><a href="../My Songs/index.php">My Songs</a></li>
            <li><a href="../Search/searchbygenre.php">Search</a></li>
            <li><a href="">Upload Songs</a></li>
            <li><a href="../EditUserByUser/edituser1.php">Edit Info</a></li>
            <li><a id="logout" href="../Logout/logout.php">Log Out</a></li>
        </ul>
    </nav>
    <section class="welcome">
        <big><b> Hey <?php echo $result4['username']; ?>, Let's edit your Song! </b>
        </big>


    </section>


    <section class="content">
        <form class="m-5" action="../Upload Songs/editsong2.php?SongID=<?php echo $id ?>" method="post" enctype="multipart/form-data">
            <div class="form-group m-4">
                <label for="exampleInputEmail1">Song Name :</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $result3['song_name'] ?>"
                    name="songName">

            </div>

            <div class="form-group m-4">
                <label for="exampleFormControlFile1">Update Your Song Cover</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="songPhoto">
            </div>
            <div class="form-group m-4">
                <label for="artist">Select The Artist</label>
                <select class="form-control" name="artist">
                <option value="" selected><?php echo $result5['artist_name'] ?></option>
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
                    <option value="" selected><?php echo $result3['genre'] ?></option>
                <?php
                foreach ($Genre as $key  => $a) :
                ?>
                <option value="<?php echo $a['genre_name'] ?>"><?php echo $a['genre_name'] ?></option>
            <?php endforeach ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn mx-4">Update The Song</button>
        </form>
    </section>
    <footer class="ftrr">
        <p class="copyright12345" style="display: flex; justify-content:center">
            Copyright &copy 2022; Musicity All Rights Reserved.
        <p class="copyright12345">
            &nbsp An Initiative By DON
        </p>
        </p>
    </footer>

</body>
<script src="JS/script.js"></script>

</html>