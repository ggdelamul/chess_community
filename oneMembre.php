<?php
session_start();
include('function.php');
include('controller/blacklist_controller.php');
require('includes/header.php');
include('includes/nav.php');
?>
<div class="membre-container">
    <?php
    include('controller/membres_controller.php');
    $games = new Games;
    $allGamesByPlayer =  $games->allGamesByPlayer($connexion, $_GET['id']);
    // print_r($allGamesByPlayer);
    if (count($allGamesByPlayer) > 0) {


        foreach ($allGamesByPlayer as $oneGame);
    ?>
        <section class="section-title" data-aos="fade-up">
            <h1>Listes des parties de : <?= $oneGame['pseudo'] ?> </h1>
        </section>
        <section class="table-container" data-aos="fade-up" data-aos-delay="300">
            <table>
                <thead>
                    <tr>
                        <th>Identifiant partie</th>
                        <th>Elo</th>
                        <th class="desktop">Elo adversaire</th>
                        <th>Lien parties</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($allGamesByPlayer as $oneGame) {
                    ?>
                        <tr>
                            <td>
                                <p><?= $oneGame['id'] ?></p>
                            </td>
                            <td>
                                <p><?= $oneGame['elo_utilisateur'] ?></p>
                            </td>
                            <td class="desktop">
                                <p><?= $oneGame['elo_adversaire'] ?></p>
                            </td>
                            <td><a href="oneGame.php?id=<?= $oneGame['id'] ?>">Voir partie</a></td>
                        </tr>
                    <?php }  ?>
                </tbody>
            </table>
        </section>
    <?php } else { ?>
        <section class="section-title" data-aos="fade-up">
            <h1>Nous n'avons pas trouvé les partie de ce joueur</h1>
        </section>
    <?php } ?>
</div>

<?php
require('includes/footer.php');
?>