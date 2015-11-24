<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("sqlQueries.php");?>

<?php

$professorId = $coursesId = $semester = $professorName = $courseName = '';



$courseInfo = new AdminSystem();

//echo print_r($_POST);
echo '<br/>';


    if (isset($_POST['professorName'])) {
        $temp = $_POST['professorName'];
        $data = explode('-',$temp);
        $professorId = $data[0];
        $professorName = $data[1];

    }
    if (isset($_POST['courses'])) {
        $temp = $_POST['courses'];
        $data = explode('-',$temp);
        $coursesId = $data[0];
        $courseName = $data[1];

    }
//    if (isset($_POST['semester'])) {
//        $semester = $_POST['semester'];
//        $semesterId = $courseInfo->getSemesterID($semester);
//
//    }
//    if (isset($_POST['teachYear'])) {
//        $year = $_POST['teachYear'];
//
//    }

echo '<br/>'.$professorId.'<br/>';
echo $coursesId.'<br/>';


$query = "SELECT semester.semesterName, teaching.semesterId FROM teaching,semester WHERE teaching.professorId=$professorId AND teaching.courseId=$coursesId and semester.semesterId=teaching.semesterId";
$semester= $courseInfo->getSemesterNameTeached($query);
echo $semester;

//$_SESSION['success'] = true;
header("Location: ../courseInfo.php?professorId=$professorName&courseId=$courseName&semester=$semester");

?>
