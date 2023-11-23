<?php
session_start();
include('../function.php');
$connexion = connexion();
echo $_SESSION['id']; //recup id du publicateur*/
$comments = new Comments;

if (isset($_POST)) {
    $comments->addCommentr($connexion);
    // header('location:../oneGame.php?id=' . $_POST['id_partie'] . '&publishComment="moderation"');
    $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/oneGame.php?id=' . $_POST['id_partie'] . '&publishComment="moderation"';
    header('location: ' . $redirect_url);
}
