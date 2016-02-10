<div class="row">
    <div class="large-12 columns">
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name">
                    <h1><a href="index.php">GSB</a></h1>
                </li>
                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>
            <section class="top-bar-section">
                <!-- Right Nav Section -->
                <ul class="right">
                    <?php
                    if (isset($_SESSION['id'])) {
                        ?>
                        <li><a href="#"><?php echo $_SESSION['login'] ?> <i class="step fi-torso size-18"></i></a></li>
                        <?php
                    }
                    ?>
                    <li class="active">
                        <?php
                        if (isset($_SESSION['id'])) {
                            ?>
                            <a href="index.php?page=logout">Déconnexion</a>
                            <?php
                        } else {
                            ?>
                            <a href="#" data-reveal-id="myModal">Connexion</a>
                            <div id="myModal" class="reveal-modal tiny" data-reveal>
                                <h2>Identifiants</h2>
                                <form method="post" action="modele/login.php">
                                    <fieldset>
                                        <ul>
                                            <li>
                                                <label>Login</label>
                                                <input name="login" type="text" required>
                                            </li>
                                            <li>
                                                <label>Mot de Passe</label>
                                                <input name="mdp" type="password" required>
                                            </li>
                                        </ul>
                                    </fieldset>
                                    <div>
                                        <button type="submit">Se connecter</button>
                                    </div>
                                </form>
                                <a class="close-reveal-modal">&#215;</a>
                            </div>
                            <?php
                        }
                        ?>
                    </li>
                </ul>
            </section>
        </nav>
    </div>
</div>