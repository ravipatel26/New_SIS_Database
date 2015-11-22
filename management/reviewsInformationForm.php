<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php
include("../lib/config.php");
require("../lib/reviewProcess.php");
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
    <div class="panel panel-default  col-lg-6 col-lg-offset-1" style="width: 80%">
        <div class="panel-heading h2 text-center">Reviews Information Form</div>
        <div class="panel-body">
            <form id="reviewInformation" class="form-horizontal" role="form" method="post" action="../lib/newReviewSQLProcess.php">
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="editorialBoardName">Editorial Boards's Name :</label>
                    <div class="col-md-4">
                        <select id="editorialBoardName" name="editorialBoardName" class="form-control" value="<?php echo htmlspecialchars($editorialBoardName); ?>">
                            <option value="" selected="selected">--- Select a Editorial Boards's Name ---</option>
                            <?php echo $review->getEditorialBoardName();?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="journalName">Journal Name :</label>
                    <div class="col-md-4">
                        <select id="journalName" name="journalName" class="form-control" value="<?php echo htmlspecialchars($journalName); ?>">
                            <option value="" selected="selected">--- Select a Journal's Name ---</option>
                            <?php echo $review->getJournalName();?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="journalYear" class="col-md-2 col-xs-offset-2 control-label">Journal Year :</label>
                    <div class="col-md-3 date">
                        <div class="input-group input-append date" id="journalFormYear">
                            <input id="journalYear" name="journalYear" type="text" class="form-control datepicker" value="<?php echo htmlspecialchars($journalYear); ?>"/>
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
            <span class="glyphicon glyphicon-star"></span> Review information successfully entered
        </div>
    </div>


</div>

<!--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/bootstrap-datepicker.js"></script>-->

<script src="../js/functions.js"></script>
<?php
if($_SESSION['success']){
    echo '<script> $("#reviewInformation").addClass("hidden");
            $("#submission").addClass("hidden");
            $("#confirmation").removeClass("hidden");</script>';
    $_SESSION['success'] = false;
}
?>

</body>



<script src="../js/control.js"></script>
</html>
