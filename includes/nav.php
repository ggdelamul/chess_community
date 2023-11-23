<body>
    <div class="container">
        <header>
            <div class="icone-burger">
                <i class="fa fa-bars"></i>
            </div>
            <div class="nav-container">
                <div class="logo-container">
                    <img src="assets/image/logo-removebg-preview.png" alt="logo du site">
                </div>
                <nav class="main-nav">
                    <ul>
                        <li><a class="slide-line" href="index.php">Accueil</a></li>
                        <li><a class="slide-line" href="espace.php">Espace membre</a></li>
                        <li><a class="slide-line" href="contact.php">Contact</a></li>
                        <li>
                            <?php
                            if (isset($_SESSION['role_utilisateur'])) {
                                if ($_SESSION['role_utilisateur'] == 'admin') { ?>
                                    <a class="slide-line" href="admin.php">Administration</a>
                        </li><?php }
                            } else {
                            } ?>
                    </ul>
                </nav>
                <div class="register-container">
                    <ul>
                        <li>
                            <?php if (!isset($_SESSION['id'])) { ?>
                                <a class="connect" href="login.php">Se connecter</a>
                            <?php } ?>
                        </li>
                        <li>
                            <?php
                            if (isset($_SESSION['pseudo'])) { ?>
                                <form action="controller/logout_controller.php" method="POST">
                                    <button class="connect" type="submit" name="deconnexion">Se deconnecter</button>
                                </form>
                        </li>
                    <?php
                            } else {
                                echo '<a class="slide-line" href="register.php">S\'inscrire</a>';
                            } ?>
                    </li>
                    <li>
                        
                            <?php if (isset($_SESSION['pseudo'])) {?>
                                <a class="slide-line" href="compte.php">Bonjour
                               <?php  echo $_SESSION['pseudo']; ?></a>
                            <?php } else { ?>
                                <a href="register.php" class="slide-line">Bonjour Invité</a>
                            <?php } ?>
                        
                    </li>
                    </ul>
                </div>
            </div>
        </header>
        <main>