<?php

class GrantsController {
	
	public function AddGrants() 
	{
		$grantID = $profID = $studentID = $researchID = $grantAmt = $grantYear ='';
		$errGrantID = $errProfID = $errStudentID = $errResearchID = $errGrantAmt = $errGrantYear ='';
		$result = '';
		
      require_once(DIR_ROOT . '/MVC/Views/Grants/AddGrants.php');
    }
	
	public function SubmitGrants() 
	{
		$grantID = $profID = $studentID = $researchID = $grantAmt = $grantYear ='';
		$errGrantID = $errProfID = $errStudentID = $errResearchID = $errGrantAmt = $errGrantYear ='';
		$result = '';
		
		if (isset($_POST['submit'])) {
	
			if (isset($_POST['profID']))
			{
				$profID = $_POST['profID'];
			}
			if (isset($_POST['grantID']))
			{
				$grantID = $_POST['grantID'];
			}
			if (isset($_POST['studentID']))
			{
				$studentID = $_POST['studentID'];
			}
			if (isset($_POST['grantAmt']))
			{
				$grantAmt = $_POST['grantAmt'];
			}
			if (isset($_POST['researchID']))
			{
				$researchID = $_POST['researchID'];
			}
			if (isset($_POST['grantYear']))
			{
				$grantYear = $_POST['grantYear'];
			}

			if (!$_POST['grantID']) 
			{
				$errGrantID = '*Enter the Grant ID';
			}
			if (!$_POST['profID']) 
			{
				$errProfID = '*Enter the Professor ID';
			}
			if (!$_POST['studentID']) 
			{
				$errStudentID = '*Enter the Student ID';
			}
			if (!$_POST['researchID']) 
			{
				$errResearchID = '*Enter the Research ID';
			}
			if (!$_POST['grantAmt']) 
			{
				$errGrantAmt = '*Enter the Grant Amount';
			}
			if (!$_POST['grantYear']) 
			{
				$errGrantYear = '*Enter the Grant Year';
			}
			
			if (!$errGrantID && !$errProfID && !$errStudentID && !$errResearchID && !$errGrantAmt && !$errGrantYear) 
			{
				$result='<div class="alert alert-success">Form has been submitted!</div>';
			} 
			else 
			{
				$result='<div class="alert alert-danger">Address the errors in the form!</div>';
			}

		}
		
		require_once(DIR_ROOT . '/MVC/Views/Grants/AddGrants.php');
    }
	
}

?>