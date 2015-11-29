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



$levelInfo = new AdminSystem();

//echo print_r($_POST);
echo '<br/>';


    if (isset($_POST['professorName'])) {
        $temp = $_POST['professorName'];
        $data = explode('-',$temp);
        $professorId = $data[0];
        $professorName = $data[1];

    }
    if (isset($_POST['level'])) {
        $level = $_POST['level'];
    }

echo '<br/>'.$professorId.'<br/>';
echo $level.'<br/>';

$query ="SELECT DISTINCT student.studentName from teaching NATURAL JOIN student NATURAL join graduatestudent NATURAL join research WHERE graduatestudent.studentLevel='$level' AND teaching.professorId='$professorId'";
//$query = "select DISTINCT teaching.courseId, coursetaken.studentId, graduatestudent.studentLevel, student.studentName
//          FROM (teaching INNER JOIN coursetaken ON teaching.courseId=coursetaken.courseId INNER JOIN graduatestudent ON coursetaken.studentId=graduatestudent.studentId
//          INNER JOIN student ON graduatestudent.studentId=student.studentId) WHERE graduatestudent.studentLevel='$level' AND teaching.professorId=$professorId";
$levelResult= $levelInfo->getLevelStudentNameTeached($query,$professorName,$level);

$levelResult = strtr(base64_encode($levelResult), '+/=', '-_,');

header("Location: ../studentInfo.php?levelResult=$levelResult");

?>
