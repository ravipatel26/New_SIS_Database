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
        $committeeName = $_POST['techCommitteeName'];
        $professorId = $_POST['professorName'];
        $academicYear = $_POST['committeeYear'];

echo '<br/>'.$committeeName.'   '.$professorId.'   '.$academicYear;

$_SESSION['success'] = false;

$query = "INSERT INTO technicalprogramcommittee (committeeName,year ) VALUES ( '$committeeName', '$academicYear')";
$committeeId = $newCommittee->addNewCommittee($query);

$query = "INSERT INTO services (professorId, techProgramId, year) VALUES ( '$professorId', '$committeeId', '$academicYear')";
$newCommittee->addNewService($query);

$_SESSION['success'] = true;
header("Location: ../management/techCommitteeForm.php");


?>
