<?php
/* les 4 dernières partie */
$connexion = connexion();
$games = new Games;

$lastGames = $games->lastGames($connexion);
/*partie random*/
$allGames = $games->allGames($connexion);
/*generer un random */
$lenght = count($allGames) - 1;
$random = rand(0, $lenght);
