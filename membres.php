<?php
session_start();
include('function.php');
include('controller/blacklist_controller.php');
require('includes/header.php');
include('includes/nav.php');
?>

<?php
include('controller/membres_controller.php');
// print_r($showListeMembres);
?>
<div class="membre-container">
    <section class="section-title" data-aos="fade-up">
        <h1>Listes des membres </h1>
    </section>
    <section class="table-container" data-aos="fade-up" data-aos-delay="300">
        <table>
            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Nbr de parties</th>
                    <th>Elo moyens</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // var_dump($showListeMembres);
                foreach ($showListeMembres as $membre) {
                ?>
                    <tr>
                        <td><a href="oneMembre.php?id=<?= $membre['id_utilisateur'] ?>"><?= $membre['pseudo'] ?></a></td>
                        <td>
                            <p><?= $membre['nbr_partie'] ?></p>
                        </td>
                        <td>
                            <p><?= $membre['moyenneElo'] ?></p>
                        </td>
                    </tr>
                <?php }  ?>
            </tbody>
        </table>
    </section>
</div>

<?php
require('includes/footer.php');
?>