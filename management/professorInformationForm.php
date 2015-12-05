<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php
include("../lib/config.php");
require("../lib/newProfessorProcess.php");
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
<div class="container-fluid bg-info" style="height: 1500px">
    <div id="navigation">
        <div class="row">
            <?php require("navigationManagement.php"); ?>
        </div>
    </div>
    <div class="panel panel-default  col-lg-6 col-lg-offset-1" style="width: 80%">
        <div class="panel-heading h2 text-center">Professor Information Form</div>
        <div class="panel-body">
            <form id="professorInformationForm" class="form-horizontal" role="form" method="post" action="../lib/newProfessorSQLProcess.php">
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="firstName">Professor First Name :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo htmlspecialchars($firstName); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="lastName">Professor Last Name :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo htmlspecialchars($lastName); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-md-2 col-xs-offset-2 control-label">Phone Number :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="ex: 514-123-4567" value="<?php echo htmlspecialchars($phoneNumber); ?>" onchange="checkPhoneNumber()">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-2 col-xs-offset-2 control-label">Email</label>
                    <div class="col-md-4">
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($email); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="professorNumber" class="col-md-2 col-xs-offset-2 control-label">Professor  Number :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="professorNumber" name="professorNumber" placeholder="ex: 12345678" value="<?php echo htmlspecialchars($professorNumber); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="department" class="col-md-2 col-xs-offset-2 control-label">Department Name :</label>
                    <div class="col-md-4">
                        <select id="department" name="department" class="form-control" value="<?php echo htmlspecialchars($department); ?>">
                            <option value="" selected="selected">--- Select a Department ---</option>
                            <?php echo $newProfessor->getDepartmentName();?>

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
    </div>


</div>

<!--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/bootstrap-datepicker.js"></script>-->

<script src="../js/functions.js"></script>
<?php
if($_SESSION['success']){
    echo '<script> $("#studentInforamtion").addClass("hidden");
            $("#submission").addClass("hidden");
            $("#confirmation").removeClass("hidden");</script>';
    $_SESSION['success'] = false;
}
?>

</body>



<script src="../js/control.js"></script>
</html>
