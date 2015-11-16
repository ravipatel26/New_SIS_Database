<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<!doctype html>
<html>

    <?php require("headerAdmin.php");?>


<body>
<div class="container-fluid bg-info" style="height: 1500px">
    <div id="navigation">
        <div class="row">
            <?php require("navigationAdmin.php"); ?>
        </div>
    </div>
    	<div class="row">
               
        </div>
		

	</div><!---body--->
</div><!----container fluid------->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery_min_1112.js"></script>
    
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>