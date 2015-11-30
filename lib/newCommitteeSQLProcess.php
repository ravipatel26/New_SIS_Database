<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$committeeName = $professorId = $academicYear = $committeeId = '';

$newCommittee = new AdminSystem();

echo print_r($_POST);
        $committeeName = $_POST['committeeName'];
        $professorId = $_POST['professorName'];
        $academicYear = $_POST['academicYear'];
        $semesterId = $_POST['semester'];

echo '<br/>'.$committeeName.'   '.$professorId.'   '.$academicYear.'<br/>';

$_SESSION['success'] = false;

$query = "INSERT INTO committee (committeeName,year,semesterId ) VALUES ( '$committeeName','$academicYear','$semesterId')";
$committeeId = $newCommittee->addNewCommittee($query);

echo $committeeId;

$query = "INSERT INTO services (professorId, committeeId, year) VALUES ( '$professorId', '$committeeId', '$academicYear')";
$newCommittee->addNewService($query);

$_SESSION['success'] = true;
header("Location: ../management/committeeInformationForm.php");


?>
