<?php require("../lib/courseTakenProcess.php");?>


<?php

$studentName=$_GET['studentName'];



$deptName=$courseTaken->getStudentDepartmentName($studentName);


$dept=array($deptName=>$deptName.','.$studentName);

if(array_key_exists($deptName,$dept))
{
    print $dept[$deptName];

}else{
    print ",";
}


?>
