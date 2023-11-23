<?php
include('../function.php');
$connexion = connexion();
/*recupération de toutes les utilsateurs*/
$authentification = new Authentification;
$allUsers = $authentification->allUser($connexion);
// print_r($allUsers);
/*teste des mdp et login*/
if (isset($_POST['pseudo'])) {
    // echo $_POST['pseudo'];
    $hashedPassword = hash('sha256', $_POST['password']);
    $pseudo = strip_tags($_POST['pseudo']);
    // echo $hashedPassword;
    $currentLogin;
    foreach ($allUsers as $user) {
        if ($pseudo  == $user['pseudo']) {
            $currentLogin = $user;
            // print_r($currentLogin);
        }
    };
    if (isset($currentLogin)) {
        if ($currentLogin['mot_de_passe'] == $hashedPassword) {
            // print_r('le mot de passe est bon');
            session_start();
            $_SESSION = $currentLogin;
            // print_r($_SESSION['role_utilisateur']);
            if ($_SESSION['role_utilisateur'] == 'admin') {

                $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/admin.php';
                header('location: ' . $redirect_url);
            } else {

                $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/espace.php';
                header('location: ' . $redirect_url);
            }
        } else {
            // header('location:../login.php?login="false"');
            $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/login.php?login="false"';
            header('location: ' . $redirect_url);
        }
    } else {
        // header('location:../login.php?login="false"');
        $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/login.php?login="false"';
        header('location: ' . $redirect_url);
    }
}
