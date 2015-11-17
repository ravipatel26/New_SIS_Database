<?php
ob_start();
session_start();
include("../lib/config.php");
?>

<!doctype html>

<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mot de passe temporaire</title>

    <link href="css/master.css" rel="stylesheet" type="text/css">


</head>
<body>

<div id="page">

    <?php
    if (isset($_GET['message']) && isset($_SESSION[$_GET['message']])) {
        echo $_SESSION[$_GET['message']];
        unset($_SESSION[$_GET['message']]);
    }
    ?>

    <form id="changePass" name="changePass" method="post" action="changingSQLPass.php">
        <table class="changePass" width="500" border="0" align="center"  bgcolor="#DBDBDB">
            <tr>
                <th colspan="2" height="45"><h3>Changer le mot de passe temporaire</h3></th>
            </tr>
            <tr><td colspan="100"><p></td></tr>
            <tr>
                <td height="45" align="right">Nom d&acute;usager:&nbsp;&nbsp;</td>
                <td><input type="text" name="oldusername" id="oldusername" required/></td>
            </tr>
            <tr>
                <td height="45" align="right">Mot de passe temp</td>
                <td><input type="password" name="oldpassword" id="oldpassword" required/></td>
            </tr>
            <tr><td colspan="2"><hr></td></tr>
            <tr>
                <td height="45" align="right">Nouveau mot de passe</td>
                <td height="45"><input type="password" name="newpassword1" id="newpassword1" required/></td>
            </tr>
            <tr>
                <td height="45" align="right">Nouveau mot de passe (R&eacute;p&eacute;ter)</td>
                <td><input type="password" name="newpassword2" id="newpassword2" required/></td>
            </tr>
            <tr>
                <td height="45" colspan="2" align="center"><input type="submit" name="submit" id="button" value="Changer mot de passe"/></td>
            </tr>

        </table>
    </form>


</div>

</body>
</html>