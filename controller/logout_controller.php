<?php
session_start();
// print_r($_SESSION['id']);
if (isset($_POST['deconnexion'])) {
    echo "je veux me deconnecter et supprimer la session";
    session_destroy();
    // header('location:../login.php');
     $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/login.php';
    header('location: ' . $redirect_url);
}
