<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$grantId = $grantAmountUsed = $grantUsedYear = '';

$grantUsed = new AdminSystem();

echo print_r($_POST);

    if (isset($_POST['grantName'])) {
        $grantId = $_POST['grantName'];
    }
    if (isset($_POST['grantAmountUsed'])) {
        $grantAmountUsed = $_POST['grantAmountUsed'];
    }
    if (isset($_POST['grantUsedYear'])) {
        $grantUsedYear = $_POST['grantUsedYear'];
        $grantUsedYear = $grantUsed->escape($grantUsedYear);
    }

echo '<br/>'.$grantId.'  '.$grantAmountUsed.'  '.$grantUsedYear;


$_SESSION['success'] = false;

$query = "INSERT INTO usesgrants (grantId, grantAmountUsed, year) VALUES ( '$grantId', '$grantAmountUsed', '$grantUsedYear')";
$grantUsed->addNewGrant($query);


    $_SESSION['success'] = true;
    header("Location: ../management/grantUsedForm.php");


?>
