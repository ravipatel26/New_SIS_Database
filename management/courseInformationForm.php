<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php
include("../lib/config.php");
require("../lib/courseListProcess.php");
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
<div class="container-fluid bg-info" style="height: 1500px">
    <div id="navigation">
        <div class="row">
            <?php require("navigationManagement.php"); ?>
        </div>
    </div>
    <div class="panel panel-default  col-lg-6 col-lg-offset-1" style="width: 80%">
        <div class="panel-heading h2 text-center">Course Information Form</div>
        <div class="panel-body">
            <form id="courseList" class="form-horizontal" role="form" method="post" action="../lib/newCourseSQLProcess.php">
                <div class="form-group">
                    <label for="department" class="col-md-2 control-label">Department Name :</label>
                    <div class="col-md-4">
                        <select id="department" name="department" class="form-control" value="<?php echo htmlspecialchars($departmentName); ?>">
                            <option value="" selected="selected">--- Select a Department ---</option>
                            <?php echo $courseList->getDepartmentName();?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="courseName">Course Name :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="courseName" name="courseName" placeholder="Course Name ex: COMP" value="<?php echo htmlspecialchars($courseName); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="courseCode">Course code :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="courseCode" name="courseCode" placeholder="Course code ex: 335" value="<?php echo htmlspecialchars($courseCode); ?>">
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
            <span class="glyphicon glyphicon-star"></span> Student information successfully entered
        </div>
    </div>


</div>

<!--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/bootstrap-datepicker.js"></script>-->

<script src="../js/functions.js"></script>
<?php
if($_SESSION['success']){
    echo '<script> $("#courseList").addClass("hidden");
            $("#submission").addClass("hidden");
            $("#confirmation").removeClass("hidden");</script>';
    $_SESSION['success'] = false;
}
?>

</body>



<script src="../js/control.js"></script>
</html>
