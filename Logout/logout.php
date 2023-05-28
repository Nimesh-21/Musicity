<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['pass']);
unset($_SESSION);
session_destroy();

header('Location: ../Home/index.html');
?>
