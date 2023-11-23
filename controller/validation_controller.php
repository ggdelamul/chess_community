<?php
include('../function.php');
$connexion = connexion();
$Admin = new Admin;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo $id;
    $Admin->valideGame($connexion, $id);
    $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/admin.php';
    header('location: ' . $redirect_url);
}
if (isset($_GET['idComment'])) {
    $id = $_GET['idComment'];
    echo $id;
    $Admin->valideComment($connexion, $id);
    $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/admin.php';
    header('location: ' . $redirect_url);
}
if (isset($_GET['moderate'])) {
    $id = $_GET['moderateid'];
    echo $id;
    $Admin->moderateGame($connexion, $id);
    $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/admin.php';
    header('location: ' . $redirect_url);
}
if (isset($_GET['moderateComment'])) {
    echo "g le get";
    $id = $_GET['moderateCommentId'];
    $Admin->moderateComment($connexion, $id);
    $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/admin.php';
    header('location: ' . $redirect_url);
}
