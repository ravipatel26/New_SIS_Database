<?php

//database connection
//	$db_host = "ykc353_2.encs.concordia.ca";
//	$db_name = "ykc353_2";
//	$db_username = "ykc353_2";
//	$db_password = "hello007";

	$db_host = "localhost";
	$db_name = "ykc353_2";
	$db_username = "root";
	$db_password = "";
	$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);
	///* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
?>