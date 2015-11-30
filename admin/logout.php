<?php
session_start();
unset($_SESSION['manager']);
unset($_SESSION['password']);
session_unset();

//session_destroy();
$_SESSION['logged']='false';

header('location:../adminLogin.php');
exit();

?>