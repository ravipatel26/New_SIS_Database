<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>


<?php include("../lib/redirect.php");?>
<?php include("../lib/config.php");?>
<?php
$username = $_POST['username'];
$password1 = $_POST['password'];
$password2 = $_POST['confirm_password'];
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];

if($password1 != $password2)
{
    redirect('<br><br>Les mots de passes ne sont pas les mêmes', '/comp353/newAccount.php');

}else{
    if(strlen($password1)<6 || strlen($password1)>10)

        redirect('<br><br>Le mots de passes doit avoir entre 8 et 30 charact&#232;res.', '/comp353/newAccount.php');

}

//check size of username
if(strlen($username) > 8|| strlen($username)<6)

    redirect('<br><br>Le nom d\'usager doit avoir entre 6 et 30 charactères.', '/comp353/newAccount.php');
    /////////////////

//////////////////////////////////////////////////////////////////////////////
//verifies if username already exists
$sql="SELECT user_USERNAME FROM User WHERE user_USERNAME='$username'";
$result=$mysqli->query($sql);
//if(!$result)
//{
//    throw new Exception('Could not execute query');
//}
if($result->num_rows>0)
{
    //throw new Exception('Ce nom d&acute;usag&eacute; n&acute;ai pas disponible!');
    redirect('<br><br>Ce nom d&acute;usag&eacute; n&acute;ai pas disponible!', '/comp353/newAccount.php');
}
/////////////////////////////////////////////////////////////////////////////////////
$_SESSION["password"] = $password;
$hash = hash('sha256', $password1);

function createSalt()
{
    $text = md5(uniqid(rand(), true));
    return substr($text, 0, 3);
}

$salt = createSalt();
$password = hash('sha256', $salt . $hash);


//sanitize inputs
$username = $mysqli->real_escape_string($username);
$email = trim($email);
$firstName = $mysqli->real_escape_string($firstName );
$lastName = $mysqli->real_escape_string($lastName );

$query = "INSERT INTO User ( user_USERNAME, user_PASSWORD, user_EMAIL, user_SALT, user_FIRSTNAME, user_LASTNAME, user_PERMISSION) VALUES
		( '$username', '$password', '$email', '$salt', '$firstName', '$lastName', 0)";

$mysqli->query($query);
$_SESSION['sess_user_id'] = mysqli_insert_id($mysqli);

//$query = "SELECT userID from users
$userID = $_SESSION['sess_user_id'];
$_SESSION["user_ID"] = $userID;
$_SESSION["manager"] = $username;


//$mysqli->close();

redirect('','/comp353/management/adminHome.php');
?>

<? ob_end_flush(); ?>