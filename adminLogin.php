<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php
include("lib/config.php");
require("lib/sqlQueries.php");
?>

<?php

if(isset($_SESSION["manager"]))
{
    //already logged in so go back to desired page
    header("location:/management/adminHome.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<?php require("header.php");?>

<body>
<div class="container-fluid bg-info" style="height: 900px">
    <div id="navigation">
        <div class="row">
            <?php require("navigation.php"); ?>
        </div>
    </div>
    <div class="panel panel-default  col-lg-6 col-lg-offset-1" style="width: 80%">
        <div class="panel-heading h2 text-center">Login</div>
        <div class="panel-body">
            <form id="adminLogin" method="post" role="form" class="form-horizontal" action="admin/loginSQLProcess.php">
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="username">User Name :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo htmlspecialchars($username); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-2 col-xs-offset-2 control-label">Password :</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-2 col-xs-offset-3">
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-danger" type="reset" onclick="location.reload(); ">reset</button>
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-2 col-xs-offset-10">
                            <button type="button" class="btn btn-primary" id="changePassword" onclick="location.href = 'changePassForm.php'">Change Password</button>
                        </div>
                     </div>
                </div>

            </form>

        </div>
    </div>


</div>



<script src="js/functions.js"></script>

</body>



<script src="js/control.js"></script>
</html>
