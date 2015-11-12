<?php ob_start();
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php ini_set("sendmail_from", "alainf971@hotmail.com");  ?>
<?php
require("../lib/usermanager.php");
?>
<?php require("../lib/redirect.php");?>

<!doctype html>

<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->

<!--<![endif]-->
<head>

    <title>Réinitialisation du mot de passe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/boilerplate.css" rel="stylesheet" type="text/css">
    <link href="css/masterNew.css" rel="stylesheet" type="text/css"  media="screen">
    <link href="css/masterLogin.css" rel="stylesheet" type="text/css"  media="screen">

</head>
<body>

<div id="page">


    <?php
    if (isset($_GET['message']) && isset($_SESSION[$_GET['message']])) {
        echo $_SESSION[$_GET['message']];
        unset($_SESSION[$_GET['message']]);
    }
    ?>


    <form action="" method="post">
        <table  class="changePass" align="center" border="0" cellspacing="0" cellpadding="1" width="29%" bgcolor="#DBDBDB">
            <tr><th height="45" colspan="2"><h3>R&eacute;initialisation du mot de passe</h3></th></tr>
            <tr><td colspan="2" height="15"></td></tr>
            <tr><td width="36%" height="45" align="right">Nom d&acute;usag&eacute;:</td><td width="64%" align="center"><INPUT type="text" name="user" maxlength="30" ></td></tr>
            <tr><td height="28" colspan="2" align="center" valign="middle"><h3>Ou</h3></td></tr>
            <tr><td height="45" align="right">E-mail:</td><td align="center"><INPUT type="text" name="email" maxlength="50" ></td></tr>
            <tr><td height="55" colspan="2" align="center" valign="middle" ><INPUT type="submit" name="subpass" value="Envoyer" ></td></tr>
        </table>
    </form>

</div>
<?php
$user=new UserManager;
$user->display_forgot();
?>

</div>

<?php ob_end_flush();?>

</body>
</html>