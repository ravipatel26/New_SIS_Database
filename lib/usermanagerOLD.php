<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>


<?php

class UserManager
{

    var $connect = '';

    var $logged_in = '';

    var $HOMEPAGE = "/index.php";

    var $loginPage = "/contactLogin.php";

    var $LOGIN = "?action=LOGIN";

    var $REGISTER = "?action=REGISTER";

    var $FORGOTPW = "?action=FORGOT";

    var $REDIR_PAGE = "/index.php";

    var $USR_MAXCHARS = 30;


    public function __construct()
    {

        $dbhost	= 'localhost';
        $dbusername	='root';
        $dbpassword	= '';
        $dbname	= 'adminsystem';

        $this->logged_in = $this->check_login();

        $this->connect = mysqli_connect($dbhost, $dbusername, $dbpassword);
        mysqli_select_db($this->connect,$dbname) or die ("Could not select database");
    }


//    function check_email($address)
//    {
//        $chars = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i";
//
//        if (strstr($address, '@') && strstr($address, '.')) {
//            if (preg_match($chars, $address))
//                return true;
//            else
//                return false;
//        } else
//            return false;
//
//    }



    function create_password($lenght = 8)
    {
        $chars = "abcdefghijkmnopqrstuvwxyz023456789";

        srand((double)microtime() * 1000000);

        $pass = '';

        for($i=0; $i<$lenght; $i++) {
            $num = rand() % 33;

            $tmp = substr($chars, $num, 1);

            $pass = $pass . $tmp;
        }

        return $pass;
    }



//    function username_taken($username)
//    {
//        if (!get_magic_quotes_gpc())
//            $username = addslashes($username);
//
//        $q = "SELECT username FROM users WHERE username = '$username'";
//
//        $result = mysql_query($q, $this->connect);
//
//        return (mysql_numrows($result) > 0);
//    }



//    function add_user($username, $password, $email)
//    {
//        $q = "INSERT INTO users (username, password, email)
//                            VALUES ('$username', '$password', '$email')";
//
//        return mysql_query($q, $this->connect);
//    }



    function display_status()
    {
        $uname = $_SESSION['reguname'];

        if ($_SESSION['regresult']) {
            ?>

            <div>
                <h1>Registered!</h1>
                <p>Thank you <b><?php echo $uname;?>
                    </b> you have just became a registered member! You can now <a href="$this->LOGIN">log in</a>.</p>
            </div>

            <?php

        } else {

            ?>

            <div>
                <h1>Registration Failed!</h1>
                <p>Sorry, but an error has occurred while tring to register you... Your request for registering <b>"<?php echo $uname; ?>"</b>, could not be completed.<br />
                    Please try again at a later time.</p>
            </div>

            <?php
        }

        unset($_SESSION['reguname']);
        unset($_SESSION['registered']);
        unset($_SESSION['regresult']);
    }



    function display_register()
    {
        if (isset($_SESSION['registered'])) {
            $this->display_status();
            return;
        }

        if (isset($_POST['subjoin'])) {
            if (!$_POST['user'] || !$_POST['pass'] || !$_POST['email'])
                die( "<div><h1>Error:</h1><b>You didn't fill in a required field</b><br /><br /><a href=\"javascript:self.history.back();\">Go Back</a> and try again</div>" );

            if ($_POST['pass'] != $_POST['pass2'])
                die( "<div><h1>Error:</h1><b>Passwords don't match</b><br /><br /><a href=\"javascript:self.history.back();\">Go Back</a> and try again</div>" );


            $_POST['user'] = trim($_POST['user']);

            if (strlen($_POST['user']) > $this->USR_MAXCHARS)
                die( "<div><h1>Error:</h1><b>Username is longer than " . $this->USR_MAXCHARS . " characters</b><br />Please shorten it<br /><br /><a href=\"javascript:self.history.back();\">Go Back</a> and try again</DIV>" );

            if ($this->username_taken($_POST['user'])) {
                $use = $_POST['user'];
                die( "<div><h1>Error:</h1>Username <strong>$use</strong> already exists<br /><br /><a href=\"javascript:self.history.back();\">Go Back</a> and try again</div>" );
            }

            if (!$this->check_email($_POST['email']))
                die( "<div><h1>Error:</h1><b>Invalid Email address!</b><br /><br /><a href=\"javascript:self.history.back();\">Go Back</a> and try again</div>" );


            $md5pass = md5($_POST['pass']);

            $_SESSION['reguname'] = $_POST['user'];

            $_SESSION['regresult'] = $this->add_user($_POST['user'], $md5pass, $_POST['email']);

            $_SESSION['registered'] = true;

            header( "Location: " . $this->HOMEPAGE);

        } else { // Register form

            require("forms/register_form.php");

        }
    }


