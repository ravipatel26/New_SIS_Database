<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php
require("lib/config.php");
?>
<!doctype html>
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
        <div class="panel-heading h2 text-center">New Account</div>
        <div class="panel-body">
            <form id="newAccount" method="post" role="form" class="form-horizontal" action="admin/newAccountSQLProcess.php">
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="username">User Name :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="<?php echo htmlspecialchars($username); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-2 col-xs-offset-2 control-label">PassWord :</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" id="password" name="password" placeholder="PassWord" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_password" class="col-md-2 col-xs-offset-2 control-label">Confirm PassWord :</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="PassWord Confirmation" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-2 col-xs-offset-2 control-label">Email</label>
                    <div class="col-md-4">
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($email); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="firstName">First Name :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo htmlspecialchars($firstName); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="lastName">Last Name :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo htmlspecialchars($lastName); ?>">
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
