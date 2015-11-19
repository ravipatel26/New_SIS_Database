<?php
	$result = $deptName = $deptPhone = '';
	if (isset($_POST['submit'])) {
		$deptName = $_POST['deptName'];
		$deptPhone = $_POST['deptPhone'];
		
		if (!$_POST['deptName']) {
			$errDeptName = '*Enter Department Name';
		}
		if (!$_POST['deptPhone']) {
			$errDeptPhone = '*Enter Department Phone Number';
		}
		
		// Final result
		if (!$errDeptName && !$errDeptPhone) {
			$result='<div class="alert alert-success">Form has been submitted!</div>';
		} else {
			$result='<div class="alert alert-danger">Errors in the form!</div>';
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Department</title>
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="css/general.css" rel="stylesheet" type="text/css">
		<link href="css/navColor.css" rel="stylesheet" type="text/css">
		<link href="css/datepicker.css" rel="stylesheet" type="text/css">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
		<script src="js/control.js"></script>
	</head>

	<body>
		<div class="container-fluid">
			<div id="navigation">
				<div class="row">
					<?php require("navigationAdmin.php"); ?>
				</div>
			</div>
			<div class="panel panel-default col-lg-6 col-lg-offset-1" style="width: 80%">
				<div class="panel-heading h2 text-center">Department Form</div>
				<div class="panel-body">
					<form id="reviewInformation" class="form-horizontal" role="form" method="post" action="departmentForm.php"> <!-- CHANGE the ACTION! -->
						<div class="form-group">
							<label for="deptName" class="col-sm-5 control-label">Department Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="deptName" name="deptName" placeholder="Department Name" value="<?php echo htmlspecialchars($deptName); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="deptPhone" class="col-sm-5 control-label">Department Phone # :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="deptPhone" name="deptPhone" placeholder="Department Phone #" value="<?php echo htmlspecialchars($deptPhone); ?>">
							</div>
						</div>
                            <div class="col-sm-5 col-sm-offset-5">
                                <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                            </div>
                        </div>
						<div class="form-group">
                            <?php echo '<p>'.$result.'</p>'?>
                        </div>
					</form> 
				</div>
				<div id="confirmation" class="alert alert-success hidden">
					<span class="glyphicon glyphicon-star"></span>Information successfully entered!
				</div>
			</div> 
		</div><!----container fluid------->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery_min_1112.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/formValidator.js"></script>
	</body>
</html>