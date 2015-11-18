<div class="col-md-6 col-md-offset-3">

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
	
</div>