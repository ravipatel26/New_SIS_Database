<?php

class Services {
	
	public $serviceId;
	public $serviceName;
	public $profId;
	public $serviceYear;
	
	public function __construct($serviceId, $serviceName, $profId, $serviceYear)
	{
		$this->serviceId = $serviceId;
		$this->serviceName = $serviceName;
		$this->profId = $profId;
		$this->serviceYear = $serviceYear;
	}
	
}

?>