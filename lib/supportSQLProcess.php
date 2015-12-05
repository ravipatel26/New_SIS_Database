<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("sqlQueries.php");?>

<?php

$professorId = $coursesId = $semester = $professorName = $courseName = $year = '';


$supportInfo = new AdminSystem();

//echo print_r($_POST);
echo '<br/>';


    if (isset($_POST['studentName'])) {
        $temp = $_POST['studentName'];
        $data = explode('-',$temp);
        $studentId = $data[0];
        $studentName = $data[1];

    }

echo '<br/>'.$studentId.$studentName.'<br/>';

    $query = "SELECT sum(grantAmountUsed) AS 'totalAmount' FROM research NATURAL JOIN usesgrants WHERE studentId='$studentId' ";

$supportResult= $supportInfo->getTotalStudentSupport($query,$studentName);

$supportResult = strtr(base64_encode($supportResult), '+/=', '-_,');

header("Location: ../studentSupport.php?supportResult=$supportResult");

?>
