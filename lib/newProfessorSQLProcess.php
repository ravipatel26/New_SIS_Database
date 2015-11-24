<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

# General info
$firstName = $lastName = $name = '';

# Student info
$professNumber = $phoneNumber = $email = $department = '';

$newProfessor = new AdminSystem();

if(isset($_POST['submit'])) var_dump($_POST);

$firstName = $newProfessor->escape($_POST['firstName']);
$lastName = $newProfessor->escape($_POST['lastName']);

$name = $firstName." ".$lastName;
//$name = $newStudent->escape($name);

$phoneNumber = $_POST['phoneNumber'];
$phoneNumber = $newProfessor->escape($phoneNumber);

$email = $_POST['email'];
$email = $newProfessor->escape($email);

$professNumber = $_POST['professorNumber'];
$professNumber = $newProfessor->escape($professNumber);

if(isset($_POST['department'])) {
    $department = $_POST['department'];
    $department = $newProfessor->escape($department);
    $deptId = $newProfessor->getDepartementID($department);
}


echo print_r($_POST).'</br>';

$professorId = 0;
$_SESSION['success'] = false;

$query = "INSERT INTO professor (professorName, professorNumber, professorEmail, professorPhone,deptId) VALUES ( '$name', '$professNumber', '$email', '$phoneNumber', '$deptId')";

$professorId=$newProfessor->addNewProfessor($query);

if($professorId>0){
    $_SESSION['success'] = true;
    header("Location: ../management/studentForm.php");
}


?>

