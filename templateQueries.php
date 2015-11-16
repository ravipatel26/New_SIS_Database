<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php
include("/lib/config.php");
require("/lib/sqlQueries.php");
require("/lib/studenFormValid.php");
?>
<!DOCTYPE html>
<html lang="en" xmlns:width="http://www.w3.org/1999/xhtml">
<?php require("header.php");?>

<body>
<div class="container-fluid bg-info" style="height: 1500px">
    <div id="navigation">
        <div class="row">
            <?php require("navigation.php"); ?>
        </div>
    </div>
    <div class="panel panel-default  col-lg-6 col-lg-offset-1" style="width: 80%">
        <div class="panel-heading h2 text-center">TEMPLATE FOR QUERIES</div>
        <div class="panel-body">

        </div>
    </div>


</div>

<!--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/bootstrap-datepicker.js"></script>-->

<script src="js/functions.js"></script>

</body>



<script src="js/control.js"></script>
</html>
