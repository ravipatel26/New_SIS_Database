<?php ob_start();?>

<?php session_start()?>
<?php
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php require("../lib/config.php");?>
<?php require("../lib/redirect.php");?>

<?php
if(isset($_POST['submit']))
{
    $oldusername = $_POST['oldusername'];
    $oldPassword = $_POST['oldpassword'];
    $newPassword1=$_POST['newpassword1'];
    $newPassword2=$_POST['newpassword2'];



    $query = "SELECT user_ID, user_PASSWORD, user_SALT FROM User WHERE user_USERNAME = '$oldusername';";

    $result = $mysqli->query($query);

    if($result->num_rows == 0) // User not found. So, redirect to login_form again.
    {

        redirect('<br><br>Mauvais nom d&acute;usag&eacute;.', '/comp353/admin/changePassForm.php');
    }


    $userData = mysqli_fetch_array($result, MYSQL_ASSOC);
    $hash = hash('sha256', $userData['user_SALT'] . hash('sha256', $oldPassword) );

    if($hash != $userData['user_PASSWORD']) // Incorrect password. So, redirect to login_form again.
    {
        redirect('<br><br>Mauvais vieux mot de passe','/comp353/admin/changePassForm.php');

    }

    if($newPassword1 != $newPassword2)
    {
        redirect('<br><br>Les mots de passes ne sont pas les mêmes', '/changePassForm.php');

    }else{

        if(strlen($newPassword1)<8 || strlen($newPassword1)>30)
        {
            redirect('<br><br>Le mots de passes doit avoir entre 8 et 30 charact&#232;res.', '/changePassForm.php');
        }
    }

    if(strlen($oldusername) > 30 || strlen($oldusername)<6)
    {
        redirect('<br><br>Le nom d\'usager doit avoir entre 6 et 30 charactères.', '/changePassForm.php');
    }
}

$oldusername = $mysqli->real_escape_string($oldusername);

$hash2 = hash('sha256', $newPassword1);

function createSalt()
{
    $text = md5(uniqid(rand(), true));
    return substr($text, 0, 3);
}

$salt = createSalt();

$newPassword = hash('sha256', $salt . $hash2);

$stmt = mysqli_prepare($mysqli, "UPDATE User SET user_PASSWORD=?,user_SALT=? WHERE user_USERNAME='$oldusername'");


if ($stmt === false) {
    trigger_error('Statement failed! ' . htmlspecialchars(mysqli_error($mysqli)), E_USER_ERROR);
}

$bind = mysqli_stmt_bind_param($stmt, "ss", $newPassword,$salt);

if ($bind === false) {
    trigger_error('Bind param failed!', E_USER_ERROR);
}
$exec = mysqli_stmt_execute($stmt);

if ($exec === false) {
    trigger_error('Statement execute failed! ' . htmlspecialchars(mysqli_stmt_error($stmt)), E_USER_ERROR);
}

mysqli_stmt_close($stmt);

redirect('<br><br>Changement de mot de passe effectu&eacute;.','/comp353/management/adminHome.php');


?>

