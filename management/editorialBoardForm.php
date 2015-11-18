<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php
include("../lib/config.php");
require("../lib/newBoardProcess.php");
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
        <div class="panel-heading h2 text-center">Editorial Board Form</div>
        <div class="panel-body">
            <form id="editorialBoardInforamtion" class="form-horizontal" role="form" method="post" action="../lib/newBoardSQLProcess.php">
                <div class="form-group">
                    <label for="profFirstName" class="col-md-2 col-xs-offset-2 control-label">Professor's First Name :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="profFirstName" name="profFirstName" placeholder="Professor's First Name" value="<?php echo htmlspecialchars($profFirstName); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="profLastName" class="col-md-2 col-xs-offset-2 control-label">Professor's Last Name :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="profLastName" name="profLastName" placeholder="Professor's Last Name" value="<?php echo htmlspecialchars($profLastName); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="editorialBoardName" class="col-md-2 col-xs-offset-2 control-label">Editorial Board Name :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="editorialBoardName" name="editorialBoardName" placeholder="Editorial Board Name" value="<?php echo htmlspecialchars($editorialBoardName); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="journalName" class="col-md-2 col-xs-offset-2 control-label">Journal Name :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="journalName" name="journalName" placeholder="Journal Name" value="<?php echo htmlspecialchars($journalName); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="year" class="col-md-2 col-xs-offset-2 control-label">Journal Publication Year :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="year" name="year" placeholder="Year" value="<?php echo htmlspecialchars($journalYear); ?>">
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
    echo '<script> $("#editorialBoardInforamtion").addClass("hidden");
            $("#submission").addClass("hidden");
            $("#confirmation").removeClass("hidden");</script>';
    $_SESSION['success'] = false;
}
?>

</body>



<script src="../js/control.js"></script>

</html>