    function confirm_user($username, $password)
    {
        if (!get_magic_quotes_gpc())
            $username = addslashes($username);

        $q = "SELECT password FROM users WHERE username = '$username'";

        $result = mysqli_query($this->connect,$q );
        $rows=mysqli_num_rows($result);
        if (!$result || ( $rows< 1 ))
            return 1; // Username failure

        $dbarray = mysqli_fetch_array($result);

        $dbarray['password'] = stripslashes($dbarray['password']);

        $password = stripslashes($password);

        if ($password == $dbarray['password'])
            return 0; // Username and password are OK
        else
            return 2; // Password failure
    }

    ///////////////////////////////////////////////////////////////////////////////
    ////////////////verifier le nom d'usager
    ////////////////////////////////////////////////////////////////////////////
    function usernameCheck($username)
    {

//        $q = "SELECT username FROM users WHERE userName = '$username'";
//
//        $result = mysqli_query($this->connect,$q );
//        $rows=mysqli_num_rows($result);
//        if (!$result || ( $rows< 1 ))
//        {
//            return false; // Username failure
//        }
        return true; // Username OK
    }

    //////////////////////////////////////////////////////////////////////////////////////
    /////verifier l'email
    //////////////////////////////////////////////////////////////////////////////////
    function emailCheck($email)
    {
//        if (!get_magic_quotes_gpc())
//            $email = addslashes($email);

//        $q = "SELECT email FROM users WHERE email = '$email'";
//
//        $result = mysqli_query($this->connect,$q );
//        $rows=mysqli_num_rows($result);
//        if (!$result || ( $rows< 1 ))
//        {
//            return false; // email failure
//        }
        return true; // email OK
    }


    function userCheck($username, $email)
    {
        if (!get_magic_quotes_gpc())
            $username = addslashes($username);

        $q = "SELECT email FROM users WHERE userName = '$username'";

        $result = mysqli_query($this->connect,$q );
        $rows=mysqli_num_rows($result);
        if (!$result || ( $rows< 1 ))
            return 1; // Username failure

        $dbarray = mysqli_fetch_array($result);

        $dbarray['email'] = stripslashes($dbarray['email']);

        $email = stripslashes($email);

        if ($email == $dbarray['email'])
            return 0; // Username and password are OK
        else
            return 2; // Password failure
    }


    function check_login()
    {
        if (isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass'])) {
            $_SESSION['username'] = $_COOKIE['cookname'];
            $_SESSION['password'] = $_COOKIE['cookpass'];
        }

        // User authentication
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
            if (confirm_user($_SESSION['username'], $_SESSION['password']) != 0) {
                unset($_SESSION['username']);
                unset($_SESSION['password']);

                return false;
            }

            return true;
        }

