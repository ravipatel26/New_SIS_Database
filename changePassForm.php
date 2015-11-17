<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php
include("lib/config.php");
require("lib/sqlQueries.php");
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
        <div class="panel-heading h2 text-center">Change Your Password</div>
        <div class="panel-body">
            <form id="changePassword" method="post" role="form" class="form-horizontal" action="admin/changingSQLPass.php">
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="username">User Name :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="<?php echo htmlspecialchars($username); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="oldPassword" class="col-md-2 col-xs-offset-2 control-label">Old PassWord :</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Old PassWord" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="newPassword" class="col-md-2 col-xs-offset-2 control-label">New PassWord :</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New PassWord" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_newPassword" class="col-md-2 col-xs-offset-2 control-label">Confirm New PassWord :</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" id="confirm_newPassword" name="confirm_newPassword" placeholder="PassWord New Confirmation" value="">
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
                            <button type="button" class="btn btn-primary" id="changePassword" onclick="location.href='index.php'">Cancel</button>
                        </div>
                    </div>
                </div>

            </form>



        </div>
    </div>


</div>

<!--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/bootstrap-datepicker.js"></script>-->

<script src="js/functions.js"></script>

</body>



<script src="js/control.js"></script>
</html>
