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
    if (isset($_POST['year'])) {
        $year = $_POST['year'];
    }

echo '<br/>'.$professorId.'<br/>';
echo $level.'<br/>';

//$query ="SELECT graduatestudent.studentLevel, COUNT(*) AS `Number of Students`, supervises.year FROM graduatestudent,supervises WHERE graduatestudent.studentId=supervises.studentId AND supervises.professorId='$professorId' GROUP BY graduatestudent.studentLevel,year ORDER BY year ASC ";
//$query ="SELECT graduatestudent.studentLevel, COUNT(graduatestudent.studentLevel) AS `Number of Students`, supervises.year FROM graduatestudent,supervises WHERE graduatestudent.studentId=supervises.studentId AND supervises.professorId='$professorId' GROUP BY graduatestudent.studentLevel,year ORDER BY year ASC ";

$query ="SELECT graduatestudent.studentLevel, COUNT(graduatestudent.studentLevel) AS `NumberStudents`, supervises.year FROM graduatestudent,supervises WHERE graduatestudent.studentId=supervises.studentId AND supervises.professorId='$professorId' AND supervises.year='$year' GROUP BY graduatestudent.studentLevel ";

$levelYearResult= $levelInfo->getLevelByYear($query,$professorName,$year);

$levelYearResult = strtr(base64_encode($levelYearResult), '+/=', '-_,');

header("Location: ../studentInfo.php?levelYearResult=$levelYearResult");

?>
