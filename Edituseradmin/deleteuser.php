
<?php
session_start();
if (isset($_SESSION['admin'])) {
    //echo("<pre>Logged in");
    //print_r($_SESSION['user']); 
} else {
    header("Location: ../User%20Login/login.html");
    die();
}
include('../Utils/DBconn.php');
$id = $_GET["uid"];


$sql = "DELETE FROM `users` WHERE `user_id` = '$id'";
$res = mysqli_query($conn, $sql);
if ($res) {
    header('location:index.php');
} else {
    echo "User Deletion Failed";
}


?>