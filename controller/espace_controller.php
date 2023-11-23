<?php
$connexion = connexion();
$games = new Games;
$lastGamesByplayers = $games->LastGamesByPlayer($connexion, $_SESSION['id']);
