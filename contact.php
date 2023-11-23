<?php
session_start();
include('function.php');
include('controller/blacklist_controller.php');
require('includes/header.php');
include('includes/nav.php');
?>
<div class="contact-container">
    <section class="section-title" data-aos="fade-up">
        <h1>Contact</h1>
    </section>
    <div class="mail-feedback">
        <?php
        if (isset($_GET['send'])) {
            if ($_GET['send'] == 0) { ?>
                <?php
                // echo $_GET['send'];
                ?>
                <p>Votre message a bien été envoyé</p>
            <?php } else {
                // echo $_GET['send'];
            ?>
                <p>Votre message n'a pas pu être envoyé</p>
        <?php }
        }
        ?>
    </div>
    <section class="form-container" data-aos="fade-up" data-aos-delay="300">
        <form class="register" action="controller/contact_controller.php" method="POST">
            <div class="input-container"><input type="text" required="required" name="nom"><span>Votre Nom</span></div>
            <div class="input-container"><input type="mail" required="required" name="mail"><span>Votre email</span></div>
            <div class="input-container"><textarea type="text" required="required" name="message"></textarea><span>Votre message</span>
            </div>
            <div class="input-container">
                <button type="submit">Envoyer votre message
                </button>

            </div>
        </form>
    </section>
</div>
<?php
require('includes/footer.php');
?>