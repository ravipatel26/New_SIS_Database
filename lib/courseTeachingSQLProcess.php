<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$professorId = $courses = $semester = $year = '';


$courseTeaching = new AdminSystem();

echo print_r($_POST);
echo '<br/>';


    if (isset($_POST['professorName'])) {
        $professorId = $_POST['professorName'];

    }
    if (isset($_POST['courses'])) {
        $courses = $_POST['courses'];
        list($courseName,$courseCode)=split(' ',$courses);

        $courseId = $courseTeaching->getCourseID($courseName,$courseCode);
    }
    if (isset($_POST['semester'])) {
        $semester = $_POST['semester'];
        $semesterId = $courseTeaching->getSemesterID($semester);


    }
    if (isset($_POST['teachYear'])) {
        $year = $_POST['teachYear'];

    }

echo $professorId.'<br/>';
echo $courseId.'<br/>'.$courseName.'<br/>'.$courseCode.'<br/>';
echo $semesterId.'<br/>';
echo $year.'<br/>';


$query = "INSERT INTO teaching (professorId, courseId, semesterId, year) VALUES ('$professorId','$courseId','$semesterId','$year')";
$courseTeaching->addCoursesTeaching($query);


$_SESSION['success'] = true;
header("Location: ../management/coursesTeaching.php");

?>
