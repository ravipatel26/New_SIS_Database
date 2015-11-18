<?php

define("DIR_ROOT",dirname(__FILE__).'/' );

require_once(DIR_ROOT . "/App/Database/DBcon.php");


	if (isset($_GET['controller']) && isset($_GET['action'])) 
	{
		$controller = $_GET['controller'];
		$action     = $_GET['action'];
	} 
	 else 
	{
		$controller = 'Pages';
		$action     = 'Home';
	}

	if (isset($_GET['controller'])) 
	{
		switch ($_GET['controller'])
		{
			case "Pages":
				require_once(DIR_ROOT . "/MVC/Views/Layouts/HomeLayout.php");
				break;
			case ("Professor" || "Grants" || "Services"):
				require_once(DIR_ROOT . "/MVC/Views/Layouts/FormsLayout.php");
				break;
		}
	}
	else
	{
		require_once(DIR_ROOT . "/MVC/Views/Layouts/HomeLayout.php");
	}



?>