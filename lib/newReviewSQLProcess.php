<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$profFirstName = $profLastName = $editorialBoardName = $journalName = $journalYear = '';

echo print_r($_POST);

if (isset($_POST['submit'])) {


    if (isset($_POST['profFirstName'])) {
        $profFirstName = $_POST['profFirstName'];
    }
    if (isset($_POST['profLastName'])) {
        $profLastName = $_POST['profLastName'];
    }
    if (isset($_POST['editorialBoardName'])) {
        $editorialBoardName = $_POST['editorialBoardName'];
    }
    if (isset($_POST['journalName'])) {
        $journalName = $_POST['journalName'];
    }
    if (isset($_POST['journalYear'])) {
        $journalYear = $_POST['journalYear'];
    }


}

?>
