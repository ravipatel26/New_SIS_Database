<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$studentName = $professorName = $researchName = $grantName = $researchStartDate = $researchEndDate = '';

echo print_r($_POST);

if (isset($_POST['submit'])) {


    if (isset($_POST['studentName'])) {
        $studentName = $_POST['studentName'];
    }
    if (isset($_POST['professorName'])) {
        $professorName = $_POST['professorName'];
    }
    if (isset($_POST['researchName'])) {
        $researchName = $_POST['researchName'];
    }
    if (isset($_POST['grantName'])) {
        $grantName = $_POST['grantName'];
        $grantName = $admin->escape($grantName);
    }
    if (isset($_POST['researchStartDate'])) {
        $researchStartDate = $_POST['researchStartDate'];
        $researchStartDate = $admin->escape($researchStartDate);
    }
    if (isset($_POST['researchEndDate'])) {
        $researchEndDate = $_POST['researchEndDate'];
        $researchEndDate = $admin->escape($researchEndDate);
    }
}

echo print_r($_POST).'</br>';

// TO DO:
// $researchId = 0;
// $_SESSION['success'] = false;

// NEED A FUNCTION THAT GETs studentId, professorId and grantId from the names given. Example: select id from Students where name='$(studentName)';

// $query = "INSERT INTO Research (studentId, grantId, professorId, researchName, startDate, endDate) VALUES ( '$studentId', '$grantId', '$professorId', '$researchName', '$researchStartDate', '$researchEndDate')";

// $researchId=$admin->addNewResearch($query);

// if($professorId>0){
//    $_SESSION['success'] = true;
//    header("Location: ../management/researchForm.php");
// }
?>