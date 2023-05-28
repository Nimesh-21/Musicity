<?php
// include('./DBconn.php');

$DB_USERNAME = "root";
$DB_PASS = "";
$DB_HOSTNAME = "localhost";
$DB_NAME = 'musicity';
$conn = mysqli_connect($DB_HOSTNAME, $DB_USERNAME, $DB_PASS, $DB_NAME) or die('DATABASE CONNECTION ERROR');

function get_user_by_username($conn, $username)
{
    $sql = "SELECT * FROM users WHERE username = '{$username}'";
    $res = $conn->query($sql);
    $data = $res->fetch_assoc();
    if ($data == null) {
        return array();
    } else {
        return $data;
    }
}

function message($body, $type)
{
    $_SESSION['message']['body'] = $body;
    $_SESSION['message']['type'] = $type;
}

function get_admin_by_adminname($conn, $adminname)
{
    $sql = "SELECT * FROM admin WHERE admin_id = '{$adminname}'";
    $res = $conn->query($sql);
    $data = $res->fetch_assoc();
    if ($data == null) {
        return array();
    } else {
        return $data;
    }
}

function get_all_artists($conn)
{
    $sql = "SELECT * FROM artist";
    $res = $conn->query($sql);
    $data = $res->fetch_assoc();
    if ($data == null) {
        return array();
    } else {
        return $data;
    }
}

function get_artist_by_artist_name($conn, $artist)
{
    $sql = "SELECT * FROM artist WHERE artist_name = '{$artist}'";
    $res = $conn->query($sql);
    $data = $res->fetch_assoc();
    if ($data == null) {
        return array();
    } else {
        return $data;
    }
}
