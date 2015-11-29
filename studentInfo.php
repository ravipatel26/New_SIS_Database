<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php
include("lib/config.php");
require("lib/studentLevelInfoProcess.php");
?>
<!DOCTYPE html>
<html>
<?php require("header.php");?>

<body>
<div class="container-fluid bg-info" style="height: 1500px">
    <div id="navigation">
        <div class="row">
            <?php require("navigation.php"); ?>
        </div>
    </div>
    <div class="panel panel-default  col-lg-6 col-lg-offset-1" style="width: 80%">
        <div class="panel-heading h2 text-center">Student Info</div>
        <div class="panel-body">
            <div id="query01Title" class="row" >
                <div class="col-md-12 h3 text-center">Search graduated student level.</div>
            </div>
            <form id="studentLevel" class="form-horizontal" role="form" method="post" action="lib/studentLevelInfoSQLProcess.php">

                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="professorName">Professor's Name :</label>
                    <div class="col-md-3">
                        <select id="professorName" name="professorName" class="form-control" value="<?php echo htmlspecialchars($professorName); ?>">
                            <?php echo $levelInfo->getProfessorNameId2();?>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="displayLevel">
                    <label for="level" class="col-md-2 col-xs-offset-2 control-label">Level :</label>
                    <div class="col-md-3">
                        <select id="level" name="level" class="form-control" value="<?php echo htmlspecialchars($level); ?>" onchange="checkSummerStudent(this.value)">
                            <option value="" selected="selected">--- Select a Level ---</option>
                            <option value="Undergraduate">Undergraduate (BS)</option>
                            <option value="Master">Master (MS)</option>
                            <option value="Doctorate">Doctorate (PhD)</option>
                            <option value="Post-Doctorate">Post-Doctorate</option>
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
                            <button class="btn btn-danger" type="reset" onclick="window.location.replace('studentInfo.php'); ">reset</button>
                        </div>
                    </div>
                </div>

            </form>

            <?php
            if(!empty($levelResult)){
                echo $table;
            }
            ?>


        </div>
    </div>


</div>

<!--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/bootstrap-datepicker.js"></script>-->

<script src="js/functions.js"></script>

</body>



<script src="js/control.js"></script>
</html>
