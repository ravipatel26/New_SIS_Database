<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$result = $profFirstName = $profLastName = $techCommitteeName = $eventType = $memberSinceYear = '';

echo print_r($_POST);

if (isset($_POST['submit'])) {


    if (isset($_POST['profFirstName'])) {
        $profFirstName = $_POST['profFirstName'];
    }
    if (isset($_POST['profLastName'])) {
        $profLastName = $_POST['profLastName'];
    }
    if (isset($_POST['techCommitteeName'])) {
        $techCommitteeName = $_POST['techCommitteeName'];
    }
    if (isset($_POST['memberSinceYear'])) {
        $memberSinceYear = $_POST['memberSinceYear'];
    }


}
?>
