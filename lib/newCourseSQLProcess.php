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

$courseList = new AdminSystem();

echo print_r($_POST);

    if(!empty($_POST['courseName'])){
        $courseName = $_POST['courseName'];
        $courseName = $courseList->escape($courseName);
    }

    if(!empty($_POST['courseCode'])){
        $courseCode = $_POST['courseCode'];
        $courseCode = $courseList->escape($courseCode);

    }

    if(!empty($_POST['department'])) {
       $departmentName = $_POST['department'];
       $deptId = $courseList->getDepartementID($departmentName);

    }

echo $courseCode.' '.$courseName.' '.$departmentName.' '.$deptId;


$query = "INSERT INTO course (courseName, courseNameCode, deptId) VALUES ('$courseName','$courseCode','$deptId')";
$courseList->addCourses($query);

$_SESSION['success'] = true;
header("Location: ../management/courseInformationForm.php");
?>
