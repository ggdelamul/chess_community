<?php
include('function.php');
include('controller/blacklist_controller.php');
require('includes/header.php');
include('includes/nav.php');
?>
<div class="inscription-container">
    <section class="section-title">
        <h1>Inscription</h1>
    </section>
    <form class="register" action="controller/register_controller.php" method="POST">
        <div class="input-container"><input type="text" required="required" name="pseudo"><span>Votre pseudo</span></div>
        <div class="input-container"><input type="mail" required="required" name="mail"><span>Votre email</span></div>
        <div class="input-container"><input type="text" required="required" name="password"><span>Votre mot de passe</span></div>
        <div class="svg-container">
            <i class="fa fa-eye-slash"></i>
        </div>
        <?php
        if (isset($_GET['message'])) { ?>
            <div>
                <p>Le mail ou le pseudo est déjà utilisé</p>
            </div>
        <?php }
        ?>
        <div class="input-container">
            <button type="submit">S'inscrire</button>
        </div>
    </form>
</div>
<?php
require('includes/footer.php');
?>