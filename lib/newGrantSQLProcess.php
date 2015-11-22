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
$professorId = $grantName = $grantAmount = $grantYear = $department = $researchId = $studentName = '';

$newGrant = new AdminSystem();

var_dump($_POST);

$professorId = $newGrant->escape($_POST['professorName']);

$grantName = $_POST['grantName'];
$grantName = $newGrant->escape($grantName);

$grantAmount = $_POST['grantAmount'];
$grantAmount = $newGrant->escape($grantAmount);

$grantYear = $_POST['grantYear'];
$grantYear = $newGrant->escape($grantYear);

$researchId = $_POST['researchName'];

$studentName = $_POST['studentName'];
$studentName = $newGrant->escape($studentName);
$tudentId = $newGrant->getStudentID($studentName);
echo print_r($_POST).'</br>';



echo '<br/>'.$professorId.'/'.$grantName.'/'.$grantAmount.'/'.$grantYear.'/'.$researchId.'/'.$studentName.'/'.$tudentId;

$_SESSION['success'] = false;
$query = "INSERT INTO grants (studentId, professorId, researchId, grantAmount,year, grantName) VALUES ( '$tudentId', '$professorId', '$researchId', '$grantAmount', '$grantYear','$grantName')";

$newGrant->addNewGrant($query);

    $_SESSION['success'] = true;
    header("Location: ../management/grantsInformationForm.php");


?>

