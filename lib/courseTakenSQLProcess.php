<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$studentName = $courses = $departement = $courseYear = '';

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
    }

}

?>
