<?php
session_start();
include('function.php');
include('controller/blacklist_controller.php');
$board = true;
require('includes/header.php');
include('includes/nav.php');
?>
<?php
require('controller/espace_controller.php');
$connexion = connexion();
$games = new Games;
$comments = new Comments;
$oneGame = $games->oneGame($connexion, $_GET['id']);
if (count($oneGame) > 0) {
    foreach ($oneGame as $game);
    $allCommentForOneGame = $comments->getCommentForOneGame($connexion, $_GET['id']);
    // print_r($allCommentForOneGame);
?>
    <section class="onegame-game" data-aos="fade-up">
        <section class="onegame-resume">
            <div class="resume-container">
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
            </div>
            <div class="board-container" data-aos="fade-up" data-aos-delay="300">
                <ct-pgn-viewer board-size="320px" has-url="true" board-resizable="true" class="board">
                    <?php echo $game['file_path']; ?>
                </ct-pgn-viewer>
            </div>
        </section>
        <section class="comment-section" data-aos="fade-up">
            <div class="header">
                <h2>Commentaires</h2>
            </div>
            <?php
            $compteur = 0;
            foreach ($allCommentForOneGame as $item) {
                $compteur++;
            ?>
                <div class="comment-container">
                    <div class="comment">
                        <p>commentaire <?= $compteur ?><br><?= $item['comment']; ?></p>
                        <p>auteur : <?= $item['pseudo']; ?></p>
                        <p>Date de publication :<?= $item['date_publication']; ?></p>
                    </div>
                    <hr>
                <?php };
                ?>
                <form action="controller/oneGame_controller.php" method="POST">
                    <h2>Ajoutez un commentaire</h2>
                    <?php
                    if (isset($_GET['publishComment'])) {
                        echo "votre commentaire est en cours de moderation";
                    }
                    ?>
                    <input type="hidden" value="<?= $_GET['id'] ?>" name="id_partie">
                    <textarea name="comment" id="" cols="30" rows="10">

                        </textarea>
                    <button type="submit" data-aos="fade-left">Envoyer un commentaire</button>
                </form>
                </div>

        </section>
    <?php } else { ?>
        <section class="section-title" data-aos="fade-up">
            <h1>Nous n'avons pas trouvé la partie demandé </h1>
        </section>
    <?php } ?>
    </section>
    <?php
    require('includes/footer.php');
    ?>