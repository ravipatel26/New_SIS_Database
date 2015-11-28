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

echo '<br/>'.$professorId.'<br/>';
echo $coursesId.'<br/>';


$query = "SELECT * FROM teaching WHERE (semesterId=1 OR semesterId=2 OR semesterId=3) AND professorId='$professorId' AND (year>='$year' OR year<=$year2) ORDER BY year ASC ";

$courseResult= $courseInfo->getCourseBySemesterTeached($query,$year,$year2,$professorName);

$courseResult = strtr(base64_encode($courseResult), '+/=', '-_,');

header("Location: ../courseInfo.php?courseResult=$courseResult");

?>
