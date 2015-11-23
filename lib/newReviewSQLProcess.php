<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$editorialBoardName = $journalName = $journalYear = $editorialBoardId = $professorId = '';

echo print_r($_POST);

$review = new AdminSystem();

    $professorId = $_POST['professorName'];

    $editorialBoardName = $_POST['editorialBoardName'];
    $editorialBoardId = $review->getEditorialBoardID($editorialBoardName);

    $journalName = $_POST['journalName'];
    $journalYear = $_POST['journalYear'];


    $query = "INSERT INTO review (boardId, journalName, year) VALUES ('$editorialBoardId','$journalName','$journalYear')";
    $reviewId = $review->addReview($query);

    $query = "INSERT INTO services (professorId, reviewId, year) VALUES ( '$professorId', '$reviewId', '$journalYear')";
    $review->addNewService($query);

echo '<br/>'.$reviewId.'--'.$professorId.'--'.$editorialBoardName.'--'.$editorialBoardId.'--'.$journalName.'--'.$journalYear;

    $_SESSION['success'] = true;
    header("Location: ../management/reviewsInformationForm.php");




?>
