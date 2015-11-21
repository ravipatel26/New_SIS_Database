<?php require("../lib/courseTakenProcess.php");?>


<?php

$studentName=$_GET['studentName'];



$deptName=$courseTaken->getStudentDepartmentName($studentName);
$depID = $courseTaken->getDepartementID($deptName);

$dept=array($deptName=>$deptName.','.$depID.','.$studentName);

if(array_key_exists($deptName,$dept))
{
    print $dept[$deptName];

}else{
    print ",,";
}


?>
