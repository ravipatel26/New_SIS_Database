<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php
include("../lib/config.php");
require("../lib/courseTeachingProcess.php");
?>
<?php
if(!isset($_SESSION["manager"]))
{
    header("location:/comp353/adminLogin.php");
    exit();
}else{
    if($_SESSION['permission']!=1 && isset($_SESSION["manager"])){
        header("location:/comp353/management/adminHome.php");
        exit();
    }
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
        <div class="panel-heading h2 text-center">Courses Teaching</div>
        <div class="panel-body">
            <form id="coursesTeaching" class="form-horizontal" role="form" method="post" action="../lib/courseTeachingSQLProcess.php">
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="professorName">Professor's Name :</label>
                    <div class="col-md-4">
                        <select id="professorName" name="professorName" class="form-control"  >
                            <option value="" selected="selected">--- Select a Professor's Name ---</option>
                            <?php echo $courseTeaching->getProfessorNameId();?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="semester">Semester :</label>
                    <div class="col-md-4">
                        <select id="semester" name="semester" class="form-control" value="<?php echo htmlspecialchars($semester); ?>">
                            <option value="" selected="selected">--- Select a Semester ---</option>
                            <?php echo $courseTeaching->getSemesterName();?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="teachYear" class="col-md-2 col-xs-offset-2 control-label">Academic Year :</label>
                    <div class="col-md-3 date">
                        <div class="input-group input-append date" id="coursesTeachingFormYear">
                            <input id="teachYear" name="teachYear" type="text" class="form-control datepicker" value="<?php echo htmlspecialchars($year); ?>"/>
                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="courses">Course's Name :</label>
                    <div class="col-md-4">
                        <select id="courses" name="courses" class="form-control" value="<?php echo htmlspecialchars($courses); ?>">
                            <option value="" selected="selected">--- Select a Course's Name ---</option>
                            <?php echo $courseTeaching->getCourseName();?>
                        </select>
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


<script src="../js/functions.js"></script>
<?php
if($_SESSION['success']){
    echo '<script> $("#coursesTeaching").addClass("hidden");
            $("#submission").addClass("hidden");
            $("#confirmation").removeClass("hidden");</script>';
    $_SESSION['success'] = false;
}
?>

<script src="../js/control.js"></script>

</body>

</html>
