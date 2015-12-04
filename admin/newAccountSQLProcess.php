<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>


<?php include("../lib/config.php");?>
<?php
$username = $_POST['username'];
$password1 = $_POST['password'];
$password2 = $_POST['confirm_password'];
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$permission = $_POST['permission'];

//////////////////////////////////////////////////////////////////////////////
//verifies if username already exists
$sql="SELECT user_USERNAME FROM user WHERE user_USERNAME='$username'";
$result = $mysqli->query($sql);

if($result->num_rows != 0) // User not found. So, redirect to login_form again.
{
    //verifies if user name already exists');
    $userExists=true;
}
if($userExists){
    header('location:../management/newAccount.php');
}else {
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

echo print_r($_POST);
//sanitize inputs
    $username = $mysqli->real_escape_string($username);
    $email = trim($email);
    $firstName = $mysqli->real_escape_string($firstName);
    $lastName = $mysqli->real_escape_string($lastName);

    $query = "INSERT INTO user ( user_USERNAME, user_PASSWORD, user_EMAIL, user_SALT, user_FIRSTNAME, user_LASTNAME, user_PERMISSION) VALUES
		( '$username', '$password', '$email', '$salt', '$firstName', '$lastName', '$permission')";
//
    $mysqli->query($query);
    $_SESSION['sess_user_id'] = mysqli_insert_id($mysqli);
//
////$query = "SELECT userID from users
    $userID = $_SESSION['sess_user_id'];
    $_SESSION["user_ID"] = $userID;
    $_SESSION["manager"] = $username;
    header('location:../management/adminHome.php');
}


?>

<? ob_end_flush(); ?>