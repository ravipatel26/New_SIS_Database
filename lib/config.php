<?php

//database connection
	$db_host = "localhost";
	$db_name = "adminSystem";
	$db_username = "root";
	$db_password = "";
	$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);
	///* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
?>