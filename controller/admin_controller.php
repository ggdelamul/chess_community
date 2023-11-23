<?php
$connexion = connexion();
$Admin = new Admin;
$allGamesAdmin;
$allGamesAdmin = $Admin->showGamesAdmin($connexion);
$allCommentAdmin = $Admin->showCommentAdmin($connexion);
$allUserAdmin = $Admin->getAdminAllUsers($connexion);
