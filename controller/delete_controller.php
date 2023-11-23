<?php

if (isset($_GET['id'])) {
    include('../function.php');
    $connexion = connexion();
    $id =  $_GET['id'];
    $games = new Games;
    $oneGame = $games->oneGame($connexion, $id);
    foreach ($oneGame as $game);
    $file_path = '../' . $game['file_path'];
    // echo $file_path;
    $games->delete($connexion, $id);
    $games->deleteFile($file_path);
    // header('location: ../espace.php');
    $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/espace.php';
    header('location: ' . $redirect_url);
}
