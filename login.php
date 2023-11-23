<?php
include('function.php');
include('controller/blacklist_controller.php');
require('includes/header.php');
include('includes/nav.php');
?>
<div class="inscription-container">
    <section class="section-title" data-aos="fade-up">
        <h1>Connexion</h1>
        <?php if (isset($_GET['login'])) {
            if ($_GET['login'] == "false") {
                echo "connexion échoué";
            }
        }
        ?>
    </section>
    <form class="register" action="controller/login_controller.php" method="POST" data-aos="fade-up" data-aos-delay="300">
        <div class="input-container"><input type="text" required="required" name="pseudo"><span>Votre pseudo</span></div>
        <div class="input-container"><input type="password" required="required" name="password" class="password"><span>Votre mot de passe</span></div>
        <div class="svg-container">
            <i class="fa fa-eye-slash"></i>
        </div>
        <div class="input-container">
            <button type="submit">Se connecter</button>
        </div>
        <a href="register.php" class="not-yet">Pas encore inscrit ? </a>
    </form>
</div>
<?php
require('includes/footer.php');
?>