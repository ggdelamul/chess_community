<?php
session_start();
include('../function.php');
$connexion = connexion();
$membres = new Membres;
if (isset($_POST)) {
    $membres->updateLog($connexion, $_GET['id']);
    $oneUser = $membres->oneAccount($connexion, $_GET['id']);
    // print_r($oneUser);
    $_SESSION = $oneUser[0];
    print_r($_SESSION);
    // header('location: ../espace.php');
    $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/espace.php';
    header('location: ' . $redirect_url);
}
