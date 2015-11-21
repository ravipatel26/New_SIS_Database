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
<?php
$courses = $courseTaken->getCoursesNameTaken($depID);
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
        <div class="panel-heading h2 text-center">Courses Taken</div>
        <div class="panel-body">
            <form id="courseTaken" class="form-horizontal" role="form" method="post" action="../lib/courseTakenSQLProcess.php">
                <div class="form-group">
                    <label for="studentName" class="col-md-2 control-label">Student Name :</label>
                    <div class="col-md-4">
                        <select id="studentName" name="studentName" class="form-control" value="<?php echo htmlspecialchars($studentName); ?>" onchange="getDepartmentName(this.value)">
                            <option value="" selected="selected">--- Select a Student ---</option>
                            <?php echo $courseTaken->getStudentName();?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="department" class="col-md-2 control-label">Department Name :</label>
                    <div class="col-md-4">
                        <select id="department" name="department" class="form-control" value="<?php echo htmlspecialchars($department); ?>">
                            <option value="" selected="selected">--- Select a Department ---</option>
                            <?php echo $courseTaken->getDepartmentName();?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="courseYear" class="col-md-2 control-label">Academic Year :</label>
                    <div class="col-md-3 date">
                        <div class="input-group input-append date" id="courseYearFormYear">
                            <input id="courseYear" name="courseYear" type="text" class="form-control datepicker" value="<?php echo htmlspecialchars($courseYear); ?>"/>
                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="course" class="col-md-2 control-label">Course Name :</label>
                    <div class="col-md-4">
                        <?php echo $courses;?>
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

    <?php echo $deptName;?>

</div>

<!--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/bootstrap-datepicker.js"></script>-->

<script src="../js/functions.js"></script>
<?php
if($_SESSION['success']){
    echo '<script> $("#courseTaken").addClass("hidden");
            $("#submission").addClass("hidden");
            $("#confirmation").removeClass("hidden");</script>';
    $_SESSION['success'] = false;
}
?>

</body>


<script src="../js/control.js"></script>
<script src="../js/courseDeptTaken.js"></script>

<script src="../js/courseTaken.js"></script>



</html>
