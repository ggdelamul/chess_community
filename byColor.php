<?php
session_start();
include('function.php');
include('controller/blacklist_controller.php');
if (!isset($_SESSION['id'])) {
    header('location: login.php');
}
require('includes/header.php');
include('includes/nav.php');
// include('controller/oneGame_controller.php');
if (isset($_GET['couleur'])) {
    $connexion = connexion();
    $games = new Games;
    $gameBycolor = $games->colorGames($connexion, $_GET['couleur']);
}

?>

<section class="section-title" data-aos="fade-up">
    <h1>Dernières parties publiés <?php echo $_GET['couleur'] ?> </h1>
</section>
<section class="color" data-aos="fade-up" data-aos-delay="300">
    <article class="resume-container">
        <?php
        foreach ($gameBycolor as $game) {
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
            </div>
        <?php }
        ?>
    </article>
</section>
<?php
require('includes/footer.php');
?>