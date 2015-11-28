<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php

$auth_realm = 'New Professor account creation.';

require_once 'auth.php';

header("location:../newAccount.php");

echo '<p><a href="?action=logOut">LogOut</a></p>'

?>