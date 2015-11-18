<!DOCTYPE html>
<html lang="en">

	<head>
	
		<?php include 'includes/header.php'; ?>
		
	</head>
	
	<body>
		
		<div class="container-fluid">
		
			<div id="body">
			
				<div id="header">
				
					<div class="row">
					
						<div class="col-xs-12 text-center">
							<h1></h1>
						</div>
						
					</div>
					
				</div>
				
				<div id="navigation">
				
					<div class="row">
						<?php require("includes/navbar.php"); ?>
					</div>
					
				</div>
				
				<div class="row">
				
					<?php require_once(DIR_ROOT . "App/Routes.php"); ?>
					   
				</div>
		

			</div>
			
		</div>
		
		<footer>
		
			<?php include 'includes/footer.php'; ?>
			
			<script src="Public/js/jquery-1.11.3.min.js"></script>
			
			<script src="Public/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
			
		</footer>
		
	</body>
	
	
</html>