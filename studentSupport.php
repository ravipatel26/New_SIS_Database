<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php
include("lib/config.php");
require("lib/supportInfoProcess.php");
?>
<!DOCTYPE html>
<html>
<?php require("header.php");?>

<body>
<div class="container-fluid bg-info" style="height: 100%">
    <div id="navigation">
        <div class="row">
            <?php require("navigation.php"); ?>
        </div>
    </div>
    <div class="panel panel-default  col-lg-6 col-lg-offset-1" style="width: 80%; height: 1200px;">
        <div class="panel-heading h2 text-center">Student Financial Support</div>
        <div class="panel-body">
            <div id="query01Title" class="row" >
                <div class="col-md-12 h3 text-center">Total support a student received.</div>
            </div>
            <form id="supportInfo" class="form-horizontal" role="form" method="post" action="lib/supportSQLProcess.php">
                <div class="form-group">
                    <label for="studentName" class="col-md-2 col-xs-offset-2 control-label">Student Name :</label>
                    <div class="col-md-4">
                        <select id="studentName" name="studentName" class="form-control" value="<?php echo htmlspecialchars($studentName); ?>" onchange="getDepartmentName(this.value)">
                            <option value="" selected="selected">--- Select a Student ---</option>
                            <?php echo $supportInfo->getStudentNameWithId();?>
                        </select>
                    </div>
                </div>

                <!--                submit and reset buttons-->
                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-2 col-xs-offset-2">
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-danger" type="reset" onclick="window.location.replace('studentSupport.php'); ">reset</button>
                        </div>
                    </div>
                </div>

            </form>

            <?php
            if(!empty($supportResult)){
                echo $table;
            }
            ?>

        </div>
    </div>


</div>


<script src="js/functions.js"></script>

<script src="js/control.js"></script>

</body>



</html>
