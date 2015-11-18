<?php
	$result = $researchName = $profFirstName = $profLastName = $studFirstName = $studLastName = $resStartDate = $resEndDate = '';
	if (isset($_POST['submit'])) {
		$researchName = $_POST['researchName'];
		$profFirstName = $_POST['profFirstName'];
                $profLastName = $_POST['profLastName'];
                $studFirstName = $_POST['studFirstName'];
                $studFirstName = $_POST['studLastName'];
                $resStartDate = $_POST['resStartDate'];
                $resEndDate = $_POST['resEndDate'];
		
		if (!$_POST['researchName']) {
			$errResearchName = '*Enter Research Name';
		}
		if (!$_POST['profFirstName']) {
			$errProfFirstName = '*Enter Professor\'s First Name';
		}
		if (!$_POST['profLastName']) {
			$errProfLastName = '*Enter Professor\'s Last Name';
		}
		if (!$_POST['studFirstName']) {
			$errStudFirstName = '*Enter Student\'s First Name';
		}
		if (!$_POST['studLastName']) {
			$errStudLastName = '*Enter Student\'s Last Name';
		}
                if (!$_POST['resStartDate']) {
                        $errResStartDate = '*Enter Research Start Date';
                }
                if (!$_POST['resEndDate']) {
                        $errResEndDate = '*Enter Research End Date';
                }
		
		// Final result
		if (!$errResearchName && !$errProfFirstName && !$errProfLastName && !$errStudFirstName && !$errStudLastName && !$errResStartDate && !$errResEndDate) {
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
		<title>Grant</title>
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
				<div class="panel-heading h2 text-center">Research Form</div>
				<div class="panel-body">
					<form id="researchInformation" class="form-horizontal" role="form" method="post" action="researchForm.php"> <!-- CHANGE the ACTION! -->
						<div class="form-group">
							<label for="researchName" class="col-sm-5 control-label">Research Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="researchName" name="researchName" placeholder="Research Name" value="<?php echo htmlspecialchars($researchName); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="profFirstName" class="col-sm-5 control-label">Professor's First Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="profFirstName" name="profFirstName" placeholder="Professor's First Name" value="<?php echo htmlspecialchars($profFirstName); ?>">
							</div>
						</div>
                                                <div class="form-group">
							<label for="profLastName" class="col-sm-5 control-label">Professor's Last Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="profLastName" name="profLastName" placeholder="Professor's Last Name" value="<?php echo htmlspecialchars($profLastName); ?>">
							</div>
						</div>
                                                <div class="form-group">
							<label for="studFirstName" class="col-sm-5 control-label">Student's First Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="studFirstName" name="studFirstName" placeholder="Student's First Name" value="<?php echo htmlspecialchars($studFirstName); ?>">
							</div>
						</div>
                                                <div class="form-group">
							<label for="studLastName" class="col-sm-5 control-label">Student's Last Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="studLastName" name="studLastName" placeholder="Student's Last Name" value="<?php echo htmlspecialchars($studLastName); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="resStartDate" class="col-sm-5 control-label">Research Start Date :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="resStartDate" name="resStartDate" placeholder="Research Start Date" value="<?php echo htmlspecialchars($resStartDate); ?>">
							</div>
						</div>
                                                <div class="form-group">
							<label for="resEndDate" class="col-sm-5 control-label">Research End Date :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="resEndDate" name="resEndDate" placeholder="Research End Date" value="<?php echo htmlspecialchars($resEndDate); ?>">
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