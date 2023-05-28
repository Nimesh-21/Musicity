<!DOCTYPE html>
<html lang="en">
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

$userID = $_SESSION['user']['user_id'];
// echo $userID;
$sql4 = "SELECT * FROM `users` WHERE user_id = '{$userID}'";
$singleUser = array();
$res4 = mysqli_query($conn, $sql4);
$result4 = mysqli_fetch_assoc($res4);

// echo $result4['username'];

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/responsive.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/utils.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../Utils/bootstrap.css">
    <title>Musicity</title>
</head>

<body>
    <nav class="navbar" style="padding: 0px;">
        <div class="logo">
            <img src="IMG/pngegg.png" alt="Logo">
            <h1 class="head" style="font-size: 25px; padding-top:3px">M u s i C i t y</h1>
        </div>
        <ul class="navlist">
            <li><a href="../User Dashboard/index.php">Home</a></li>
            <li><a href="../All Songs/index.php">All Songs</a></li>
            <li><a href="../My Songs/index.php">My Songs</a></li>
            <li><a href="../Upload Songs/index.php">Upload Songs</a></li>
            <li><a href="../EditUserByUser/edituser1.php">Edit Info</a></li>
            <li><a id="logout" href="../Logout/logout.php">Log Out</a></li>
        </ul>
    </nav>
    <section class="welcome" style="padding: 0px;">
        <big><b style="font-size:smaller;"> Edit your Information </b>
        </big>


    </section>


    <section class="content">
        <form class="m-5" action="./edituser2.php?userID=<?php echo $userID ?>" method="post" enctype="multipart/form-data">

            <div class="form-group m-4">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $result4['username'] ?>" name="userName">
            </div>
            <div class="form-group m-4">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $result4['name'] ?>" name="Name">
            </div>

            <div class="form-group m-4">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" placeholder="" name="password">
            </div>

            <div class="form-group m-4">
                <label for="exampleInputEmail1">Age</label>
                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $result4['age'] ?>" name="age">
            </div>

            <div class="field">
                
                <select name="gender" style="margin:5px 23px;height: 40px;
              width: 120px;
              outline: none;
              
              border-radius: 5px;
              border: 1px solid lightgrey;
              border-bottom-width: 2px;
              font-size: 17px;
              transition: all 0.3s ease;" id="" class="select">
                    <option disabled selected value="">&nbsp Gender</option>
                    <option value="male">&nbsp Male</option>
                    <option value="female">&nbsp Female</option>
                    <option value="other">&nbsp Other</option>
                </select>
            </div>

            <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" value="Update" class="btn btn-primary btn m-3" >
            </div>
        </form>
    </section>
    <footer class="ftrr" style="display: flex;justify-content:center;align-items:center">
        <p class="copyright12345">
            Copyright &copy 2022; Musicity All Rights Reserved.
        <p class="copyright12345">
            &nbsp An Initiative By DON
        </p>
        </p>
    </footer>

</body>
<script src="JS/script.js"></script>

</html>