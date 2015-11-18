<?php

class Professor {
	
	public $professorId;
	public $deptId;
	public $courseId;
	public $professorName;
	public $professorNumber;
	public $professorEmail;
	
	public function __construct($professorId, $deptId, $courseId, $professorName, $professorNumber, $professorEmail)
	{
		$this->professorId = $professorId;
		$this->deptId = $deptId;
		$this->courseId = $courseId;
		$this->professorName = $professorName;
		$this->professorNumber = $professorNumber;
		$this->professorEmail = $professorEmail;
	}
	
}

?>