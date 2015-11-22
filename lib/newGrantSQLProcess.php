<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php
# Professor info
$professorName = $grantName = $grantAmount = $grantYear = $department = $researchName = $studentName = '';

$newGrant = new AdminSystem();

if(isset($_POST['submit'])) var_dump($_POST);

$professorName = $newGrant->escape($_POST['professorName']);

$grantName = $_POST['grantName'];
$grantName = $newGrant->escape($grantName);

$grantAmount = $_POST['grantAmount'];
$grantAmount = $newGrant->escape($grantAmount);

$grantYear = $_POST['grantYear'];
$grantYear = $newGrant->escape($grantYear);

$researchName = $_POST['researchName'];
$researchName = $newGrant->escape($researchName);

$studentName = $_POST['studentName'];
$studentName = $newGrant->escape($studentName);

echo print_r($_POST).'</br>';

$professorId = 0;
$_SESSION['success'] = false;

$query = "INSERT INTO professor (professorName, professorNumber, professorEmail, professorPhone,deptId) VALUES ( '$name', '$professNumber', '$email', '$phoneNumber', '$deptId')";

$professorId=$newGrant->addNewProfessor($query);

//if(!empty($level)){
//    $query = "INSERT INTO GraduateStudent (studentId, studentLevel, currentPosition) VALUES ('$studentId', '$level', '$position')";
//    $newGrant->addGraduateStudent($query);
//}
//
//
//if(!empty($summer)){
//    $query = "INSERT INTO UnderGraduateStudent (studentId, summerStudent) VALUES ('$studentId', '$summer')";
//    $newGrant->addUnderGraduateStudent($query);
//}


if($professorId>0){
    $_SESSION['success'] = true;
    header("Location: ../management/studentForm.php");
}


?>

