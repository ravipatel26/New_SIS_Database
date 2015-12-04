<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("sqlQueries.php");?>

<?php

$coursesId = $courseName = '';



$existingCourse = new AdminSystem();




    $query = "SELECT courseName,courseNameCode,deptName,courseId FROM course NATURAL JOIN department";

$existingCoursesResult= $existingCourse->getExistingCourses($query);

$existingCoursesResult = strtr(base64_encode($existingCoursesResult), '+/=', '-_,');

header("Location: ../courseInformationForm.php?existingCoursesResult=$existingCoursesResult");

?>
