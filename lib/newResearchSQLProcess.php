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

$admin = new AdminSystem();




        $studentId = $_POST['studentName'];
        $professorId = $_POST['professorName'];

        $researchName = $_POST['researchName'];
        $researchName = $admin->escape($researchName);

        $grantId = $_POST['grantName'];

        $researchStartDate = $_POST['researchStartDate'];
        $researchStartDate = $admin->escape($researchStartDate);

        $researchEndDate = $_POST['researchEndDate'];
        $researchEndDate = $admin->escape($researchEndDate);


echo print_r($_POST).'</br>';


$_SESSION['success'] = false;

$query = "INSERT INTO research (studentId,grantId,professorId, researchName,startDate,endDate ) VALUES ( '$studentId','$grantId', '$professorId','$researchName','$researchStartDate','$researchEndDate')";
$admin->addNewBoard($query);

echo '<br/>'.$studentId.'---'.$professorId.'---'.$journalYear.'---'.$researchName.'---'.$grantId.'---'.$researchStartDate.'---'.$researchEndDate;

$_SESSION['success'] = true;
header("Location: ../management/researchForm.php");
?>
