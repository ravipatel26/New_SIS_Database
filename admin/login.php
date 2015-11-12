<?php session_start();?>

<link href="/css/pages.css" rel="stylesheet" type="text/css">

<form id="login" name="login" method="post" action="../login03.php" onsubmit='return checkEntry()'>
    <table class="loginTable" width="500" border="0" align="center">
        <tr>
            <th colspan="3" height="30">Login</th>
        </tr>
        <tr></tr>
        <tr>
            <td align="right">Nom d&acute;usager:</td>
            <td align="center">&nbsp;</td>
            <td height="35"><input type="text" name="username" id="username" onblur="checkUsername()" required/></td>
        </tr>
        <tr>
            <td align="right">Mot de passe</td>
            <td align="center">&nbsp;</td>
            <td height="35"><input type="password" name="password" id="password" onblur="checkPassword()" required/></td>
        </tr>

        <tr>
            <td colspan="2"></td>
            <td height="45" valign="middle"><input type="submit" name="button" id="button" value="Envoyer"/><p>
            </td>
        </tr>

        <tr>
            <td height="45" colspan="2" align="center" valign="bottom"><a href="../password_recovery_form.php"  style="font-size:17px">Mot de passe oubli&eacute;?</a></td>
            <td height="50" align="center" valign="bottom"><a href="javascript:display(Http.Cache.GetNoCache, 'storeProductsTable', '../changePassForm.php')" style="font-size:17px">Changer Mot de passe</a></td>

        </tr

        >
    </table>
</form>
