<?php 
	session_start(); 
	if(isset($_SESSION['user'])){
		//echo("<pre>Logged in");
		//print_r($_SESSION['user']); 
	}else{
		header("Location: ../User%20Login/login.html");
		die();
	}
	// include 'files/functions.php';
    include '../Utils/DBconn.php';
    // include '../User%20Login/login.html'
	$current_user = $_SESSION['user']['user_id']; 
    echo $_SESSION['user']['username'];
    echo $_SESSION['user']['gender'];
    echo $current_user;
	// $songs = get_all_songs_by_user($conn,$current_user);
    
?>