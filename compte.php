<?php
session_start();
include('function.php');
include('controller/blacklist_controller.php');
require('includes/header.php');
include('includes/nav.php');
?>

<?php
$connexion = connexion();
$membres = new Membres;
$oneAccount = $membres->oneAccount($connexion, $_SESSION['id']);
// print_r($oneAccount);
foreach ($oneAccount as $item);


?>

<section class="section-title" data-aos="fade-up">
    <h1>infos du compte </h1>
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
            // foreach ($showListeMembres as $membre) {
            ?>
            <tr>
                <td><?= $item['pseudo'] ?></a></td>
                <td>
                    <p><?= $item['nbr_partie'] ?></p>
                </td>
                <td>
                    <p><?= $item['moyenneElo'] ?></p>
                </td>
            </tr>
            <?php   ?>
        </tbody>
    </table>
</section>

<section class=".section-title-h2">
    <h2>Modifiez vos informations de connexion</h2>
</section>
<form class="register" action="controller/compte_controller.php?id=<?= $_SESSION['id'] ?>" method="POST">

    <div class="input-container"><input type="text" required="required" name="newpseudo" value="<?= $_SESSION['pseudo'] ?>"><span>Votre nouveau pseudo</span></div>
    <div class="input-container"><input type="password" required="required" name="newpassword" class="password"><span>Votre nouveau mot de passe</span></div>
    <div class="svg-container">
        <i class="fa fa-eye-slash"></i>
    </div>
    <div class="input-container">
        <button type="submit">Modifiez</button>
    </div>
</form>
<?php
require('includes/footer.php');
?>