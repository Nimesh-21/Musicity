
<?php
include('../Utils/DBconn.php');
$id = $_GET["sid"];
echo $id;

$sql = "DELETE FROM `song` WHERE `song_id` = '$id'";
$res = mysqli_query($conn, $sql);
if ($res) {
    header('location:index.php');
} else {
    echo "User Deletion Failed";
}
?>