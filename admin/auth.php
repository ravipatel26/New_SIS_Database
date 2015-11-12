<?php

$_user_ = 'test';
$_password_ = 'test';

session_start();

$url_action = (empty($_REQUEST['action'])) ? 'logIn' : $_REQUEST['action'];
$auth_realm = (isset($auth_realm)) ? $auth_realm : '';

if (isset($url_action)) {
    if (is_callable($url_action)) {
        call_user_func($url_action);
    } else {
        echo 'Fonction n\'existe pas, requète terminée';
    };
};

function logIn() {
    global $auth_realm;

    if (!isset($_SESSION['username'])) {
        if (!isset($_SESSION['login'])) {
            $_SESSION['login'] = TRUE;
            header('WWW-Authenticate: Basic realm="'.$auth_realm.'"');
            header('HTTP/1.0 401 Unauthorized');
            echo "Utilisez un nom d'\usagé et un mot de pas valide.";
            echo '<p><a href="?action=logOut">Essayer à nouveau!</a></p>';
            exit;
        } else {
            $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
            $password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
            $result = authenticate($user, $password);
            if ($result == 0) {
                $_SESSION['username'] = $user;
            } else {
                session_unset($_SESSION['login']);
                errMes($result);
                echo '<p><a href="">Essayer à nouveau!</a></p>';
                exit;
            };
        };
    };
}

function authenticate($user, $password) {
    global $_user_;
    global $_password_;

    if (($user == $_user_)&&($password == $_password_)) { return 0; }
    else { return 1; };
}

function errMes($errno) {
    switch ($errno) {
        case 0:
            break;
        case 1:
            echo 'Nom d\'usagé ou mot de passe incorect.';
            break;
        default:
            echo 'Erreur inconnu';
    };
}

function logOut() {

    session_destroy();
    if (isset($_SESSION['username'])) {
        session_unset($_SESSION['username']);
        echo "Vous n\êtes plus en session sécuriée.<br>";
        echo '<p><a href="?action=logIn">LogIn</a></p>';
    } else {
        header("Location: ?action=logIn", TRUE, 301);
    };
    if (isset($_SESSION['login'])) { session_unset($_SESSION['login']); };
    exit;
}

?>
