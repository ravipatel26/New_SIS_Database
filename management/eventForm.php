<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php
include("../lib/config.php");
require("../lib/newEventProcess.php");
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
            <div class="panel-heading h2 text-center">Conference/Worskhop Event Form</div>
            <div class="panel-body">
                <form id="eventForm" class="form-horizontal" role="form" method="post" action="../lib/newEventSQLProcess.php">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-offset-2 control-label" for="professorName">Professor's Name :</label>
                        <div class="col-md-4">
                            <select id="professorName" name="professorName" class="form-control" value="<?php echo htmlspecialchars($professorName); ?>">
                                <option value="" selected="selected">--- Select a Professor's Name ---</option>
                                <?php echo $newEvent->getProfessorNameId();?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="eventName" class="col-md-2 col-xs-offset-2 control-label">Event Name :</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="eventName" name="eventName" placeholder="Event Name" value="<?php echo htmlspecialchars($eventName); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="eventType" class="col-md-2 col-xs-offset-2 control-label">Event Type :</label>
                        <div class="col-md-4">
                            <label class="radio-inline">
                                <input id="radio1" name="eventType" value="Worskshop" type="radio" <?php echo (isset($_POST['event']) && $_POST['event']=='Worskshop'? 'checked' : '') ?>>Worskshop</label>
                            <label class="radio-inline">
                                <input id="radio2" name="eventType" value="Conference" type="radio" <?php echo (isset($_POST['event']) && $_POST['event']=='Conference' ? 'checked' : '') ?>>Conference</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="eventYear" class="col-md-2 col-xs-offset-2 control-label">Event Year :</label>
                        <div class="col-md-4 date">
                            <div class="input-group input-append date" id="eventFormYear">
                                <input id="eventYear" name="eventYear" type="text" class="form-control datepicker" value="<?php echo htmlspecialchars($year); ?>"/>
                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>
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
