<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>
<?php

$profId = $eventName = $eventType = $eventYear = '';


$newEvent = new AdminSystem();

echo print_r($_POST);

    $profId = $_POST['professorName'];
    $eventName = $_POST['eventName'];
    $eventType = $_POST['eventType'];
    $eventYear = $_POST['eventYear'];
    $semesterId = $_POST['semester'];

echo $eventName.'    '.$eventType.'  '.$eventYear;

$_SESSION['success'] = false;

$query = "INSERT INTO event (eventName, eventType) VALUES ( '$eventName', '$eventType')";

$eventId = $newEvent->addNewEvent($query);

echo $eventId;

$query = "INSERT INTO services (professorId, eventId, year,semesterId) VALUES ('$profId', '$eventId', '$eventYear','$semesterId')";

$newEvent->addNewService($query);

$_SESSION['success'] = true;
header("Location: ../management/eventForm.php");



?>
