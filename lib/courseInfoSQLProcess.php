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

echo '<br/>'.$professorId.'<br/>';
echo $coursesId.'<br/>';


$query = "SELECT semester.semesterName, teaching.semesterId FROM teaching,semester WHERE teaching.professorId=$professorId AND teaching.courseId=$coursesId and semester.semesterId=teaching.semesterId";
$semesterResult= $courseInfo->getSemesterNameTeached($query,$courseName,$professorName);

$semesterResult = strtr(base64_encode($semesterResult), '+/=', '-_,');

header("Location: ../courseInfo.php?semesterResult=$semesterResult");

?>
