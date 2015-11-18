<?php

// List Controllers & Functions within

$controllers = array(

"Pages" =>["Home","Error"],
"Professor" =>["AddProfessor","SubmitProfessor","findAll","find"],
"Services" =>["AddServices","SubmitServices"],
"Grants" =>["AddGrants","SubmitGrants"]

);

function call_route($controller , $action)
{
	require_once(DIR_ROOT . '/MVC/Controllers/' . $controller . 'Controller.php');
		
	switch ($controller)
	{
		case "Pages":
			$controller = new PagesController();
			break;
		case "Professor":
			$controller = new ProfessorController();
			break;
		case "Services":
			$controller = new ServicesController();
			break;
		case "Grants":
			$controller = new GrantsController();
			break;
	}
		
	$controller->{ $action }();
		
}

//Test url validity

if(array_key_exists($controller, $controllers))
{
	if(in_array($action, $controllers[$controller]))
	{
		call_route($controller , $action);
	}
	else
	{
		call_route('Pages', 'Error');
	}
}
else
{
	call_route('Pages', 'Error');
}

  
?>