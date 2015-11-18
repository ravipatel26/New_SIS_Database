<?php

class ServicesController {
	
	public function AddServices() 
	{
		$serviceID = $serviceName = $profID = $serviceYear = '';
		$errServiceID = $errServiceName = $errProfID = $errServiceYear = '';
		$result = '';

		require_once(DIR_ROOT . '/MVC/Views/Services/AddServices.php');
    }
	
	public function SubmitServices() 
	{
		
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
		
		require_once(DIR_ROOT . '/MVC/Views/Services/AddServices.php');
    }
	
	
}

?>