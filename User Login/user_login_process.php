<?php
session_start();
include('../Utils/DBconn.php');
$username = $_POST['username'];
$password = $_POST['password'];
include('../Utils/Functions.php');
$u = get_user_by_username($conn, $username);
if (empty($u)) {
    // message("Username does not exists on database","danger");
    // echo ("Username does not exists on database");
    header('location: ../User Login/notexist.html');
    die();
}
$hash = $u['user_password'];
if ($hash == $password) {
    // message("Your account was logged in successfully","success");
    echo ("Your account was logged in successfully");
    $_SESSION['user'] = $u;
    // header("Location: ../test/test.php");
    header("Location: ../User Dashboard/index.php");
    die();
} else {
    // message("You entered wrong password.","danger");
    // echo ("You entered wrong password.");
    header('location: wrongpass.html');
    die();
}

