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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../Utils/bootstrap.css">
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
    <nav class="navbar" style="padding: 0px;">
        <div class="logo">
            <img src="IMG/pngegg.png" alt="Logo">
            <h1 class="head" style="font-size: 25px; padding-top:3px">M u s i C i t y</h1>
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
        <big><b style="text-align: center;">Search By Category</b>
        </big>
        </section>
        <form class="m-5" action="searching.php" method="post" enctype="multipart/form-data">
        <div class="form-group m-4">
                <label for="artist">Search By Artist</label>
                <select class="form-control" name="artist">
                <option value='-1' selected>Search By Artist</option>
                <?php
            foreach ($Artist as $key  => $a) :
            ?>
                <option value="<?php echo $a['artist_id'] ?>"><?php echo $a['artist_name'] ?> :&nbsp; 
                <?php echo $a['artist_username'] ?></option>
            <?php endforeach ?>
                </select>
            </div>

            <div class="form-group m-4">
                <label for="genre">Search By Genre</label>
                <select class="form-control" name="genre">
                    <option value="srchg" selected>Search By Genre</option>
                <?php
            foreach ($Genre as $key  => $a) :
            ?>
                <option value="<?php echo $a['genre_name'] ?>"><?php echo $a['genre_name'] ?></option>
            <?php endforeach ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn mx-4">Search Song</button>
            </form>
   
    <footer style="display:flex; margin-top: 170px; width:100%">
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