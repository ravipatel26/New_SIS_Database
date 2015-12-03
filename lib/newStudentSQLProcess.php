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
$firstName = $lastName = $birthDate = $gender = $address = $city = $province = $postalCode = $country = $name = $position = '';

# Student info
$studentNumber = $phoneNumber = $email = $status = $type = $level = $program = $department = '';

$newStudent = new AdminSystem();

if(isset($_POST['submit'])) var_dump($_POST);

$firstName = $newStudent->escape($_POST['firstName']);
$lastName = $newStudent->escape($_POST['lastName']);

$name = $firstName." ".$lastName;
//$name = $newStudent->escape($name);

$birthDate = $_POST['birthDate'];
$birthDate = $newStudent->escape($birthDate);

if(isset($_POST['gender'])) {
    $gender = $_POST['gender'];
    $gender = $newStudent->escape($gender);
}

$address = $_POST['address'];
$address = $newStudent->escape($address);

$city = $_POST['city'];
$city = $newStudent->escape($city);

$province = $_POST['province'];
$province = $newStudent->escape($province);

$postalcode = $_POST['postalCode'];
$postalcode = $newStudent->escape($postalcode);

if(isset($_POST['country'])) {
    $country = $_POST['country'];
    $country = $newStudent->escape($country);
}


$phoneNumber = $_POST['phoneNumber'];
$phoneNumber = $newStudent->escape($phoneNumber);

$email = $_POST['email'];
$email = $newStudent->escape($email);

$studentNumber = $_POST['studentNumber'];
$studentNumber = $newStudent->escape($studentNumber);

if(isset($_POST['status'])) {
    $status = $_POST['status'];
    $status = $newStudent->escape($status);
}

if(isset($_POST['type'])) {
    $type = $_POST['type'];
    $type = $newStudent->escape($type);
}


$level = $_POST['level'];
$level = $newStudent->escape($level);

$program = $_POST['program'];
$program = $newStudent->escape($program);

if(isset($_POST['department'])) {
    $department = $_POST['department'];
    $department = $newStudent->escape($department);
    $deptId = $newStudent->getDepartementID($department);
}


$position = $_POST['position'];
$position = $newStudent->escape($position);

$summer = $_POST['summer'];



$address = $address.','.$city.','.$province.','.$country.','.$postalcode;

echo print_r($_POST).'</br>'.$address;

$studentId = 0;
$_SESSION['success'] = false;

$query = "INSERT INTO Students (studentName, studentNumber, studentEmail, studentStatus, studentPhone, studentGender, studentBirthDate, deptId, studentAdress) VALUES ( '$name', '$studentNumber', '$email', '$status', '$phoneNumber', '$gender', '$birthDate', '$deptId', '$address')";

$studentId=$newStudent->addNewStudent($query);

if(!empty($level)){
    $query = "INSERT INTO GraduateStudent (studentId, studentLevel, currentPosition) VALUES ('$studentId', '$level', '$position')";
    $newStudent->addGraduateStudent($query);
}


if(!empty($summer)){
    $query = "INSERT INTO UnderGraduateStudent (studentId, summerStudent) VALUES ('$studentId', '$summer')";
    $newStudent->addUnderGraduateStudent($query);
}


if($studentId>0){
    $_SESSION['success'] = true;
    header("Location: ../management/studentForm.php");
}


?>

