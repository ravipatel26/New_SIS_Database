<?php
	$result = '';

	# General info
	$firstName = $lastName = $birthDate = $gender = $address = $city = $province = $postalCode = $country = '';
	$errFirstName = $errLastName = $errBirthDate = $errGender = $errAddress = $errCity = $errProvince = $errPostalCode = $errCountry = '';

	# Student info
	$studentNumber = $phoneNumber = $email = $status = $type = $position = $level = $program = $department = '';
	$errStudentNumber = $errPhoneNumber = $errEmail = $errStatus = $errType = $errPosition = $errLevel = $errProgram = $errDepartment = '';

	if (isset($_POST['submit'])) {
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$birthDate = $_POST['birthDate'];
		$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
		$address = $_POST['address'];
		$city = $_POST['city'];
		$province = $_POST['province'];
		$postalCode = $_POST['postalCode'];
		$country = $_POST['country'];
		$phoneNumber = $_POST['phoneNumber'];
		$email = $_POST['email'];
		$studentNumber = $_POST['studentNumber'];
		$status = isset($_POST['status']) ? $_POST['status'] : '';
		$type = isset($_POST['type']) ? $_POST['type'] : '';
		$position = $_POST['position'];
		// if student type is not graduate then positio should be blank
		if (isset($_POST['status']) && $_POST['status'] != 'Graduated') {
			$position = '';
		}
		$level = $_POST['level'];
		$program = $_POST['program'];
		$department = $_POST['department'];
		
		// Check if first name and last name has been entered
		if (!$_POST['firstName']) {
			$errFirstName = '*Enter your First Name';
		}
		if (!$_POST['lastName']) {
			$errLastName = '*Enter your Last Name';
		}
		// Check if birth date has been entered
		if (!$_POST['birthDate']) {
			$errBirthDate = '*Enter your Date of Birth';
		}
		// Check if gender has been selected
		if (!isset($_POST['gender'])) {
			$errGender = '*Select a Gender';
		}
		// Check if address has been entered
		if (!$_POST['address']) {
			$errAddress = '*Enter your address';
		}
		// Check if city has been entered
		if (!$_POST['city']) {
			$errCity = '*Enter a valid city';
		}
		// Check if province has been entered
		if (!$_POST['province']) {
			$errProvince = '*Enter a valid Province';
		}
		// Check if zip code has been entered
		if (!$_POST['postalCode']) {
			$errPostalCode = '*Enter a valid Postal Code';
		}
		// Check if country has been entered
		if (!$_POST['country']) {
			$errCountry = '*Select a Country';
		}
		// Check if phone has been entered
		if (!$_POST['phoneNumber']) {
			$errPhoneNumber = '*Enter your Phone Number';
		}
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = '*Enter a valid Email';
		}
		// Check if student number has been entered
		if (!$_POST['studentNumber']) {
			$errStudentNumber = '*Enter your Student Number';
		}
		// Check if student status has been selected
		if (!isset($_POST['status'])) {
			$errStatus = '*Choose a Status';
		}
		// Check if student status has been selected
		if (!isset($_POST['type'])) {
			$errType = '*Select a Student Type';
		}
		// Check if student status has been selected
		if (!($_POST['position'])) {
			$errPosition = '*Enter your Position';
		}
		// Check if student level has been selected
		if (!$_POST['level']) {
			$errLevel = '*Select a Student Level';
		}
		// Check if student status has been selected
		if (!$_POST['program']) {
			$errProgram = '*Enter a valid Program';
		}
		// Check if student status has been selected
		if (!$_POST['department']) {
			$errDepartment = '*Enter a valid Department';
		}
		
		// If there are no errors, send the email
	//  if (!$errFirstName && !$errLastName && !$errBirthDate && !$errGender && !$errAddress && !$errCity && !$errProvince && !$errPostalCode && !$errCountry && !$errStudentNumber && !$errPhoneNumber && !$errEmail && !$errStatus && !$errtype && !$errPosition && $_POST['status'] == 'Graduated' && !$errLevel && !$errProgram && !$errDepartment) {
		if (!$errFirstName && !$errLastName && !$errBirthDate && !$errGender && !$errAddress && !$errCity && !$errProvince && !$errPostalCode && !$errCountry && !$errStudentNumber && !$errPhoneNumber && !$errEmail && !$errType && !$errStatus && !$position && $_POST['status'] != 'Graduated' && !$errLevel && !$errProgram && !$errDepartment) {
			$result='<div class="alert alert-success">Form has been submitted!</div>';
		} else {
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
		<div class="container-fluid bg-info" style="height: 1500px" >
			<div id="navigation">
				<div class="row">
					<?php require("navigationAdmin.php"); ?>
				</div>
			</div>
			<div class="panel panel-default  col-lg-6 col-lg-offset-1" style="width: 80%">
				<div class="panel-heading h2 text-center">Editorial Board Form</div>
				<div class="panel-body">
					<form id="editorialBoardInforamtion" class="form-horizontal" role="form" method="post" action="editorialBoardForm.php"> <!-- CHANGE the ACTION! -->
						<div class="form-group">
							<label for="firstName" class="col-sm-5 control-label">Professor's First Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="firstName" name="firstName" placeholder="Professor's First Name" value="<?php echo htmlspecialchars($firstName); ?>">
								 <?php echo '<p class="text-danger">'.$errFirstName.'</p>';?>
							</div>
						</div>
						<div class="form-group">
							<label for="firstName" class="col-sm-5 control-label">Professor's Last Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="firstName" name="firstName" placeholder="Professor's Last Name" value="<?php echo htmlspecialchars($firstName); ?>">
								 <?php echo '<p class="text-danger">'.$errFirstName.'</p>';?>
							</div>
						</div>
						<div class="form-group">
							<label for="firstName" class="col-sm-5 control-label">Editorial Board Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="firstName" name="firstName" placeholder="Editorial Board Name" value="<?php echo htmlspecialchars($firstName); ?>">
								 <?php echo '<p class="text-danger">'.$errFirstName.'</p>';?>
							</div>
						</div>
						<div class="form-group">
							<label for="firstName" class="col-sm-5 control-label">Journal Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="firstName" name="firstName" placeholder="Journal Name" value="<?php echo htmlspecialchars($firstName); ?>">
								 <?php echo '<p class="text-danger">'.$errFirstName.'</p>';?>
							</div>
						</div>
						<div class="form-group">
							<label for="firstName" class="col-sm-5 control-label">Journal Publication Year :</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="publicationYear" name="publicationYear" placeholder="Year" value="<?php echo htmlspecialchars($firstName); ?>">
								 <?php echo '<p class="text-danger">'.$errFirstName.'</p>';?>
							</div>
						</div>
						<div class="form-group">
                            <div class="col-sm-5 col-sm-offset-5">
                                <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5 col-sm-offset-5">
                                <?php echo $result; ?>	
                            </div>
                        </div>
					</form> 
				</div>
			</div> 
		</div><!----container fluid------->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery_min_1112.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script type="text/javascript">
			$("#publicationYear").datepicker( {
				format: " yyyy",
				viewMode: "years", 
				minViewMode: "years"
			});
		</script>
	</body>
</html>