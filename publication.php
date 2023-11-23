<?php
session_start();
include('function.php');
include('controller/blacklist_controller.php');
require('includes/header.php');
include('includes/nav.php');
?>
<main>
    <div class="publication-container">
        <section class="section-title" data-aos="fade-up">
            <h1>Publier une partie</h1>
        </section>
        <form action="controller/publication_controller.php" method='POST' enctype="multipart/form-data" class="register" data-aos="fade-up" data-aos-delay="300">
            <div class="input-container">
                <input type="text" required="required" name="myElo">
                <span>Votre ELO</span>
            </div>
            <div class="input-container">
                <input type="text" required="required" name="opponentElo">
                <span>ELO adversaire</span>
            </div>
            <select name="color" id="color-select">
                <option value="">couleur joué</option>
                <option value="blanc">Blanc</option>
                <option value="noir">Noir</option>
            </select>
            <div class="input-container-file">
                <label for="file" class="label-file">Joindre fichier pgn</label>
                <input id="file" class="input-file" type="file" name='file'>
            </div>
            <button type="submit">Publier une partie </button>
        </form>
    </div>
</main>
<?php
require('includes/footer.php');
?>