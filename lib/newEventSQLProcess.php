<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>
<?php

$result = $profFirstName = $profLastName = $eventName = $eventType = $eventYear = '';
echo print_r($_POST);
if (isset($_POST['submit'])) {
    $profFirstName = $_POST['profFirstName'];
    $profLastName = $_POST['profLastName'];
    $eventName = $_POST['eventName'];
    $eventType = isset($_POST['eventType']) ? $_POST['eventType'] : '';
    if(isset($_POST['eventYear'])){
        $eventYear = $_POST['eventYear'];
    }


    // Final result
    if (!$errFirstName && !$errLastName && !$errBirthDate && !$errGender && !$errAddress) {
        $result='<div class="alert alert-success">Form has been submitted!</div>';
    } else {
        $result='<div class="alert alert-danger">Errors in the form!</div>';
    }
}
?>
