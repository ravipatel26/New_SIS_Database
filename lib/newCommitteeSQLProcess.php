<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$committeeName = $professorId = $academicYear = '';

$newCommittee = new AdminSystem();

echo print_r($_POST);

    if (isset($_POST['committeeName'])) {
        $committeeName = $_POST['committeeName'];
    }
    if (isset($_POST['professorName'])) {
        $professorId = $_POST['professorName'];
    }
    if (isset($_POST['academicYear'])) {
        $academicYear = $_POST['academicYear'];
    }

echo '<br/>'.$committeeName.'   '.$professorId.'   '.$academicYear;

$_SESSION['success'] = false;
$query = "INSERT INTO services (professorId, serviceName, year) VALUES ( '$professorId', '$committeeName', '$academicYear')";

$newCommittee->addNewService($query);

$_SESSION['success'] = true;
header("Location: ../management/grantsInformationForm.php");


?>
