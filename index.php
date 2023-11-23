<?php
session_start();
// foreach ($_SERVER as $key => $item) {
//     echo $key . "/ " . $item . '<br>';
// }
include('function.php');
include('controller/blacklist_controller.php');
require('controller/index_controller.php');
$board = true;
require('includes/header.php');
include('includes/nav.php');
?>
<section class="section-title" data-aos="fade-up">
    <h1>Chess-community</h1>
</section>
<section class="presentation-section" data-aos="fade-up" data-aos-delay="300">
    <div class="row">
        <aside class="resume-container">
            <h2>Dernières parties publiés </h2>
            <?php
            foreach ($lastGames as $game) {
            ?>
                <div class="resume-wrapper">
                    <div class="header-resume">
                        <h3>Auteur:</h3>
                        <p><?= $game['pseudo'] ?></p>
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
        </aside>
        <article>
            <p class="first-paragraphe">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam pariatur iure corporis vero, incidunt quibusdam, atque doloribus veniam voluptas, veritatis dolorum labore aut iusto! Earum dolorum ratione iure? Totam, porro.</p>
            <p class="second-paragraphe">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam pariatur iure corporis vero, incidunt quibusdam, atque doloribus veniam voluptas, veritatis dolorum labore aut iusto! Earum dolorum ratione iure? Totam, porroorem ipsum dolor sit, amet consectetur adipisicing elit. Totam pariatur iure corporis vero, incidunt quibusdam, atque doloribus veniam voluptas, veritatis dolorum labore aut iusto! Earum dolorum ratione iure? Totam, porro.</p>
        </article>
    </div>
</section>
<section data-aos="fade-up">
    <div class="section-title-h2">
        <h2>Partie du jour</h2>
        <?php
        $oneGame = $allGames[$random];
        ?>
    </div>
    <div class="row">
        <div class="board-container">
            <ct-pgn-viewer board-size="320px" has-url="true" board-resizable="true" class="board">
                <?php echo $oneGame['file_path']; ?>
            </ct-pgn-viewer>
        </div>
        <div class="resume-container">
            <div class="resume-wrapper">
                <div class="header-resume">
                    <h3>Auteur:</h3>
                    <p><?= $oneGame['pseudo'] ?></p>
                    <h3>Elo:</h3>
                    <p><?= $oneGame['elo_utilisateur'] ?></p>
                </div>
                <div class="footer-resume">
                    <h3>Date de publication:</h3>
                    <p><?= $oneGame['date_de_publication'] ?></p>
                    <h3>Couleur joué:</h3>
                    <p><?= $oneGame['couleur_joue'] ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require('includes/footer.php');
?>