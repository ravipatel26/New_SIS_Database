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
            <form id="reviewInformation" class="form-horizontal" role="form" method="post" action="">
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
                            <?php echo $review->getEditorialBoardName();?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="journalYear" class="col-md-2 col-xs-offset-2 control-label">Journal Year :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="journalYear" name="journalYear" placeholder="Journal Year" value="<?php echo htmlspecialchars($journalYear); ?>">
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

</body>



<script src="../js/control.js"></script>
</html>
