<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php
include("../lib/config.php");
require("../lib/grantUsageProcess.php");
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
        <div class="panel-heading h2 text-center">Grant Usage Form</div>
        <div class="panel-body">
            <form id="grantUsage" class="form-horizontal" role="form" method="post" action="../lib/grantUsageSQLProcess.php">
                <div class="form-group">
                    <label for="grantName" class="col-md-2 control-label">Grant Name :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="grantName" name="grantName" placeholder="Enter Grant Name" value="<?php echo htmlspecialchars($grantName); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="grantName">Grant Name :</label>
                    <div class="col-md-4">
                        <select id="grantName" name="grantName" class="form-control" value="<?php echo htmlspecialchars($grantName); ?>">
                            <option value="" selected="selected">--- Select a Grant Name : ---</option>
                            <?php echo $grantUsed->getGrantsNames();?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="grantAmountUsed" class="col-md-2 control-label">Grant Amount Used:</label>
                    <div class="col-md-3">
                        <div class="input-group input-append ">
                            <span class="input-group-addon add-on"><span>$</span></span>
                            <input type="text" class="form-control" id="grantAmountUsed" name="grantAmountUsed" placeholder="Enter Grant Amount Used" value="<?php echo htmlspecialchars($grantAmountUsed); ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="grantUsedYear" class="col-md-2 control-label">Grant Year :</label>
                    <div class="col-md-3 date">
                        <div class="input-group input-append date" id="grantUsageYearForm">
                            <input id="grantUsedYear" name="grantUsedYear" type="text" class="form-control datepicker" value="<?php echo htmlspecialchars($grantUsedYear); ?>"/>
                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
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
