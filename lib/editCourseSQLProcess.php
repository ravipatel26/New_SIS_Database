<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>
<?php

$courseName = $courseCode = $departmentName = $deptId = '';

$coursEdit = new AdminSystem();

echo print_r($_POST);
$courseId=$_POST['courseId'];
if(!empty($_POST['courseName'])){
    $courseName = $_POST['courseName'];
    $courseName = $coursEdit->escape($courseName);
    $courseName = strtoupper($courseName);
}

if(!empty($_POST['courseCode'])){
    $courseCode = $_POST['courseCode'];
    $courseCode = $coursEdit->escape($courseCode);

}

if(!empty($_POST['department'])) {
    $departmentName = $_POST['department'];
    $deptId = $coursEdit->getDepartementID($departmentName);

}

echo $courseCode.' '.$courseName.' '.$departmentName.' '.$deptId;


$query = "update course set courseName='$courseName', courseNameCode='$courseCode', deptId='$deptId' WHERE  courseId='$courseId'";
$coursEdit->addCourses($query);

$_SESSION['success'] = true;
header("Location: ../management/courseInformationEditForm.php");
?>
