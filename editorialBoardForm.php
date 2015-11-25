<?php

	$result = $profFirstName = $profLastName = $editorialBoardName = $journalName = $journalYear = '';

	if (isset($_POST['submit'])) {
		$profFirstName = $_POST['profFirstName'];
		$profLastName = $_POST['profLastName'];
		$editorialBoardName = $_POST['editorialBoardName'];
		$journalName = $_POST['journalName'];
		$journalYear = $_POST['journalYear'];
		
		if (!$_POST['profFirstName']) {
			$errFirstName = '*Enter your First Name';
		}
		if (!$_POST['profLastName']) {
			$errLastName = '*Enter your Last Name';
		}
		if (!$_POST['editorialBoardName']) {
			$errBirthDate = '*Enter your Date of Birth';
		}
		if (!$_POST['journalName']) {
			$errGender = '*Select a Gender';
		}
		if (!$_POST['journalYear']) {
			$errAddress = '*Enter your address';
		}
		
		// Final result
		if (!$errFirstName && !$errLastName && !$errBirthDate && !$errGender && !$errAddress) {
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
		<title>Editorial Board</title>
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
				<div class="panel-heading h2 text-center">Editorial Board Form</div>
				<div class="panel-body">
					<form id="editorialBoardInforamtion" class="form-horizontal" role="form" method="post" action="editorialBoardForm.php"> <!-- CHANGE the ACTION! -->
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
							<label for="editorialBoardName" class="col-sm-5 control-label">Editorial Board Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="editorialBoardName" name="editorialBoardName" placeholder="Editorial Board Name" value="<?php echo htmlspecialchars($editorialBoardName); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="journalName" class="col-sm-5 control-label">Journal Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="journalName" name="journalName" placeholder="Journal Name" value="<?php echo htmlspecialchars($journalName); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="year" class="col-sm-5 control-label">Journal Publication Year :</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="year" name="year" placeholder="Year" value="<?php echo htmlspecialchars($journalYear); ?>">
							</div>
						</div>
						<div class="form-group">
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