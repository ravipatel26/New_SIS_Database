<?php

class DBconnection {
	
	private function _construct(){}

	private function _clone(){}
	
	private static $db_instance = null;
	


	public static function getDB_instance()
	{
		$host = "localhost";
		$db_name = "testmvc";
		$db_username = "root";
		$db_password = "";
	
		/*
		$host = "ykc353_2.encs.concordia.ca";
		$db_name = "ykc353_2";
		$db_username = "ykc353_2";
		$db_password = "hello007";
		*/
	
		if(isset($db_instance))
		{
			return self::$db_instance;
		}
		else
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			
			self::$db_instance = new PDO(("mysql:host=" . $host . ";dbname=" . $db_name) , $db_username , $db_password , $pdo_options);
			return self::$db_instance;
		}
	}
	
}

?>