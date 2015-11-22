<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$editorialBoardName = $journalName = $journalYear = $editorialBoardId ='';

$review = new AdminSystem();

    if (isset($_POST['editorialBoardName'])) {
        $editorialBoardName = $_POST['editorialBoardName'];
        $editorialBoardId = $review->getEditorialBoardID($editorialBoardName);
    }
    if (!empty($_POST['journalName'])) {
        $journalName = $_POST['journalName'];
    }
    if (!empty($_POST['journalYear'])) {
        $journalYear = $_POST['journalYear'];
    }

echo print_r($_POST);

    $query = "INSERT INTO review (boardId, journalName, year) VALUES ('$editorialBoardId','$journalName','$journalYear')";
    $review->addReview($query);

    $_SESSION['success'] = true;
    header("Location: ../management/reviewsInformationForm.php");




?>
