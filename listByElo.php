<?php
session_start();
include('function.php');
include('controller/blacklist_controller.php');
require('includes/header.php');
include('includes/nav.php');
?>
<div class="membre-container">
    <section class="section-title" data-aos="fade-up">
        <h1>Listes des parties Elo min: <?= $_GET['min'] ?> Elo max <?= $_GET['max'] ?></h1>
    </section>
    <section class="table-container" data-aos="fade-up" data-aos-delay="300">
        <table>
            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Elo </th>
                    <th class="desktop">Elo adversaire</th>
                    <th class="desktop">Couleur joué</th>
                    <th>Lien partie</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['min']) || isset($_GET['max'])) {
                    $connexion = connexion();
                    $games = new Games;
                    $min = $_GET['min'];
                    $max = $_GET['max'];
                    $gamesByElo = $games->gamesByElo($connexion, $min, $max);
                }
                foreach ($gamesByElo as $game) {
                ?>
                    <tr>
                        <td><?= $game['pseudo'] ?></td>
                        <td><?= $game['elo_utilisateur'] ?></td>
                        <td class="desktop"><?= $game['elo_adversaire'] ?></td>
                        <td class="desktop"><?= $game['couleur_joue'] ?></td>
                        <td><a href="oneGame.php?id=<?= $game['id'] ?>">Voir partie</a></td>
                    </tr>
                <?php  }
                ?>
            </tbody>
        </table>
    </section>
</div>

<?php
require('includes/footer.php');
?>