<?php
include('classes/Authentification.php');
include('classes/Games.php');
include('classes/Comments.php');
include('classes/Membres.php');
include('classes/Publication.php');
include('classes/Admin.php');
/*connexion bdd*************************************/
function connexion()
{
    try {
        $connect_pdo = new PDO("mysql:host=localhost;dbname=chess_community", "root", "");
        if (isset($connect_pdo)) {
            // echo "connexion OK";
        } else {
            echo "connexion échouée";
        }
    } catch (Exception $e) {
        echo "connexion impossible";
        var_dump($e);
    }
    return $connect_pdo;
}
