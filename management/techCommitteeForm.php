<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php
include("../lib/config.php");
require("../lib/newCommitteeProcess.php");
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

<body>
<div class="container-fluid bg-info" style="height: 900px">
	<div id="navigation">
		<div class="row">
			<?php require("navigationManagement.php"); ?>
		</div>
	</div>
			<div class="panel panel-default col-lg-6 col-lg-offset-1" style="width: 80%">
				<div class="panel-heading h2 text-center">Technical Program Committee Form</div>
				<div class="panel-body">
					<form id="techCommitteeName" class="form-horizontal" role="form" method="post" action="../lib/newCommitteSQLProcess.php">
						<div class="form-group">
							<label for="profFirstName" class="col-md-3 col-xs-offset-1 control-label">Professor's First Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="profFirstName" name="profFirstName" placeholder="Professor's First Name" value="<?php echo htmlspecialchars($profFirstName); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="profLastName" class="col-md-3 col-xs-offset-1 control-label">Professor's Last Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="profLastName" name="profLastName" placeholder="Professor's Last Name" value="<?php echo htmlspecialchars($profLastName); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="techCommitteeName" class="col-md-3 col-xs-offset-1 control-label">Technical Program Committee Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="techCommitteeName" name="techCommitteeName" placeholder="Editorial Board Name" value="<?php echo htmlspecialchars($techCommitteeName); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="committeeYear" class="col-md-3 col-xs-offset-1 control-label">Member Since (Year) :</label>
							<div class="col-md-3 date">
								<div class="input-group input-append date" id="committeeFormYear">
									<input id="committeeYear" name="committeeYear" type="text" class="form-control datepicker" value="<?php echo htmlspecialchars($memberSinceYear); ?>"/>
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
								</div>
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
					<span class="glyphicon glyphicon-star"></span>Information successfully entered!
				</div>
			</div> 
		</div><!----container fluid------->


		<!--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!--<script src="../js/bootstrap-datepicker.js"></script>-->

		<<script src="../js/functions.js"></script>
		<?php
		if($_SESSION['success']){
			echo '<script> $("#techCommitteeName").addClass("hidden");
            $("#submission").addClass("hidden");
            $("#confirmation").removeClass("hidden");</script>';
			$_SESSION['success'] = false;
		}
		?>

</body>



<script src="../js/control.js"></script>

</html>
