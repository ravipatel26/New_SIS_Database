<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php
include("lib/config.php");
require("lib/committeesInfoProcess.php");
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
        <div class="panel-heading h2 text-center">Committees Info</div>
        <div class="panel-body">

            <div id="query08Title" class="row" >
                <div class="col-md-12 h3 text-center">List of Committees Membership by Academic Year.</div>
            </div>
            <form id="committeeList" class="form-horizontal" role="form" method="post" action="lib/committeesInfoSQLProcess.php">

                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="professorName">Professor's Name :</label>
                    <div class="col-md-3">
                        <select id="professorName" name="professorName" class="form-control" value="<?php echo htmlspecialchars($professorName); ?>">
                            <?php echo $committeesInfo->getProfessorNameId2();?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-offset-2 h3">Membership period from:</div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="semester1">Semester :</label>
                    <div class="col-md-3">
                        <select id="semester1" name="semester1" class="form-control" value="<?php echo htmlspecialchars($semester); ?>">
                            <option value="" selected="selected">--- Select from semester ---</option>
                            <?php echo $committeesInfo->getSemesterNameId();?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="year">Year:</label>
                    <div class="col-md-3">
                        <select id="year" name="year" class="form-control" value="<?php echo htmlspecialchars($year); ?>">
                            <option value="" selected="selected">--- Select from year---</option>
                            <?php echo $committeesInfo->getYearMember();?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-offset-2 h3">Membership period to:</div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="semester2">Semester :</label>
                    <div class="col-md-3">
                        <select id="semester2" name="semester2" class="form-control" value="<?php echo htmlspecialchars($semester); ?>">
                            <option value="" selected="selected">--- Select to semester ---</option>
                            <?php echo $committeesInfo->getSemesterNameId();?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="year2">To Year:</label>
                    <div class="col-md-3">
                        <select id="year2" name="year2" class="form-control" value="<?php echo htmlspecialchars($year2); ?>">
                            <option value="" selected="selected">--- Select To year ---</option>
                            <?php echo $committeesInfo->getYearMember();?>
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
                            <button class="btn btn-danger" type="reset" onclick="window.location.replace('committeeInfo.php'); ">reset</button>
                        </div>
                    </div>
                </div>

            </form>


            <?php
            if(!empty($committeesResult)){
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
