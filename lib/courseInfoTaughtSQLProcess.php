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



$courseInfo = new AdminSystem();

//echo print_r($_POST);
echo '<br/>';


    if (isset($_POST['professorName'])) {
        $temp = $_POST['professorName'];
        $data = explode('-',$temp);
        $professorId = $data[0];
        $professorName = $data[1];

    }
    if (isset($_POST['year'])) {
        $year = $_POST['year'];
    }

    if (isset($_POST['year2'])) {
        $year2 = $_POST['year2'];
    }
    if (isset($_POST['semester1'])) {
        $semester1 = $_POST['semester1'];
    }

    if (isset($_POST['semester2'])) {
        $semester2 = $_POST['semester2'];
    }

echo '<br/>'.$professorId.$professorName.'<br/>';
echo $coursesId.'<br/>';

if($year==$year2){

    $query = "SELECT * FROM teaching WHERE (professorId='$professorId' AND year='$year' AND (semesterId BETWEEN '$semester1' AND 3)) ORDER BY year ASC,semesterId";

}else{

    $query = "SELECT * FROM teaching WHERE (professorId='$professorId' AND year='$year' AND (semesterId BETWEEN '$semester1' AND 3)) UNION SELECT * from teaching WHERE (professorId='$professorId' and year>'$year' and year<'$year2') UNION SELECT * FROM teaching WHERE (professorId='$professorId' AND year='$year2' and semesterId between 1 AND '$semester2' ) ORDER BY year ASC,semesterId";

}
$courseResult= $courseInfo->getCourseBySemesterTeached($query,$professorId);

$courseResult = strtr(base64_encode($courseResult), '+/=', '-_,');

header("Location: ../courseInfo.php?courseResult=$courseResult");

?>
