<?php

class Grants {
	
	public $grantId;
	public $profId;
	public $studentId;
	public $researchId;
	public $grantAmt;
	public $grantYear;
	
	public function __construct($grantId, $profId, $studentId, $researchId, $grantAmt, $grantYear)
	{
		$this->grantId = $grantId;
		$this->profId = $profId;
		$this->studentId = $studentId;
		$this->researchId = $researchId;
		$this->grantAmt = $grantAmt;
		$this->grantYear = $grantYear;
	}
	
}

?>