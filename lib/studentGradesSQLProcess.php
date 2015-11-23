<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/sqlQueries.php");?>

<?php

$studentId = $courses = $departement = $courseYear = $assignments = $projects = $midTerms = $finalExams = $finalLetterGrades = '';


$studentGrades = new AdminSystem();

echo print_r($_POST);

        $studentId = $_POST['studentName'];
        $coursesId = $_POST['courses'];
        $departement = $_POST['department'];

        $courseYear = $_POST['courseYear'];
        $courseYear = $studentGrades->escape($courseYear);

        $assignments = $_POST['asignements'];
        $assignments = $studentGrades->escape($assignments);

        $projects = $_POST['projects'];
        $projects = $studentGrades->escape($projects);

        $midTerms = $_POST['midTerms'];
        $midTerms = $studentGrades->escape($midTerms);

        $finalExams = $_POST['finalExams'];
        $finalExams = $studentGrades->escape($finalExams);

        $finalLetterGrades = $_POST['finalLetterGrades'];
        $finalLetterGrades = $studentGrades->escape($finalLetterGrades);
        $finalLetterGrades = strtoupper($finalLetterGrades);

        $courseTakenId = $studentGrades->getCourseTakenId($coursesId,$studentId);

        echo '<br/>'.$courseTakenId.'---'.$coursesId.'---'.$studentId.'---'.$finalLetterGrades;


        $_SESSION['success'] = false;

        $query = "INSERT INTO grades (courseTakenId,assignments,projects, midTerms,finalExams,finalLetterGradeId ) VALUES ( '$courseTakenId','$assignments', '$projects','$midTerms','$finalExams','$finalLetterGrades')";
        $studentGrades->addNewGrades($query);

        echo '<br/>'.'---'.$courseTakenId.'---'.$assignments.'---'.$projects.'---'.$midTerms.'---'.$finalExams.'---'.$finalLetterGrades;

        $_SESSION['success'] = true;
        header("Location: ../management/studentGrades.php");




?>
