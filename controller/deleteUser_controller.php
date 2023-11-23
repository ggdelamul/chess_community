<?php


if (isset($_GET['id'])) {
    include('../function.php');
    $connexion = connexion();
    $Admin = new Admin;
    $id = $_GET['id'];
    $game = $Admin->oneAdminGame($connexion, $id);
    // print_r($game);
    foreach ($game as $item);
    $filePath = '../' . $item['file_path'];
    echo $filePath;
    // echo "j'ai lid pour effacer ta tronche";
    $Admin->adminDeleteFile($filePath);
    $Admin->adminDelete($connexion, $id);
    // header('location: ../admin.php');
    $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/admin.php';
    header('location: ' . $redirect_url);
}
