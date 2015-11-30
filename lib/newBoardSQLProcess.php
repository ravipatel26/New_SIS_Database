<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$professorId = $editorialBoardName = $journalName = $journalYear = '';

$newBoard = new AdminSystem();

echo print_r($_POST);

        $professorId = $_POST['professorName'];
        $editorialBoardName = $_POST['editorialBoardName'];
        $journalName = $_POST['journalName'];
        $journalYear = $_POST['editorialBoardYear'];


$_SESSION['success'] = false;

$query = "INSERT INTO editorialboard (boardName,journalName) VALUES ( '$editorialBoardName','$journalName')";
$editorialBoardId = $newBoard->addNewBoard($query);

$query = "INSERT INTO services (professorId, boardId, year) VALUES ( '$professorId', '$editorialBoardId', '$journalYear')";
$newBoard->addNewService($query);


echo '<br/>'.$editorialBoardName.'---'.$professorId.'---'.$journalYear.'---'.$journalName.'---'.$editorialBoardId;

$_SESSION['success'] = true;
header("Location: ../management/editorialBoardForm.php");


?>
