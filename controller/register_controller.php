<?php
include('../function.php');
$connexion = connexion();
$authentification = new Authentification;
//récupérer le contenue de la table utilisateur
$allUsers = $authentification->allUser($connexion);
if (isset($_POST)) {
    $isUsed = false;
    $mail = strip_tags($_POST['mail']);
    $pseudo = strip_tags($_POST['pseudo']);
    foreach ($allUsers as $item) {
        if ($mail == $item['mail'] || $pseudo == $item['pseudo']) {
            $isUsed = true;
            $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/register.php?message="error"';
            header('location: ' . $redirect_url);
        } else {
            $isUsed = false;
        }
    }
    if ($isUsed) {
        echo "je n'envois pas la fonction update";
    } else {
        echo "j'envoi la fonction update";
        $authentification->addUser($connexion);
        $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/success.php';
        header('location: ' . $redirect_url);
    }
}
