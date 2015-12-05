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
}else{
    if($_SESSION['permission']!=1 && isset($_SESSION["manager"])){
        header("location:/comp353/management/adminHome.php");
        exit();
    }
}

?>

<?php
$courseEditId=$_GET['edit'];
$courseEditId = base64_decode(strtr($courseEditId, '-_,', '+/='));

//$query="delete from course WHERE courseId='$courseEditId'";
//$courseList->editCourse($query);
//$query="delete from courseTaken WHERE courseId='$courseEditId'";
//$courseList->editCourse($query);
//$query="delete from teaching WHERE courseId='$courseEditId'";
//$courseList->editCourse($query);

$query = "SELECT courseName,courseNameCode,deptName,courseId FROM course NATURAL JOIN department WHERE courseId='$courseEditId'";

$editCourses= $courseList->getEditCourses($query);
$parts=explode('-',$editCourses);
$courseNameEdit=$parts[0];
$courseNameCodeEdit=$parts[1];
$department=$parts[2];

//$existingCoursesResult= $courseList->getExistingCourses($query);
//$tableExist='<div id="query01" class="row" style="width: 75%">
//                <div class="col-md-8 col-xs-offset-4">
//                    <table class="table  table-bordered table-striped">
//                        <thead>
//                            <tr>
//                                <th>Course Name</th><th>Department</th><th></th><th></th>
//                            </tr>
//                        </thead>
//                        <tbody>'
//    .$existingCoursesResult.
//    '</tbody>
//                    </table>
//                </div>
//            </div>';

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
        <div class="panel-heading h2 text-center">Course Information Edition Form</div>
        <div class="panel-body">
            <form id="courseEdit" class="form-horizontal" role="form" method="post" action="../lib/editCourseSQLProcess.php">
                <div class="form-group">
                    <label for="department" class="col-md-2 control-label">Department Name :</label>
                    <div class="col-md-4">
                        <select id="department" name="department" class="form-control" value="">
                            <option value="" selected="selected"><?php echo htmlspecialchars($department); ?></option>
                            <?php echo $courseList->getDepartmentName();?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="courseName">Course Name :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="courseName" name="courseName" placeholder="Course Name ex: COMP" value="<?php echo htmlspecialchars($courseNameEdit); ?>">
                        <input type="hidden" class="form-control" id="courseId" name="courseId" value="<?php echo $courseEditId;?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="courseCode">Course code :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="courseCode" name="courseCode" placeholder="Course code ex: 335" value="<?php echo htmlspecialchars($courseNameCodeEdit); ?>">
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

<!--        <div class="row">-->
<!--            <div class="col-md-8 text-center h3">Existing Courses</div>-->
<!--        </div>-->
        <?php
        if(!empty($existingCoursesResult)){
            echo $tableExist;
        }
        ?>

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
