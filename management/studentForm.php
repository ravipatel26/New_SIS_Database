<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php
include("../lib/config.php");
require("../lib/newStudentProcess.php");
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

<body onload="document.getElementById('displayPosition').style.display = 'none';document.getElementById('displayLevel').style.display = 'none';document.getElementById('displaySummer').style.display = 'none';">

<div class="container-fluid bg-info" style="height: 1500px">
    <div id="navigation">
        <div class="row">
            <?php require("navigationManagement.php"); ?>
        </div>
    </div>
    <div class="panel panel-default  col-lg-6 col-lg-offset-1" style="width: 80%">
        <div class="panel-heading h2 text-center">Student Information Form</div>
            <div class="panel-body">
                <form id="studentInforamtion" method="post" role="form" class="form-horizontal" action="../lib/newStudentSQLProcess.php">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="firstName">First Name :</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo htmlspecialchars($firstName); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="lastName">Last Name :</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo htmlspecialchars($lastName); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="birthDate" >Date of Birth :</label>

                        <div class="col-md-3 date">
                            <div class="input-group input-append date" id="datePicker">
                                <input id="birthDate" name="birthDate" type="text" class="form-control datepicker" value="<?php echo htmlspecialchars($birthDate); ?>"/>
                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-md-2 control-label">Gender :</label>
                        <div class="col-md-4">
                            <label class="radio-inline">
                                <input id="gender1" name="gender" value="Male" type="radio" <?php echo (isset($_POST['gender']) && $_POST['gender']=='Male'? 'checked' : '') ?>>Male</label>
                            <label class="radio-inline">
                                <input id="gender2" name="gender" value="Female" type="radio" <?php echo (isset($_POST['gender']) && $_POST['gender']=='Female' ? 'checked' : '') ?>>Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-md-2 control-label">Address :</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="address" name="address" placeholder="ex: 420 St. Elsewhere" value="<?php echo htmlspecialchars($address); ?>"></div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-md-2 control-label">City :</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="city" name="city" placeholder="ex: Montreal" value="<?php echo htmlspecialchars($city); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="province" class="col-md-2 control-label">Province :</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="province" name="province" placeholder="ex: Quebec" value="<?php echo htmlspecialchars($province); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postalCode" class="col-md-2 control-label">Code Postal :</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="ex: H4B 1R6" value="<?php echo htmlspecialchars($postalCode); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country" class="col-md-2 control-label">Country :</label>
                        <div class="col-md-4">
                            <select id="country" name="country" class="form-control" value="<?php echo htmlspecialchars($country); ?>">
                                <option value="" selected="selected">--- Select a Country ---</option>
                                <?php echo $newStudent->getCountries();?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber" class="col-md-2 control-label">Phone Number :</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="ex: 514-123-4567" value="<?php echo htmlspecialchars($phoneNumber); ?>" onchange="checkPhoneNumber()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-2 control-label">Email</label>
                        <div class="col-md-4">
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($email); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="studentNumber" class="col-md-2 control-label">Student Number :</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="studentNumber" name="studentNumber" placeholder="ex: 12345678" value="<?php echo htmlspecialchars($studentNumber); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-md-2 control-label">Type :</label>
                        <div class="col-md-4">
                            <label class="radio-inline">
                                <input id="inlineradio1" name="type" value="Local" type="radio" <?php echo (isset($_POST['type']) && $_POST['type']=='Local'? 'checked' : '') ?>>Local</label>
                            <label class="radio-inline">
                                <input id="inlineradio2" name="type" value="International" type="radio" <?php echo (isset($_POST['type']) && $_POST['type']=='International' ? 'checked' : '') ?>>International</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-md-2 control-label">Status :</label>
                        <div class="col-md-6">
                            <label class="radio-inline" >
                                <input id="fulltime" name="status" value="Full-Time" type="radio"  onclick="javascript:displayPositionDiv();" <?php echo (isset($_POST['status']) && $_POST['status']=='Full-Time'? 'checked' : '') ?>>Full-Time</label>
                            <label class="radio-inline" >
                                <input id="parttime" name="status" value="Part-Time" type="radio"  onclick="javascript:displayPositionDiv();" <?php echo (isset($_POST['status']) && $_POST['status']=='Part-Time'? 'checked' : '') ?>>Part-Time</label>
                            <label class="radio-inline" >
                                <input id="onleave" name="status" value="On-Leave" type="radio"  onclick="javascript:displayPositionDiv();" <?php echo (isset($_POST['status']) && $_POST['status']=='On-Leave'? 'checked' : '') ?>>On-Leave</label>
                            <label class="radio-inline" >
                                <input id="graduate" name="status" value="Graduate" type="radio"  onclick="javascript:displayPositionDiv();" <?php echo (isset($_POST['status']) && $_POST['status']=='Graduate'? 'checked' : '') ?>>Graduate</label>
                            <label class="radio-inline" >
                                <input id="underGraduate" name="status" value="Under Graduate" type="radio"  onclick="javascript:displayPositionDiv();" <?php echo (isset($_POST['status']) && $_POST['status']=='Under Graduate'? 'checked' : '') ?>>Under Graduate</label>

                        </div>
                    </div>
                    <div class="form-group" id="displayPosition" >
                        <label for="position" class="col-md-2 control-label">Position :</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="position" name="position" placeholder="ex: Software Developer" value="<?php echo htmlspecialchars($position); ?>">
                        </div>
                    </div>
                    <div class="form-group" id="displayLevel">
                        <label for="level" class="col-md-2 control-label">Level :</label>
                        <div class="col-md-4">
                            <select id="level" name="level" class="form-control" value="<?php echo htmlspecialchars($level); ?>">
                                <option value="" selected="selected">--- Select a Level ---</option>
                                <option value="Undergraduate">Undergraduate (BS)</option>
                                <option value="Graduate">Graduate (MS)</option>
                                <option value="Doctorate">Doctorate (PhD)</option>
                                <option value="Post-Doctorate">Post-Doctorate</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="displaySummer" >
                        <label for="summer" class="col-md-2 control-label">Summer Student :</label>
                        <div class="col-md-4">
                            <label class="radio-inline">
                                <input id="yes" name="summer" value="Yes" type="radio" <?php echo (isset($_POST['summer']) && $_POST['summer']=='Yes'? 'checked' : '') ?>>Yes</label>
                            <label class="radio-inline">
                                <input id="no" name="summer" value="No" type="radio" <?php echo (isset($_POST['summer']) && $_POST['summer']=='No' ? 'checked' : '') ?>>No</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="department" class="col-md-2 control-label">Department ID :</label>
                        <div class="col-md-4">
                                <select id="department" name="department" class="form-control" value="<?php echo htmlspecialchars($department); ?>">
                                <option value="" selected="selected">--- Select a Department ---</option>
                                <?php echo $newStudent->getDepartmentName();?>

                            </select>
                        </div>
                    </div>


                    <div class="row text-center">
                        <div class="form-group">
                            <div class="col-md-2 col-xs-offset-2">
                                <button type="submit" class="btn btn-success">Send</button>
                            </div>

                            <div class="col-md-2">
                                <button class="btn btn-danger" type="reset" onclick="location.reload(); ">reset</button>
                            </div>
                        </div>
                    </div>



            </form>
            </div>

            <div id="confirmation" class="alert alert-success hidden">
                <span class="glyphicon glyphicon-star"></span> Student information successfully entered
            </div>
    </div>

</div>


<script src="../js/functions.js"></script>
<?php
if($_SESSION['success']){
    echo '<script> $("#studentInforamtion").addClass("hidden");
            $("#submission").addClass("hidden");
            $("#confirmation").removeClass("hidden");</script>';
    $_SESSION['success'] = false;
}
?>

</body>



<script src="../js/control.js"></script>

</html>
