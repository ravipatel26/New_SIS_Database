<?php require("../lib/courseTakenProcess.php");?>


<?php

$department=$_GET['department'];



$courseNames=$courseTaken->getCourseTakenName($department);


$courses=array($courseNames=>$courseNames.','.$department);

if(array_key_exists($courseNames,$courses))
{
    print $courses[$courseNames];

}else{
    print ",";
}


?>
