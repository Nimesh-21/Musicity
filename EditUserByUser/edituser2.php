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
$userID = $_GET['userID'];
echo $userID;

if(isset($_POST['userName'])){
    // $updatedName = $_POST['songName'];
    $sql = "UPDATE users SET username = '{$_POST['userName']}' WHERE user_id = '{$userID}';";
    if ($conn->query($sql)) {
        header('location:../User%20Dashboard/index.php');
        // message("Successfully updated song name", 'success');
    } else {
        echo "failed username";
    }
}


if(isset($_POST['Name'])){
    $sql = "UPDATE users SET name = '{$_POST['Name']}' WHERE user_id = '{$userID}';";
    if ($conn->query($sql)) {
        header('location:../User%20Dashboard/index.php');
        // message("Successfully updated song name", 'success');
    } else {
        echo "failed username";
    }
}


if(isset($_POST['age'])){
    $sql = "UPDATE users SET age = '{$_POST['age']}' WHERE user_id = '{$userID}';";
    if ($conn->query($sql)) {
        header('location:../User%20Dashboard/index.php');
    } else {
        echo "failed age";
    }
}


if(isset($_POST['password'])){
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET user_password = '{$password}' WHERE user_id = '{$userID}';";
    if ($conn->query($sql)) {
        header('location:../User%20Dashboard/index.php');
    } else {
        echo "failed password";
    }
}


if(isset($_POST['gender'])){
    $sql = "UPDATE users SET gender = '{$_POST['gender']}' WHERE user_id = '{$userID}';";
    if ($conn->query($sql)) {
        header('location:../User%20Dashboard/index.php');
    } else {
        echo "failed gender";
    }
}

