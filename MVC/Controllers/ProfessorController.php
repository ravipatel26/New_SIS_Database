<?php

class ProfessorController {
	
	public function AddProfessor() 
	{
		$profID = $deptID = $courseID = $profName = $profEmail = $profNum ='';
		$errProfID = $errDeptID = $errCourseID = $errProfName = $errProfEmail = $errProfNum = '';
		$result = '';

		require_once(DIR_ROOT . '/MVC/Views/Professor/AddProfessor.php');
    }
	
	public function SubmitProfessor() 
	{
		if (isset($_POST['submit'])) {
	
			if (isset($_POST['profID']))
			{
				$profID = $_POST['profID'];
			}
			if (isset($_POST['deptID']))
			{
				$deptID = $_POST['deptID'];
			}
			if (isset($_POST['courseID']))
			{
				$courseID = $_POST['courseID'];
			}
			if (isset($_POST['profName']))
			{
				$profName = $_POST['profName'];
			}
			if (isset($_POST['profEmail']))
			{
				$profEmail = $_POST['profEmail'];
			}
			if (isset($_POST['profNum']))
			{
				$profNum = $_POST['profNum'];
			}

			if (!$_POST['profID']) 
			{
				$errProfID = '*Enter the Professor ID';
			}
			if (!$_POST['deptID']) 
			{
				$errDeptID = '*Enter the Department ID';
			}
			if (!$_POST['courseID']) 
			{
				$errCourseID = '*Enter the Course ID';
			}
			if (!$_POST['profName']) 
			{
				$errProfName = '*Enter the Professor Name';
			}
			if (!$_POST['profEmail']) 
			{
				$errProfEmail = '*Enter the Professor Email';
			}
			if (!$_POST['profNum']) 
			{
				$errProfNum = '*Enter the Professor Number';
			}
			
			if (!$errProfID && !$errDeptID && !$errCourseID && !$errProfName && !$errProfEmail && !$errProfNum) 
			{
				$result='<div class="alert alert-success">Form has been submitted!</div>';
			} 
			else 
			{
				$result='<div class="alert alert-danger">Address the errors in the form!</div>';
			}

		}
		
		require_once(DIR_ROOT . '/MVC/Views/Professor/AddProfessor.php');
    }
	
	public static function findAll()
	{
		$db_con = DBconnection::getDB_instance();
		
		$query = $db_con->query('SELECT * FROM Professor');
		
		$professor_list = [];
		
		foreach($query->fetchAll() as $prof)
		{
			$professor_list[] = new Professor($prof['professorId'], $prof['deptId'], $prof['courseId'],$prof['professorName'], $prof['professorNumber'], $prof['professorEmail']);
		}
		
		return $professor_list;
	}
	
	public static function find($id)
	{
		$db_con = DBconnection::getDB_instance();
		
		$query = $db_con->prepare('SELECT * FROM Professor WHERE professorId = :id');
		
		$query->execute(array('id' => $id));
		
		$result = $query->fetch();
		
		return new Professor($result['professorId'], $result['deptId'], $result['courseId'],$result['professorName'], $result['professorNumber'], $result['professorEmail']);
	}
	
	
}

?>