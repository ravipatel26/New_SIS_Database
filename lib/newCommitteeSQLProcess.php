<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$committeeName = $professorName = $academicYear = '';

echo print_r($_POST);

if (isset($_POST['submit'])) {


    if (isset($_POST['committeeName'])) {
        $committeeName = $_POST['committeeName'];
    }
    if (isset($_POST['professorName'])) {
        $professorName = $_POST['professorName'];
    }
    if (isset($_POST['academicYear'])) {
        $academicYear = $_POST['academicYear'];
    }

}

?>
