<?php
session_start();
include('function.php');
include('controller/blacklist_controller.php');
$espace = true;
if (!isset($_SESSION['id'])) {
    header('location: login.php');
    exit;
}
require('includes/header.php');
include('includes/nav.php');
?>
<?php
require('controller/espace_controller.php');
?>
<div class="member_section-container">
    <section class="member_section-title" data-aos="fade-up">
        <h2>Espace membre </h2>
        <?php
        if (isset($_GET['publish'])) {
            echo "votre partie est en attente de modération";
        }
        ?>
    </section>
    <section>

    </section>
    <section class="resume-game_section" data-aos="fade-up" data-aos-delay="300">
        <aside class="resume-container">
            <h2>Mes dernières parties publiés </h2>
            <?php
            foreach ($lastGamesByplayers as $game) {
            ?>
                <div class="resume-wrapper">
                    <div class="header-resume">
                        <h3>Auteur:</h3>
                        <p><a href="oneGame.php?id=<?php echo $game['0'] ?>"><?= $game['pseudo'] ?></a></p>
                        <h3>Elo:</h3>
                        <p><?= $game['elo_utilisateur'] ?></p>
                    </div>
                    <div class="footer-resume">
                        <h3>Date de publication:</h3>
                        <p><?= $game['date_de_publication'] ?></p>
                        <h3>Couleur joué:</h3>
                        <p><?= $game['couleur_joue'] ?></p>
                    </div>
                    <div class="delete-wrapper">
                        <a href="controller/delete_controller.php?id=<?= $game['id'] ?>">supprimer</a>
                    </div>
                </div>
            <?php }
            ?>
        </aside>
    </section>
    <aside class="second-menu-container" data-aos="fade-up" data-aos-delay="300">
        <div class="second-menu-container-title">
            <h3>Rechercher une partie</h3>
        </div>
        <ul class="second-menu-wrapper">
            <li><a class="main-item slide-line" href="membres.php">Liste des membres</a></li>
            <li class="elo">
                <span class="main-item slide-line">Par couleurs joués</span>
                <ul class="sub-li displayNone">
                    <li><a class="sub-item" href="byColor.php?couleur=blanc">blanc</a></li>
                    <li><a class="sub-item" href="byColor.php?couleur=noir">noir</a></li>
                </ul>
            </li>
            <li class="elo">
                <span class="main-item slide-line">Par Elo</span>
                <ul class="sub-li displayNone">
                    <li><a class="sub-item" href="listByElo.php?min=0&max=799">- de 799 ELO</a></li>
                    <li><a class="sub-item" href="listByElo.php?min=800&max=999">entre 800 et 999 ELO</a></li>
                    <li><a class="sub-item" href="listByElo.php?min=1000&max=1199">entre 1000 et 1199 ELO</a></li>
                    <li><a class="sub-item" href="listByElo.php?min=1200&max=1399">entre 1200 et 1399 ELO</a></li>
                    <li><a class="sub-item" href="listByElo.php?min=1400&max=1599">entre 1400 et 1599 ELO</a></li>
                    <li><a class="sub-item" href="listByElo.php?min=1600&max=1799">entre 1600 et 1799 ELO</a></li>
                    <li><a class="sub-item" href="listByElo.php?min=1800&max=1999">entre 1800 et 1999 ELO</a></li>
                    <li><a class="sub-item" href="listByElo.php?min=2000&max=4000">au delà de 2000 ELO</a></li>
                </ul>
            </li>
        </ul>
        <div class="publication-container " data-aos="fade-left">
            <a href="publication.php?id='<?php echo $_SESSION['id'] ?>'" class="connect">Publier une partie</a>
        </div>
    </aside>
</div>
<?php
require('includes/footer.php');
?>