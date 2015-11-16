<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<!doctype html>
<html>
<?php require("headerAdmin.php");?>
<body>
<div id="page">

    <form id="changePass" name="changePass" method="post" action="/comp353/comp353/admin/changingPass.php">
        <table class="changePass" width="500" border="0" align="center" bgcolor="#DBDBDB">
            <tr>
                <th colspan="3" height="45"><h3>Changer le mot de passe</h3></th>
            </tr>
            <tr><td colspan="101"><p></td></tr>
            <tr>
                <td height="45" align="right">Nom d&acute;usager:</td>
                <td>&nbsp;</td>
                <td><input type="text" name="oldusername" id="oldusername" required/></td>
            </tr>
            <tr>
                <td height="45" align="right">Ancien mot de passe</td>
                <td height="35">&nbsp;</td>
                <td><input type="password" name="oldpassword" id="oldpassword" required/></td>
            </tr>
            <tr><td colspan="3"><hr></td></tr>
            <tr>
                <td height="45" align="right">Nouveau mot de passe</td>
                <td height="35">&nbsp;</td>
                <td height="35"><input type="password" name="newpassword1" id="newpassword1" required/></td>
            </tr>
            <tr>
                <td height="45" align="right">Nouveau mot de passe (R&eacute;p&eacute;ter)</td>
                <td>&nbsp;</td>
                <td><input type="password" name="newpassword2" id="newpassword2" required/></td>
            </tr>
            <tr>
                <td height="45" colspan="3" align="center" valign="middle"><input type="submit" name="submit" id="button" value="Envoyer"/></td>
            </tr>

        </table>
    </form>
</div>
</body>
</html>