<?php
session_start();
include('function.php');
include('controller/blacklist_controller.php');
require('includes/header.php');
include('includes/nav.php');
?>
<?php
require('controller/admin_controller.php');
?>
<section class="section-title" data-aos="fade-up">
    <h1>Interface d'administration</h1>
</section>
<section class="member_section-title" data-aos="fade-up" data-aos-delay="300">
    <h2>Parties à valider</h2>
</section>
<section class="resume-game_section">
    <aside class="resume-container">
        <?php
        // print_r($allGamesAdmin);
        if (count($allGamesAdmin)) {
            foreach ($allGamesAdmin as $game) { ?>
                <div class="resume-wrapper">
                    <div class="header-resume">
                        <h3>Auteur:</h3>
                        <p><?= $game['pseudo'] ?></a></p>
                        <h3>Elo:</h3>
                        <p><?= $game['elo_utilisateur'] ?></p>
                    </div>
                    <div class="footer-resume">
                        <h3>Date de publication:</h3>
                        <p><?= $game['date_de_publication'] ?></p>
                        <h3>Couleur joué:</h3>
                        <p><?= $game['couleur_joue'] ?></p>
                    </div>
                    <div class="validation-wrapper">
                        <a href="controller/validation_controller.php?id=<?= $game['id'] ?>">Valider</a>
                        <a href="<?= $game['file_path'] ?>">télécharger</a>
                        <a href="controller/validation_controller.php?moderateid=<?= $game['id'] ?>&moderate='delete'">supprimer</a>
                    </div>
                </div>
        <?php }
        } else {
            echo "rien à valider";
        }
        ?>
    </aside>
</section>
<section class="member_section-title" data-aos="fade-up">
    <h2>Commentaires à valider</h2>
</section>
<section class="comment-section-admin" data-aos="fade-up" data-aos-delay="300">
    <?php
    if (count($allCommentAdmin)) {
        foreach ($allCommentAdmin as $comment) {
    ?>
            <div class="comment-container">
                <div class="comment">
                    <p>commentaire :<?= $comment['comment']; ?></p>
                    <p>auteur : <?= $comment['pseudo']; ?></p>
                    <p>Date de publication :<?= $comment['date_publication']; ?></p>
                    <a href="controller/validation_controller.php?idComment=<?= $comment['id'] ?>">Valider le commentaire</a>
                    <a href="controller/validation_controller.php?moderateCommentId=<?= $comment['id'] ?>&moderateComment='delete'">supprimer</a>
                </div>
                <hr>
        <?php }
    } else {
        echo 'rien à valider';
    };
        ?>
</section>
<section class="member_section-title" data-aos="fade-up">
    <h2>Listes de tout les utilisateurs</h2>
</section>
<section class="table-container" data-aos="fade-up" data-aos-delay="300">
    <table>
        <thead>
            <tr>
                <th>Pseudo</th>
                <th>Supprimer</th>
                <th>Envoi mail </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($allUserAdmin as $membre) {
                // print_r($membre);
            ?>
                <tr>
                    <td><?= $membre['pseudo'] ?></td>
                    <td>
                        <p><a href="controller/deleteUser_controller.php?id=<?= $membre['id'] ?>">Supprimer utilisateur</a></p>
                    </td>
                    <td>
                        <p><a href="mailto:<?= $membre['mail'] ?>">Envoyer un mail à <?= $membre['pseudo'] ?></a></p>
                    </td>
                </tr>
            <?php }  ?>
        </tbody>
    </table>
</section>
<?php
require('includes/footer.php');
?>