        return false;
    }


    //////////////////////////////////////////////////////////////////////////////
    ////Mot de passe oublier
    ///////////////////////////////////////////////////////////////////////////////
    function display_forgot()
    {
        if (isset($_POST['subpass'])) {
            if (!$_POST['user'] && !$_POST['email'])
                die( "<div><h1>Error:</h1><strong>You didn't fill in a required field</strong><br /><br /><a href=\"javascript:self.history.back();\">Go Back</a> and try again</div>" );

            if($_POST['email'] != "")
            {
                if (!$this->check_email($_POST['email']))
                    die( "<div><h1>Erreur:</h1><strong>E-mail non valide!</strong><br /><br /><a href=\"javascript:self.history.back();\">Retourner</a> et essayer encore.</DIV>" );
            }
            $usr = mysqli_real_escape_string($this->connect,trim($_POST['user']));
            $email = $_POST['email'];

            if($usr=="")
            {
                if (!$this->emailCheck($email))
                {
                    die("Erreur! Mauvais email, veuillez nous contacter." );
                }
            }else{
                if (!$this->usernameCheck($usr))
                {
                    die("Erreur! Mauvais nom d'usag&Eacute;, veuillez nous contacter." );
                }
            }
            $pwd = $this->create_password();

            $hash=hash('sha256', $pwd);

            function createSalt()
            {
                $text=md5(uniqid(rand(), true));
                return substr($text,0,3);
            }

            $salt=createSalt();
            $md5pwd=hash('sha256', $salt.$hash);

            $settings = mysqli_query( $this->connect,"SELECT * FROM settings");

            $mysettings = mysqli_fetch_assoc($settings);

            $sitename= 'Contacts comp353';
            if($usr == "")
            {
                $result= mysqli_query($this->connect,"SELECT usager_FIRSTNAME FROM usager WHERE usager_EMAIL='$email'");
                $fname=mysqli_fetch_assoc($result);
                $firstName=$fname['usager_FIRSTNAME'];

                $upload = mysqli_query($this->connect,"UPDATE usager SET usager_PASSWORD='$md5pwd', usager_SALT='$salt' WHERE usager_EMAIL='$email' ");
            }else{
                $result= mysqli_query($this->connect,"SELECT usager_FIRSTNAME,usager_EMAIL FROM usager WHERE usager_USERNAME='$usr'");
                $fname=mysqli_fetch_assoc($result);
                $firstName=$fname['usager_FIRSTNAME'];
                $email=$fname['usager_EMAIL'];
                $upload = mysqli_query($this->connect,"UPDATE usager SET usager_PASSWORD='$md5pwd', usager_SALT='$salt' WHERE usager_USERNAME='$usr' ");

            }
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $headers .= 'From: Contact comp353<alainf971@hotmail.com>' . "\r\n";

            $message = "Cher " . $firstName . " , cet e-mail a &eacute;t&eacute; envoy&eacute; en r&eacute;ponse &agrave; votre demande de r&eacute;initialisation de votre mot de passe pour entrer dans le site web de la " . $sitename . " .<br />
            Si vous n'avez pas demand&eacute; que votre mot de passe soit r&eacute;initialis&eacute;, assurez-vous que vous &ecirc;tes <strong>Seul</strong> &agrave; conna&icirc;tre votre adresse email et nom d'utilisateur qui vous permet d'acc&eacute;der au site.  Veuillez nous contacter en cas de probl&egrave;mes.<br><br>
            Votre mot de passe temporaire est:&nbsp;<strong> " . $pwd . "</strong><br>Garder le en s&eacute;curit&eacute;!
            Veuillez agr&eacute;er nos sinc&egrave;res salutations,  l&acute;&eacute;quipe d&acute;" . $sitename . ".";

            mail($email, $sitename . ": Mot de passe temporaire.", $message, $headers);

            redirect('<br><br><br>Vous allez recevoir un message avec un mot de passe temporaire. Veuillez changer votre mot de passe.','/comp353/comp353/admin/changeTempPass.php');

        }
    }



    function display_login()
    {
        if ($this->logged_in) {
            ?>
            <div>
                <h1>Logging in...</h1>
                You are logging in as <em><?= $_SESSION['username'] ?></em><br>
                Click <a href="<?= $this->REDIR_PAGE ?>">here to continue</a>.<br>
                You can also <a href="<?= $this->LOGOUT ?>">cancel the operation</a>.
                <br /><br />
                (Auto-redirect in 5 seconds...)

                <meta http-equiv="refresh" content="5; url=<?= $this->REDIR_PAGE ?>">
            </div>

            <?php

        } else {
            if (isset($_POST['sublogin'])) {
                if (!$_POST['user'] || !$_POST['pass'])
                    die( "<div><h1>Error:</h1><b>You didn't fill in a required field</b><br /><br /><a href=\"javascript:self.history.back();\">Go Back</a> and try again</div>" );

                $_POST['user'] = trim($_POST['user']);

                $md5pass = md5($_POST['pass']);

                $result = $this->confirm_user($_POST['user'], $md5pass);

                if ($result == 1)
                    die( "<div><h1>Error:</h1><strong>Unexisting Username!</strong><br /><br /><a href=\"javascript:self.history.back();\">Go Back</a> and try again</DIV>" );
                elseif ( $result == 2 )
                    die( "<div><h1>Error:</h1><strong>Incorrect Password!</strong><br /><br /><a href=\"javascript:self.history.back();\">Go Back</a> and try again</div>" );

                $_POST['user'] = stripslashes($_POST['user']);

                $_SESSION['username'] = $_POST['user'];
                $_SESSION['password'] = $md5pass;

                if (isset($_POST['remember'])) { // Remember me!
                    setcookie("cookname", $_SESSION['username'], time() + 60 * 60 * 24 * 100, "/");
                    setcookie("cookpass", $_SESSION['password'], time() + 60 * 60 * 24 * 100, "/");
                }

                echo "<meta http-equiv=\"Refresh\" content=\"0;url=$this->LOGIN\">";
                return;
            } else {

                require( "forms/login_form.php" );

            }
        }
    }


    function log_out()
    {
        if (isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass'])) {
            setcookie("cookname", "", time() - 60 * 60 * 24 * 100, "/");
            setcookie("cookpass", "", time() - 60 * 60 * 24 * 100, "/");
        }

        if (!$this->logged_in) {
            echo "<div>";
            echo "<h1>Error!</h1>\n";
            echo "<strong>You are not currently logged in</strong>, logout failed. Go to <a href=\"$this->HOMEPAGE\">Home Page</a> or <a href=\"$this->LOGIN\">Login</a>";
            echo "</div>";
        } else {
            unset($_SESSION['username']);
            unset($_SESSION['password']);

            $_SESSION = array();

            session_destroy();

            echo "<div>";
            echo "<h1>Logged Out</h1>\n";
            echo "You have successfully <strong>logged out</strong>. Click <a href=\"$this->REDIR_PAGE\">here to proceed</a>.";
            echo "</div>";
        }
    }


    function display_user()
    {
        $usern = $_SESSION['username'];

        if (isset($_POST['subinfo'])) {

            $username = mysql_real_escape_string($_POST['username']);
            $email = mysql_real_escape_string($_POST['email']);
            $realname = mysql_real_escape_string($_POST['realname']);
            $website = mysql_real_escape_string($_POST['website']);
            $country = mysql_real_escape_string($_POST['country']);

            $city = mysql_real_escape_string($_POST['city']);
            $cap = mysql_real_escape_string($_POST['cap']);
            $phone = mysql_real_escape_string($_POST['phone']);
            $profile = mysql_real_escape_string($_POST['profile']);

            $icq = trim($_POST['icq']);
            $msn = trim($_POST['msn']);
            $yahoo = trim($_POST['yahoo']);
            $skype = trim($_POST['skype']);

            $im = $icq . ";" . $msn . ";" . $yahoo . ";" . $skype;

            $result = mysql_query("UPDATE users SET email='$email', realname='$realname', website='$website', country='$country', city='$city', cap='$cap', phone='$phone', im='$im', profile='$profile' WHERE username='$usern'", $this->connect);

            echo "<center><strong>Profile UPDATED</strong> successfully!";
            echo "<meta http-equiv=Refresh content=1;url=javascript:self.history.back();>";

        } else {

            $result = mysql_query("SELECT * FROM users WHERE username='$usern' ");

            while ($myrow = mysql_fetch_assoc($result)) {
                $username = $myrow["username"];
                $email = $myrow["email"];
                $realname = $myrow["realname"];
                $website = $myrow["website"];
                $country = $myrow["country"];
                $profile = $myrow["profile"];

                require_once( "forms/info_form.php" );
            }
        }


        if (isset($_POST['subpass'])) {
            $oldpassword = mysql_real_escape_string($_POST['oldpassword']);
            $newpassword = mysql_real_escape_string($_POST['newpassword']);
            $newpassword2 = mysql_real_escape_string($_POST['newpassword2']);

            $oldmd5 = md5($oldpassword);

            if ($oldmd5 != $_SESSION['password'])
                die("<center>Wrong password! Please try again.</center>");

            if ($newpassword != $newpassword2)
                die( "<center>Passwords must match! Please try again.</center>" );

            $newmd5 = md5($newpassword);

            $result = mysql_query("UPDATE users SET password='$newmd5' WHERE username='$usern' ", $this->connect);

            $_SESSION['password'] = $newmd5;

            echo "<center><strong>Password CHANGED</strong> successfully!</center>";
            echo "<meta http-equiv=Refresh content=1;url=javascript:self.history.back();>";

        } else {
            $result = mysql_query("SELECT * FROM users WHERE username='$usern'", $this->connect);

            while ($myrow = mysql_fetch_assoc($result))
                require_once("forms/password_form.php");
        }
    }


}

?>
