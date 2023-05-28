<?php
session_start();
if (isset($_SESSION['user'])) {
    //echo("<pre>Logged in");
    //print_r($_SESSION['user']); 
} else {
    header("Location: ../User%20Login/login.html");
    die();
}
include('../Utils/DBconn.php');
include('../Utils/Functions.php');
// $genre = $_POST['genre'];
// $artist = $_POST['artist'];
// $current = $_SESSION['user']['user_id'];
// echo $_POST['songName'];
// echo $genre;
?><br>

<?php
$id = $_GET['SongID'];
echo $id;
$updatedName;
if (isset($_POST['songName'])) {
    $updatedName = $_POST['songName'];
    $sql = "UPDATE song SET song_name = '{$updatedName}' WHERE song_id = '{$id}';";
    if ($conn->query($sql)) {
        echo "Successfully updated song name";
        message("Successfully updated song name", 'success');
    } else {
        echo "failed song name";
    }
};

// include('./Upload%20Songs/')

if (isset($_FILES['songPhoto']['error'])) {
    // echo "Photo uploaded";
    $movePhoto = "./UploadedPhoto/" . time() . "_" .  $_FILES['songPhoto']['name'];
    // $movePhoto = "./UploadedPhoto/" ."_".time()."_".  $_FILES['songPhoto']['name'];
    $photoPath = "_" . time() . "_" .  $_FILES['songPhoto']['name'];

    $sql = "UPDATE song SET song_photo_path = '{$photoPath}' WHERE song_id = '{$id}';";
    if (move_uploaded_file($_FILES['songPhoto']['tmp_name'], $movePhoto)) {
        echo "New Photo uploaded";
        if ($conn->query($sql)) {
            echo "Successfully udated song photo path";
        } else {
            echo "failed phtot path";
        }
    }
}

if (isset($_POST['genre'])) {
    $updatedGenre = $_POST['genre'];
    $sql = "UPDATE song SET genre = '{$updatedGenre}' WHERE song_id = '{$id}';";
    if ($conn->query($sql)) {
        echo "Successfully updated song name";
        message("Successfully updated song genre", 'success');
    } else {
        echo "failed song genre";
    }
}

if (isset($_POST['artist'])) {

    $updatedArtist = $_POST['artist'];
    $curr_artist = get_artist_by_artist_name($conn, $updatedArtist);
    // echo $curr_artist['artist_id'];
    $sql = "UPDATE song SET artist_id = '{$curr_artist['artist_id']}' WHERE song_id = '{$id}';";
    if ($conn->query($sql)) {
        echo "Successfully updated song name";
        message("Successfully updated song artist id", 'success');
    } else {
        echo "failed song artist id";
    }
}
header('location:../Editsongadmin/index.php');
