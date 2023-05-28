<?php
session_start();
include('../Utils/Functions.php');
// $first_name = $_POST['first_name'];
// $last_name = $_POST['last_name'];
$username = $_POST['username'];
$name=$_POST['name'];
$password = $_POST['password'];
$confPassword = $_POST['confPassword'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$artist = $_POST['artist'];


// if ($artist == "yes") {
// 	echo "Checkbox ticked";
// }

// echo $username;
// echo $password;
// echo $gender;
// echo $age;






// hashing the password
$password = password_hash($password, PASSWORD_DEFAULT);

$u  = get_user_by_username($conn, $username);


if (!empty($u)) {
	// message("User with same username already exists on database","danger");
	echo "User with same username already exists on database";
	header("Location: ../Sign Up/alreadyexi.html");
	die();
}
if (password_verify($password,$confPassword)) {
	echo "Passwords do not match!!";
	header("Location: ../Sign Up/login.html");
	die();
}


// $last_seen = time();
// $reg_date = time();

$sql_1 = "INSERT INTO `users`(`name`,`user_password`, `username`, `gender`, `age`) VALUES ('$name','$password','$username','$gender',$age)";
$sql2 = "INSERT INTO `artist`(`artist_name`, `artist_username`) VALUES ('$name','$username')";

 	if($artist!="yes"){
		$conn->query(($sql_1));
		$u  = get_user_by_username($conn,$username);
		message("Your account was created successfully","success");
		echo "Your account was created successfully";
		$_SESSION['user'] = $u;
		header("Location: ../User%20Dashboard/index.php");
		die();
 	}
	
	else if($artist=="yes")
	{
		$conn->query(($sql_1));
		$conn->query(($sql2));
		$u  = get_user_by_username($conn,$username);
		message("Your account was created successfully","success");
		echo "Your account was created successfully";
		$_SESSION['user'] = $u;
		header("Location: ../User%20Dashboard/index.php");
		die();
	}
	else{
		message("Something went wrong while creating your account. Please try again.","danger");
		echo "Something went wrong while creating your account. Please try again.";
		// header("Location: ../Sign up/login.html");
		// die();
 	}
