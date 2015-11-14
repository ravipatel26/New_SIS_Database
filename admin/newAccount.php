<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php
require("../lib/config.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/boilerplate.css" rel="stylesheet" type="text/css">
    <link href="css/masterNew.css" rel="stylesheet" type="text/css"  media="screen">
    <link href="css/masterLogin.css" rel="stylesheet" type="text/css"  media="screen">
    <script src="../js/respond.min.js"></script>
    <script src="js/functions.js"></script>


    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>

<div id="page" align="center">


    <form name="register" id ="register" action="newAccountProcess.php" method="post">
        <table class="registrationTable" width="55%" border="0" align="center" bgcolor="#DBDBDB">
            <tr height="45">
                <th colspan="4">
                    <h3>Nouveau Compte</h3>
                </th>
            </tr>
            <tr><td height="10" colspan="4"></td></tr>
            <tr height="45">
                <td colspan="3" align="right" valign="middle">Nom d&acute;usager (entre 6 et 30 charactères):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td width="49%" align="left" valign="middle"><input name="username" type="text" required id="username" onblur="checkUsernameLength()" size="32" maxlength="31"/></td>
            </tr>
            <tr height="45">
                <td colspan="3" align="right" valign="middle">Mot de passe (entre 8 et 30 charactères):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td align="left" valign="middle"><input name="password1" type="password" required id="password1" onblur="checkPasswordLength()" size="32" maxlength="31"/></td>
            </tr>
            <tr height="45">
                <td  colspan="3" align="right" valign="middle">Confirmer le mot de passe (entre 8 et 30 charactères):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td align="left"><input type="password" name="password2" id="password2" size="32" maxlength="31" onblur="checkPasswordLength()" required/></td>
            </tr>
            <tr height="45">
                <td colspan="3" align="right" valign="bottom">Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td align="left" line-height="20"><input type="email" name="email" required placeholder="Entre une adress email valide" size="32"maxlength="30" onblur="validateEmail()"></td>
            </tr>

            <tr align="right" valign="middle">
                <td height="15" colspan="4" ><hr /></td>
            </tr>

            <tr height="45">
                <td colspan="3" align="right" valign="middle">Pr&eacute;nom:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td align="left"><input type="text" id="firstName" name="firstName" size="32" maxlength="50" value="" required/>
            </tr>
            <tr height="45">
                <td  colspan="3" align="right" valign="middle">Nom:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td align="left"><input type="text" id="lastName" name="lastName" size="32" maxlength="50" value="" required/></td>
            </tr>
            <tr align="right" valign="middle">
                <td height="12" colspan="4" ><hr /></td>
            </tr>

            <tr height="45">
                <td colspan="4" align="center" valign="top"><input type="submit" name="Submit" id="Submit" value="Enregistrer" /></td>
            </tr>

        </table>
    </form>

    <div id="accueil"><table align="center"><tr><td><input type="button" value="Annuler" onclick="window.location.href='/logoutCompte.php'"></td></tr></table></div>