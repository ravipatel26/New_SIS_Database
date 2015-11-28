<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php
include("lib/config.php");
require("lib/courseInfoProcess.php");
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
    <div class="panel panel-default  col-lg-6 col-lg-offset-1" style="width: 80%; height: 1500px;">
        <div class="panel-heading h2 text-center">Course Info</div>
        <div class="panel-body">
            <div id="query01Title" class="row" >
                <div class="col-md-12 h3 text-center">Search semesters a course is taught.</div>
            </div>
            <form id="listSemester" class="form-horizontal" role="form" method="post" action="lib/courseInfoSQLProcess.php">

                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="professorName">Professor's Name :</label>
                    <div class="col-md-3">
                        <select id="professorName" name="professorName" class="form-control" value="<?php echo htmlspecialchars($professorName); ?>">
                            <?php echo $courseInfo->getProfessorNameId2();?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="courses">Course's Name :</label>
                    <div class="col-md-3">
                        <select id="courses" name="courses" class="form-control" value="<?php echo htmlspecialchars($courses); ?>">
                            <option value="" selected="selected">--- Select a Course's Name ---</option>
                            <?php echo $courseInfo->getCourseNameId2();?>
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
                            <button class="btn btn-danger" type="reset" onclick="window.location.replace('courseInfo.php'); ">reset</button>
                        </div>
                     </div>
                </div>

            </form>

            <?php
                if(!empty($semesterResult)){
                    echo $table;
                }
            ?>


            <div id="query02Title" class="row" >
                <div class="col-md-12 h3 text-center">Search courses taught by semester in a given range of years.</div>
            </div>
            <form id="coursesBySemester" class="form-horizontal" role="form" method="post" action="lib/courseInfoTaughtSQLProcess.php">

                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="professorName">Professor's Name :</label>
                    <div class="col-md-3">
                        <select id="professorName" name="professorName" class="form-control" value="<?php echo htmlspecialchars($professorName); ?>">
                            <?php echo $courseInfo->getProfessorNameId2();?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-offset-2 h3">Taught from:</div>
                </div>
                        <div class="form-group">
                            <label class="col-md-2 col-xs-offset-2 control-label" for="semester1">Semester :</label>
                            <div class="col-md-3">
                                <select id="semester1" name="semester1" class="form-control" value="<?php echo htmlspecialchars($semester); ?>">
                                    <option value="" selected="selected">--- Select taught from semester ---</option>
                                    <?php echo $courseInfo->getSemesterNameId();?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 col-xs-offset-2 control-label" for="year">Year:</label>
                            <div class="col-md-3">
                                <select id="year" name="year" class="form-control" value="<?php echo htmlspecialchars($year); ?>">
                                    <option value="" selected="selected">--- Select taught from year---</option>
                                    <?php echo $courseInfo->getYearTaught();?>
                                </select>
                            </div>
                        </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-offset-2 h3">Taught to:</div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="semester2">Semester :</label>
                    <div class="col-md-3">
                        <select id="semester2" name="semester2" class="form-control" value="<?php echo htmlspecialchars($semester); ?>">
                            <option value="" selected="selected">--- Select taught to semester ---</option>
                            <?php echo $courseInfo->getSemesterNameId();?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-offset-2 control-label" for="year2">To Year:</label>
                    <div class="col-md-4">
                        <select id="year2" name="year2" class="form-control" value="<?php echo htmlspecialchars($year2); ?>">
                            <option value="" selected="selected">--- To year ---</option>
                            <?php echo $courseInfo->getYearTaught();?>
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
                            <button class="btn btn-danger" type="reset" onclick="window.location.replace('courseInfo.php'); ">reset</button>
                        </div>
                    </div>
                </div>

            </form>


            <?php
            if(!empty($courseResult)){
                echo $table2;
            }
            ?>


        </div>
    </div>



</div>


<script src="js/functions.js"></script>

</body>



<script src="js/control.js"></script>
</html>
