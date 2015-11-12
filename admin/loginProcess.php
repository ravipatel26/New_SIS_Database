<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>


<?php include("../lib/redirect.php") ?>


<?php require("../lib/config.php");?>
<?php
$username = $_POST['username'];
$password = $_POST['password'];

$username = $mysqli->real_escape_string($username);
$query = "SELECT usager_ID, usager_USERNAME, usager_PASSWORD, usager_SALT FROM usager WHERE usager_USERNAME = '$username'";

$result = $mysqli->query($query);

if($result->num_rows == 0) // User not found. So, redirect to login_form again.
{
    $_SESSION['logged'] = 'FALSE';
    redirect('<br><br>Mauvais nom d&acute;usag&eacute;.', '/comp353/comp353/index.php');

}


$userData = mysqli_fetch_array($result, MYSQL_ASSOC);
$hash = hash('sha256', $userData['usager_SALT'] . hash('sha256', $password) );

if($hash != $userData['usager_PASSWORD']) // Incorrect password. So, redirect to login_form again.
{
    $_SESSION['logged'] = 'FALSE';
    redirect('<br><br>Mauvais mot de passe', '/comp353/comp353/index.php');

}else{ // Redirect to home page after successful login.
    session_regenerate_id();
    $_SESSION['sess_user_id'] = $userData['usager_ID'];
    $_SESSION['sess_username'] = $userData['usager_USERNAME'];
    $_SESSION['logged'] = 'TRUE';
    $_SESSION["manager"] = $userData['usager_USERNAME'];
    session_write_close();
    header('Location: /comp353/comp353/management/studentForm.php');

}
//}
?>
