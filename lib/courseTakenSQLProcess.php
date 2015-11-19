<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$studentName = $courses = $editorialBoardName = $journalName = $journalYear = '';

echo print_r($_POST);

if (isset($_POST['submit'])) {


    if (isset($_POST['studentName'])) {
        $studentName = $_POST['studentName'];
    }
    if (isset($_POST['courses'])) {
        $courses = $_POST['courses'];
    }
    if (isset($_POST['assignments'])) {
        $assignments = $_POST['assignments'];
    }
    if (isset($_POST['projects'])) {
        $projects = $_POST['projects'];
    }
    if (isset($_POST['midTerms'])) {
        $midTerms = $_POST['midTerms'];
    }
    if (isset($_POST['finalExams'])) {
        $finalExams = $_POST['finalExams'];
    }
    if (isset($_POST['finalLetterGrades'])) {
        $finalLetterGrades = $_POST['finalLetterGrades'];
    }


}

?>
