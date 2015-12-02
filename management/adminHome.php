<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php
include("../lib/config.php");
require("../lib/sqlQueries.php");
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
<div class="container-fluid bg-info" style="height: 100%">
    <div id="navigation">
        <div class="row">
            <?php require("navigationManagement.php"); ?>
        </div>
    </div>
    <div class="panel panel-default  col-lg-6 col-lg-offset-1" style="width: 80%;height: 850px;">
        <div class="panel-heading h2 text-center">Admin Home</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 col-xs-offset-2 h3 bg-warning">Professors only have a limited access to the system</div>
            </div>
            <div class="row">
                <div class="col-md-9 col-xs-offset-2 h4 bg-danger">No access to Student information entry, Course taken by student; Professor information entry, and New account creation.</div>
            </div>
            <div class="row">
                <div class="col-md-2 col-xs-offset-2 h4 bg-danger">No access to course entry.</div>
            </div>

        </div>
    </div>


</div>



<script src="../js/functions.js"></script>

</body>



<script src="../js/control.js"></script>
</html>
