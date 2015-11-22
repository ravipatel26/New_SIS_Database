<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$grantName = $grantAmountUsed = $grantUsedYear = '';

echo print_r($_POST);

if (isset($_POST['submit'])) {


    if (isset($_POST['grantName'])) {
        $grantName = $_POST['grantName'];
    }
    if (isset($_POST['grantAmountUsed'])) {
        $grantAmountUsed = $_POST['grantAmountUsed'];
    }
    if (isset($_POST['department'])) {
        $departement = $_POST['department'];
    }
    if (isset($_POST['grantUsedYear'])) {
        $grantUsedYear = $_POST['grantUsedYear'];
        $grantUsedYear = $grantUsed->escape($grantUsedYear);
    }


}

?>
