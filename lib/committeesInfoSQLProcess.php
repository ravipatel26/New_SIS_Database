<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("sqlQueries.php");?>

<?php

$professorId = $coursesId = $semester = $professorName = $courseName = $year = '';



$committeesInfo = new AdminSystem();

//echo print_r($_POST);
echo '<br/>';


    if (isset($_POST['professorName'])) {
        $temp = $_POST['professorName'];
        $data = explode('-',$temp);
        $professorId = $data[0];
        $professorName = $data[1];

    }

echo '<br/>'.$professorId.$professorName.'<br/>';

//    $query = "SELECT courseName,courseNameCode,COUNT(studentId) AS 'totalStudents' FROM coursetaken NATURAL  JOIN course WHERE professorId = '$professorId' GROUP BY courseId";
//
//$committeesResult= $committeesInfo->getTotalStudentByCourses($query,$professorName);
//
//$committeesResult = strtr(base64_encode($committeesResult), '+/=', '-_,');
//
//header("Location: ../committeeInfo.php?committeesResult=$committeesResult");

?>
