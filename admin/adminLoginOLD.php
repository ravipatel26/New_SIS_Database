<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>

<?php

if(isset($_SESSION["manager"]))
{
    //already logged in so go back to desired page
    header("location:admin.php");
    exit();
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Comp353</title>

    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <link href="../css/general.css" rel="stylesheet" type="text/css">
    <link href="../css/navColor.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.min.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="contactList" align="center">

<div class="gridContainer clearfix">
    <div id="LayoutDiv1">

        <div id="page" align="center">


            <form id="login" name="login" method="post" action="loginProcess.php" onsubmit='return checkEntry()'>
                <table class="loginTable" width="545" border="0" align="center" bgcolor="#6495ed">
                    <tr>
                        <th colspan="3" height="45"><h3>Login</h3></th>
                    </tr>
                    <tr></tr>
                    <tr height="35">
                        <td width="196" align="right">Nom d&acute;usager:&nbsp;&nbsp;</td>
                        <td colspan="2" ><input name="username" type="text" required id="username" onblur="checkUsername()" size="30"/></td>
                    </tr>
                    <tr height="35">
                        <td  align="right">Mot de passe:&nbsp;&nbsp;&nbsp;</td>
                        <td colspan="2"><input name="password" type="password" required id="password" onblur="checkPassword()" size="30"/></td>
                    </tr>

                    <tr>
                        <td height="70" colspan="3" align="center" valign="baseline"><br><input type="submit" name="button" id="button" value="Envoyer"/></td>
                    </tr>

                    <tr>
                        <td height="45" align="right" valign="baseline"><a href="password_recovery_form.php" style="font-size:17px">Mot de passe oubli&eacute;?</a></td>
                        <td width="177" height="50" align="center" valign="baseline"><a href="changePassForm.php" style="font-size:17px">Changer Mot de passe</a></td>
                        <td width="158" height="50" align="center" valign="baseline"><a href="newAccountLogin.php" style="font-size:17px">Nouveau Compte</a></td>

                    </tr>

                </table>
            </form>

            <div id="accueil"><table align="center"><tr><td><input type="button" value="Annuler" onclick="window.location.href='../index.php'"></td></tr></table></div>




        </div>
    </div>
</div>
</body>
</html>