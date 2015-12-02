<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$studentName = $departement = $courseYear = $semester = $semesterId = $deptId = $studentId = '';
$professorId[] = $courses[] = $coursesId[] = '';
$courseTaken = new AdminSystem();
echo print_r($_POST);

if (isset($_POST['studentName'])) {
    $studentId = $_POST['studentName'];
}

if (isset($_POST['department'])) {
    $departement = $_POST['department'];
    $deptId = $courseTaken->getDepartementID($departement);
}

if (isset($_POST['semester'])) {
    $semester = $_POST['semester'];
    $semesterId = $courseTaken->getSemesterID($semester);
}
if (isset($_POST['courseYear'])) {
    $courseYear = $_POST['courseYear'];
}


if (!empty($_POST['course'])) {

    $coursesId = $_POST['course'];
}

echo '<br/>'.$studentId.'-'.$semesterId.'-'.sizeof($coursesId);
for ($i=0; $i<sizeof($coursesId); $i++) {

    $professorId= $courseTaken->getProfessorIdTeaching($coursesId[$i],$semesterId,$courseYear);
    echo '<br/>'.$professorId.'-'.$coursesId[$i].'-'.$semesterId.'-'.$courseYear;
    $courseTemp=$coursesId[$i];
    $query = "INSERT INTO coursetaken (studentId, courseId, professorId,semesterId,courseYear) VALUES ('$studentId','$courseTemp','$professorId','$semesterId','$courseYear')";
    $courseTaken->addCoursesTaken($query);
}


    $_SESSION['success'] = true;
    header("Location: ../management/coursesTakenForm.php");

?>
