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
<!DOCTYPE html>
<html lang="en" xmlns:width="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Comp 335</title>

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/basic-template.css" rel="stylesheet" />



    <link href="../css/general.css" rel="stylesheet" type="text/css">
    <link href="../css/navColor.css" rel="stylesheet" type="text/css">
<!--    <link href="../css/datepicker.css" rel="stylesheet" type="text/css">-->

    <!-- BootstrapValidator CSS -->
    <link href="../css/bootstrapValidator.min.css" rel="stylesheet"/>


    <link href="../css/general.css" rel="stylesheet" type="text/css">
    <link href="../css/navColor.css" rel="stylesheet" type="text/css">

    <!-- jQuery and Bootstrap JS -->
    <script src="../js/jquery.min.js" type="text/javascript"></script>


    <!-- BootstrapValidator -->
    <script src="../js/bootstrapValidator.min.js" type="text/javascript"></script>

    <!-- Include Bootstrap Datepicker -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

    <script src="../js/bootstrap-datepicker.min.js"></script>
    <script src="../js/formValidation.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.min.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->
    <script src="../js/control.js"></script>

</head>
<body>
<div class="container-fluid bg-info">
    <div id="navigation">
        <div class="row">
            <?php require("navigationManagement.php"); ?>
        </div>
    </div>
    <div class="panel panel-default  col-lg-6 col-lg-offset-1" style="width: 80%; height: 120%">
        <div class="panel-heading h2 text-center">Student Information Form</div>
            <div class="panel-body">
                <form id="studentInforamtion" method="POST" class="form-horizontal" action="../lib/newStudentSQLProcess.php">
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
                                <input id="gender1" name="gender" value="Local" type="radio" <?php echo (isset($_POST['gender']) && $_POST['gender']=='Male'? 'checked' : '') ?>>Male</label>
                            <label class="radio-inline">
                                <input id="gender2" name="gender" value="International" type="radio" <?php echo (isset($_POST['gender']) && $_POST['gender']=='Female' ? 'checked' : '') ?>>Female</label>
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
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="ex: (514) 123-4567" value="<?php echo htmlspecialchars($phoneNumber); ?>" onchange="checkPhoneNumber()">
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
                        <div class="col-md-4">
                            <label class="radio-inline" >
                                <input id="fulltime" name="status" value="Full-Time" type="radio"  onclick="javascript:displayPositionDiv();" <?php echo (isset($_POST['status']) && $_POST['status']=='Full-Time'? 'checked' : '') ?>>Full-Time</label>
                            <label class="radio-inline" >
                                <input id="parttime" name="status" value="Part-Time" type="radio"  onclick="javascript:displayPositionDiv();" <?php echo (isset($_POST['status']) && $_POST['status']=='Part-Time'? 'checked' : '') ?>>Part-Time</label>
                            <label class="radio-inline" >
                                <input id="onleave" name="status" value="On-Leave" type="radio"  onclick="javascript:displayPositionDiv();" <?php echo (isset($_POST['status']) && $_POST['status']=='On-Leave'? 'checked' : '') ?>>On-Leave</label>
                            <label class="radio-inline" >
                                <input id="graduated" name="status" value="Graduated" type="radio"  onclick="javascript:displayPositionDiv();" <?php echo (isset($_POST['status']) && $_POST['status']=='Graduated'? 'checked' : '') ?>>Graduated</label>
                          </div>
                    </div>
                    <div class="form-group" id="displayPosition" >
                        <label for="position" class="col-md-2 control-label">Position :</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="position" name="position" placeholder="ex: Software Developer" value="<?php echo htmlspecialchars($position); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="level" class="col-md-2 control-label">Level :</label>
                        <div class="col-md-4">
                            <select id="level" name="level" class="form-control" value="<?php echo htmlspecialchars($level); ?>">
                                <option value="" selected="selected">--- Select a Level ---</option>
                                <option value="Undergraduate">Undergraduate (BS)</option>
                                <option value="Graduate">Graduate (MS)</option>
                                <option value="Doctorate">Doctorate (PhD)</option>
                                <option value="Post-Doctorate">Post-Doctorate</option>
                            </select>
                            <?php echo '<p class="text-danger">'.$errLevel.'</p>';?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="program" class="col-md-2 control-label">Program :</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="program" name="program" placeholder="ex: Software Engineering" value="<?php echo htmlspecialchars($program); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="department" class="col-md-2 control-label">Department ID :</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="department" name="department" placeholder="ex: ENCS" value="<?php echo htmlspecialchars($department); ?>">
                        </div>
                    </div>

                    <div id="submission" class="form-group">
                        <div class="col-md-6 col-md-offset-2">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

            </form>
        </div>

            <div id="confirmation" class="alert alert-success hidden">
                <span class="glyphicon glyphicon-star"></span> Student information successfully entered
            </div>
    </div>

</div>

<!--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/bootstrap-datepicker.js"></script>-->

<script src="../js/functions.js"></script>

</body>



<script src="../js/control.js"></script>
</html>
