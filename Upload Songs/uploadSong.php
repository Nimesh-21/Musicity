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
$genre = $_POST['genre'];
$artist = $_POST['artist'];
$current = $_SESSION['user']['user_id'];
// echo $_POST['songName'];
echo $genre;
?><br>
<?php

// echo $_FILES['songFile']['tmp_name'];
?><br>
<?php
echo $artist;
// echo $_FILES['songFile']['name'];
?><br>
<?php
echo  $current;
// echo $_FILES['songPhoto']['tmp_name'];
?><br>
<?php
// echo $_FILES['songPhoto']['name'];
?>
<?php
$moveSong = "./UploadedSongs/" ."_".time()."_". $_FILES['songFile']['name'];
$song_path = "_".time()."_". $_FILES['songFile']['name'];
$movePhoto = "./UploadedPhoto/" ."_".time()."_".  $_FILES['songPhoto']['name'];
$song_photo_path = "_".time()."_".  $_FILES['songPhoto']['name'];
move_uploaded_file($_FILES['songFile']['tmp_name'], $moveSong);
move_uploaded_file($_FILES['songPhoto']['tmp_name'], $movePhoto);
$curr_artist = get_artist_by_artist_name($conn, $artist);
echo $curr_artist['artist_id'];

// echo "$genre";
?><br>
<?php
// echo $_POST["artist"];

?><br>
<?php
// echo "Transfer Complete";
$SQL = "INSERT INTO `song`(`song_name`, `song_path`, `song_photo_path`, `artist_id`, `user_id`, `genre`) VALUES ('{$_POST['songName']}','{$song_path}','{$song_photo_path}','{$curr_artist['artist_id']}','{$current}','{$_POST['genre']}')";
// $SQL = "INSERT INTO `song`(`song_id`, `song_name`, `song_path`, `song_photo_path`, `artist_id`, `user_id`, `genre`) VALUES ('','mera gaana','gaanekarasts','photokarasta','','','poop')";
if($conn->query($SQL)){
    // echo "Song Uploaded";
    header("Location: ../All Songs/alert.php");
}
else{
    // echo "Something went wrong";
}
