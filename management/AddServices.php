<?php

	$serviceID = $serviceName = $profID = $serviceYear = '';
		$errServiceID = $errServiceName = $errProfID = $errServiceYear = '';
		$result = '';

	if (isset($_POST['submit'])) {
	
			if (isset($_POST['serviceID']))
			{
				$serviceID = $_POST['serviceID'];
			}
			if (isset($_POST['serviceName']))
			{
				$serviceName = $_POST['serviceName'];
			}
			if (isset($_POST['profID']))
			{
				$profID = $_POST['profID'];
			}
			if (isset($_POST['serviceYear']))
			{
				$serviceYear = $_POST['serviceYear'];
			}

			if (!$_POST['serviceID']) 
			{
				$errServiceID = '*Enter the Service ID';
			}
			if (!$_POST['serviceName']) 
			{
				$errServiceName = '*Enter the Service Name';
			}
			if (!$_POST['profID']) 
			{
				$errProfID = '*Enter the Professor ID';
			}
			if (!$_POST['serviceYear']) 
			{
				$errServiceYear = '*Enter the Service Year';
			}
			
			if (!$errServiceID && !$errServiceName && !$errProfID && !$errServiceYear) 
			{
				$result='<div class="alert alert-success">Form has been submitted!</div>';
			} 
			else 
			{
				$result='<div class="alert alert-danger">Address the errors in the form!</div>';
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
				<div class="panel-heading h2 text-center">Add Services Form</div>
	
	<div class="panel-body">
	
		<form class="form-horizontal" role="form" method="post" action="?controller=Services&action=SubmitServices">
		
			<div class="form-group">
			
				<label for="ServiceID" class="col-sm-3 control-label">Service ID :</label>
				
				<div class="col-sm-9">
					
					<input type="text" class="form-control" id="serviceID" name="serviceID" placeholder="Service ID" value="<?php echo htmlspecialchars($serviceID); ?>">

					<?php echo '<p class="text-danger">'.$errServiceID.'</p>';?>

				</div>

			</div>
			
			<div class="form-group">
			
				<label for="serviceName" class="col-sm-3 control-label">Service name :</label>
				
				<div class="col-sm-9">
					
					<input type="text" class="form-control" id="serviceName" name="serviceName" placeholder="ServiceName" value="<?php echo htmlspecialchars($serviceName); ?>">

					<?php echo '<p class="text-danger">'.$errServiceName.'</p>';?>

				</div>

			</div>
			
			<div class="form-group">
			
				<label for="profID" class="col-sm-3 control-label">Professor ID :</label>
				
				<div class="col-sm-9">
					
					<input type="text" class="form-control" id="profID" name="profID" placeholder="Professor ID" value="<?php echo htmlspecialchars($profID); ?>">

					<?php echo '<p class="text-danger">'.$errProfID.'</p>';?>

				</div>

			</div>
			
			<div class="form-group">
			
				<label for="profNum" class="col-sm-3 control-label">Service Year :</label>
				
				<div class="col-sm-9">
					
					<input type="text" class="date-picker-year form-control" id="serviceYear" name="serviceYear" placeholder="Service Year" value="<?php echo htmlspecialchars($serviceYear); ?>">

					<?php echo '<p class="text-danger">'.$errServiceYear.'</p>';?>

				</div>

			</div>
			
			<div class="form-group">
				
					<div class="col-sm-5 col-sm-offset-5">
					
						<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						
					</div>

				</div>

				<div class="form-group">
				
					<?php echo $result; ?>	

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
		<script src="js/formValidator.js"></script> <!-- Remvoe this! Ravi -->
	</body>
</html>