<div class="col-md-6 col-md-offset-3">

	<div class="panel-heading h2 text-center">Add Grants Form</div>
	
	<div class="panel-body">
	
		<form class="form-horizontal" role="form" method="post" action="?controller=Grants&action=SubmitGrants">
		
			<div class="form-group">
			
				<label for="GrantID" class="col-sm-3 control-label">Grant ID :</label>
				
				<div class="col-sm-9">
					
					<input type="text" class="form-control" id="grantID" name="grantID" placeholder="Grant ID" value="<?php echo htmlspecialchars($grantID); ?>">

					<?php echo '<p class="text-danger">'.$errGrantID.'</p>';?>

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
			
				<label for="studentID" class="col-sm-3 control-label">Student ID :</label>
				
				<div class="col-sm-9">
					
					<input type="text" class="form-control" id="studentID" name="studentID" placeholder="Student ID" value="<?php echo htmlspecialchars($studentID); ?>">

					<?php echo '<p class="text-danger">'.$errStudentID.'</p>';?>

				</div>

			</div>
			
			<div class="form-group">
			
				<label for="researchID" class="col-sm-3 control-label">Research ID :</label>
				
				<div class="col-sm-9">
					
					<input type="text" class="form-control" id="researchID" name="researchID" placeholder="Research ID" value="<?php echo htmlspecialchars($researchID); ?>">

					<?php echo '<p class="text-danger">'.$errResearchID.'</p>';?>

				</div>

			</div>
			
			<div class="form-group">
			
				<label for="grantAmt" class="col-sm-3 control-label">Grant Amount :</label>
				
				<div class="col-sm-9">
					
					<input type="text" class="form-control" id="grantAmt" name="grantAmt" placeholder="Grant Amount" value="<?php echo htmlspecialchars($grantAmt); ?>">

					<?php echo '<p class="text-danger">'.$errGrantAmt.'</p>';?>

				</div>

			</div>
			
			<div class="form-group">
			
				<label for="profNum" class="col-sm-3 control-label">Grant Year :</label>
				
				<div class="col-sm-9">
					
					<input type="text" class="date-picker-year form-control" id="grantYear" name="grantYear" placeholder="Grant Year" value="<?php echo htmlspecialchars($grantYear); ?>">

					<?php echo '<p class="text-danger">'.$errGrantYear.'</p>';?>

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
	
</div>