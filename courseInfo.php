<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php
include("lib/config.php");
require("lib/courseInfoProcess.php");
?>
<?php

$professor=$_GET['professorId'];
$course = $_GET['courseId'];
$semesterResult = $_GET['semesterResult'];
$semesterResult = base64_decode(strtr($semesterResult, '-_,', '+/='));

?>
<!DOCTYPE html>
<html>
<?php require("header.php");?>

<body>
<div class="container-fluid bg-info" style="height: 1500px">
    <div id="navigation">
        <div class="row">
            <?php require("navigation.php"); ?>
        </div>
    </div>
    <div class="panel panel-default  col-lg-6 col-lg-offset-1" style="width: 80%">
        <div class="panel-heading h2 text-center">Course Info</div>
        <div class="panel-body">
            <form id="listSemester" class="form-horizontal" role="form" method="post" action="lib/courseInfoSQLProcess.php">

                <div class="form-group">
                    <label class="col-md-2 control-label" for="professorName">Professor's Name :</label>
                    <div class="col-md-4">
                        <select id="professorName" name="professorName" class="form-control" value="<?php echo htmlspecialchars($professorName); ?>">
                            <option value="" selected="selected">--- Select a Professor's Name ---</option>
                            <?php echo $courseInfo->getProfessorNameId2();?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="courses">Course's Name :</label>
                    <div class="col-md-4">
                        <select id="courses" name="courses" class="form-control" value="<?php echo htmlspecialchars($courses); ?>">
                            <option value="" selected="selected">--- Select a Course's Name ---</option>
                            <?php echo $courseInfo->getCourseNameId2();?>
                        </select>
                    </div>
                </div>
                <!--                submit and reset buttons-->
                <div class="row text-center">
                     <div class="form-group">
                        <div class="col-md-2 col-xs-offset-2">
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>
<!---->
<!--                        <div class="col-md-2">-->
<!--                            <button class="btn btn-danger" type="reset" onclick="location.reload(true); ">reset</button>-->
<!--                        </div>-->
                     </div>
                </div>

            </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Professor</th><th>Class taught</th><th>Semester</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php echo $semesterResult;?>
                    </tbody>
                </table>


        </div>
    </div>



</div>

<!--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/bootstrap-datepicker.js"></script>-->

<script src="js/functions.js"></script>

</body>



<script src="js/control.js"></script>
</html>
