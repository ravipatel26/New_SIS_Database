<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php
include("../lib/config.php");
require("../lib/courseTakenProcess.php");
?>
<?php
if(!isset($_SESSION["manager"]))
{
    header("location:/comp353/adminLogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<?php require("headerManagement.php");?>

<body>
<div class="container-fluid bg-info" style="height: 900px">
    <div id="navigation">
        <div class="row">
            <?php require("navigationManagement.php"); ?>
        </div>
    </div>

    <div class="panel panel-default col-lg-6 col-lg-offset-1" style="width: 80%">
        <div class="panel-heading h2 text-center">Student Grades</div>
        <div class="panel-body">
            <form id="courseTaken" class="form-horizontal" role="form" method="post" action="courseTakenSQL.php">
                <div class="form-group">
                    <label for="studentName" class="col-md-2 control-label">Student Name :</label>
                    <div class="col-md-4">
                        <select id="studentName" name="studentName" class="form-control" value="<?php echo htmlspecialchars($studentName); ?>">
                            <option value="" selected="selected">--- Select a Student ---</option>
                            <?php echo $courseTaken->getStudentName();?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="courses" class="col-md-2 control-label">Course Name :</label>
                    <div class="col-md-4">
                        <select id="courses" name="courses" class="form-control" value="<?php echo htmlspecialchars($courses); ?>">
                            <option value="" selected="selected">--- Select a Course ---</option>
                            <?php echo $courseTaken->getCourseName();?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="asignements" class="col-md-2 control-label">Assignements Grade :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="asignements" name="asignements" placeholder="percentage grade" value="<?php echo htmlspecialchars($assignments); ?>">
                    </div>
                </div><div class="form-group">
                    <label for="projects" class="col-md-2 control-label">Projects Grade :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="projects" name="projects" placeholder="percentage grade" value="<?php echo htmlspecialchars($projects); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="midTerms" class="col-md-2 control-label">MidTerms Grade :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="midTerms" name="midTerms" placeholder="percentage grade" value="<?php echo htmlspecialchars($midTerms); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="finalExams" class="col-md-2 control-label">Final Exam Grade :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="finalExams" name="finalExams" placeholder="percentage grade" value="<?php echo htmlspecialchars($finalExams); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="finalLetterGrades" class="col-md-2 control-label">Final Letter Grade :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="finalLetterGrades" name="finalLetterGrades" placeholder="Letter Grade" value="<?php echo htmlspecialchars($finalLetterGrades); ?>">
                    </div>
                </div>



<!--                submit and reset buttons-->
                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-2 col-xs-offset-2">
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-danger" type="reset" onclick="location.reload(); ">reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="confirmation" class="alert alert-success hidden">
            <span class="glyphicon glyphicon-star"></span>Information successfully entered!
        </div>
    </div>



</div>

<!--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/bootstrap-datepicker.js"></script>-->

<<script src="../js/functions.js"></script>
<?php
if($_SESSION['success']){
    echo '<script> $("#eventForm").addClass("hidden");
            $("#submission").addClass("hidden");
            $("#confirmation").removeClass("hidden");</script>';
    $_SESSION['success'] = false;
}
?>

</body>



<script src="../js/control.js"></script>

</html>
