<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>


<?php

class UserManager
{

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


}

?>
