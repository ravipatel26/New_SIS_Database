<?php
	$result = $reviewName = $journalName = $journalYear = '';
	if (isset($_POST['submit'])) {
		$reviewName = $_POST['reviewName'];
		$journalName = $_POST['journalName'];
                $journalYear = $_POST['journalYear'];
		
		if (!$_POST['reviewName']) {
			$errReviewName = '*Enter Review Name';
		}
		if (!$_POST['journalName']) {
			$errJournalName = '*Enter Journal Name';
		}
		if (!$_POST['journalYear']) {
			$errJournalYear = '*Enter Journal Year';
		}
		
		// Final result
		if (!$errReviewName && !$errJournalName && !$errJournalYear) {
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
		<title>Review</title>
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
				<div class="panel-heading h2 text-center">Review Form</div>
				<div class="panel-body">
					<form id="reviewInformation" class="form-horizontal" role="form" method="post" action="reviewForm.php"> <!-- CHANGE the ACTION! -->
						<div class="form-group">
							<label for="reviewName" class="col-sm-5 control-label">Review Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="reviewName" name="reviewName" placeholder="Review Name" value="<?php echo htmlspecialchars($reviewName); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="journalName" class="col-sm-5 control-label">Journal Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="journalName" name="journalName" placeholder="Journal Name" value="<?php echo htmlspecialchars($journalName); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="journalYear" class="col-sm-5 control-label">Journal Year :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="journalYear" name="journalYear" placeholder="Journal Year" value="<?php echo htmlspecialchars($journalYear); ?>">
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