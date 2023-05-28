<?php
session_start();
include('../Utils/DBconn.php');
$adminname = $_POST['admin_name'];
$password = $_POST['admin_passwd'];
include('../Utils/Functions.php');
$u = get_admin_by_adminname($conn, $adminname);
if (empty($u)) {
    // message("Username does not exists on database","danger");
    echo ("Admin does not exists on database");
    // header('location: login.php');
    die();
}
$hash = $u['admin_password'];
if ($hash == $password) {
    // message("Your account was logged in successfully","success");
    echo ("Your account was logged in successfully");
    $_SESSION['admin'] = $u;
    header("Location: ../Admin Dashboard/index.php");
    die();
} else {
    // message("You entered wrong password.","danger");
    echo ("You entered wrong password.");
    // header('location: login.php');
    die();
}
