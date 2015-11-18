<div class="col-md-6 col-md-offset-3">

	<div class="panel-heading h2 text-center">Add Professor Form</div>
	
	<div class="panel-body">
	
		<form class="form-horizontal" role="form" method="post" action="?controller=Professor&action=SubmitProfessor">
		
			<div class="form-group">
			
				<label for="profID" class="col-sm-3 control-label">Professor ID :</label>
				
				<div class="col-sm-9">
					
					<input type="text" class="form-control" id="profID" name="profID" placeholder="Professor ID" value="<?php echo htmlspecialchars($profID); ?>">

					<?php echo '<p class="text-danger">'.$errProfID.'</p>';?>

				</div>

			</div>
			
			<div class="form-group">
			
				<label for="deptID" class="col-sm-3 control-label">Department ID :</label>
				
				<div class="col-sm-9">
					
					<input type="text" class="form-control" id="deptID" name="deptID" placeholder="Department ID" value="<?php echo htmlspecialchars($deptID); ?>">

					<?php echo '<p class="text-danger">'.$errDeptID.'</p>';?>

				</div>

			</div>
			
			<div class="form-group">
			
				<label for="courseID" class="col-sm-3 control-label">Course ID :</label>
				
				<div class="col-sm-9">
					
					<input type="text" class="form-control" id="courseID" name="courseID" placeholder="Course ID" value="<?php echo htmlspecialchars($courseID); ?>">

					<?php echo '<p class="text-danger">'.$errCourseID.'</p>';?>

				</div>

			</div>
			
			<div class="form-group">
			
				<label for="profName" class="col-sm-3 control-label">Professor Name :</label>
				
				<div class="col-sm-9">
					
					<input type="text" class="form-control" id="profName" name="profName" placeholder="Professor Name" value="<?php echo htmlspecialchars($profName); ?>">

					<?php echo '<p class="text-danger">'.$errProfName.'</p>';?>

				</div>

			</div>
			
			<div class="form-group">
			
				<label for="profEmail" class="col-sm-3 control-label">Professor Email :</label>
				
				<div class="col-sm-9">
					
					<input type="text" class="form-control" id="profEmail" name="profEmail" placeholder="Professor Email" value="<?php echo htmlspecialchars($profEmail); ?>">

					<?php echo '<p class="text-danger">'.$errProfEmail.'</p>';?>

				</div>

			</div>
			
			<div class="form-group">
			
				<label for="profNum" class="col-sm-3 control-label">Professor Number :</label>
				
				<div class="col-sm-9">
					
					<input type="text" class="form-control" id="profNum" name="profNum" placeholder="Professor Num" value="<?php echo htmlspecialchars($profNum); ?>">

					<?php echo '<p class="text-danger">'.$errProfNum.'</p>';?>

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