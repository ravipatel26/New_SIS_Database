<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$studentName = $courses = $departement = $courseYear = $assignments = $projects = $midTerms = $finalExams = $finalLetterGrades = '';

echo print_r($_POST);

if (isset($_POST['submit'])) {


    if (isset($_POST['studentName'])) {
        $studentName = $_POST['studentName'];
    }
    if (isset($_POST['courses'])) {
        $courses = $_POST['courses'];
    }
    if (isset($_POST['department'])) {
        $departement = $_POST['department'];
    }
    if (isset($_POST['courseYear'])) {
        $courseYear = $_POST['courseYear'];
        $courseYear = $studentGrades->escape($courseYear);
    }
    if (isset($_POST['assignments'])) {
        $assignments = $_POST['assignments'];
        $assignments = $studentGrades->escape($assignments);
    }
    if (isset($_POST['projects'])) {
        $projects = $_POST['projects'];
        $projects = $studentGrades->escape($projects);
    }
    if (isset($_POST['midTerms'])) {
        $midTerms = $_POST['midTerms'];
        $midTerms = $studentGrades->escape($midTerms);
    }
    if (isset($_POST['finalExams'])) {
        $finalExams = $_POST['finalExams'];
        $finalExams = $studentGrades->escape($finalExams);
    }
    if (isset($_POST['finalLetterGrades'])) {
        $finalLetterGrades = $_POST['finalLetterGrades'];
        $finalLetterGrades = $studentGrades->escape($finalLetterGrades);
        $finalLetterGrades = strtoupper($finalLetterGrades);
    }


}

?>
