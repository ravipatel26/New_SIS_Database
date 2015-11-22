<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$deptName = $deptPhone = $editorialBoardName = $journalName = $journalYear = '';

$newDepartment = new AdminSystem();

echo print_r($_POST);

    if (isset($_POST['deptName'])) {
        $deptName = $_POST['deptName'];
    }
    if (isset($_POST['deptPhone'])) {
        $deptPhone = $_POST['deptPhone'];
    }

$query = "INSERT INTO department (deptName, deptPhone) VALUES ('$deptName','$deptPhone')";
$newDepartment->addDepartment($query);

$_SESSION['success'] = true;
header("Location: ../management/departmentForm.php");



?>
