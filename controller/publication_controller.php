<?php
session_start();
include('../function.php');
$connexion = connexion();
$games = new Publication;
if (isset($_FILES['file'])) {
    $tmpName = $_FILES['file']['tmp_name'];
    $name = str_replace(' ', '', $_FILES['file']['name']);
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $extensions_valides = array('pgn');
    $extension_upload = strtolower(substr(strrchr($name, '.'), 1));
    if (in_array($extension_upload, $extensions_valides)) {
        if ($size < 1500) {
            move_uploaded_file($tmpName, '../partie/' . $name);
        }
        // 1. strrchr renvoie l'extension avec le point (« . »).
        // 2. substr(chaine,1) ignore le premier caractère de chaine.
        // 3. strtolower met l'extension en minuscules.
    }
    $filePath = 'partie/' . $name;
}
echo $filePath;

if (isset($_POST['myElo'])) {
    echo "envoi des données en base";
    echo $_SESSION['id'];
    $games->addGame($connexion, $filePath);
    $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/espace.php?publish="moderation';
    header('location: ' . $redirect_url);
}
