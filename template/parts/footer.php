    <hr>
    <footer class="container px-3 py-3">
        <div class="row">
            <div class="col-5 col-md">
                <h4> Plan du site </h4>
                <ul class="list-unstyled text-small">
                    <li class="nav-item">
                        <a class="text-muted" href="/">
                            Accueil
                        </a>
                    </li>

                    <?php if(empty($_SESSION['user'])){ ?>
                        <li>
                            <a class="text-muted"  href="login">
                                Connexion
                            </a>
                        </li>
                        <li>
                            <a class="text-muted"  href="register">
                                Inscription
                            </a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a class="text-muted"  href="search">
                                Recherche
                            </a>
                        </li>
                        <li>
                            <a class="text-muted"  href="account">
                                Mon espace
                            </a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
            <div class="col-6 col-md">
                <h4>Nous contacter</h4>
                <ul class="list-unstyled text-small">
                    <li class="text-muted">
                        Téléphone : 04 71 71 71 71
                    </li>

                    <li class="text-muted">
                        Fax : 04 72 72 72 72
                    </li >

                    <li class="text-muted">
                        Adresse : My Meetic - 21 Jump Street, Paris 75000
                    </li>

                    <li>
                        <a href="#">
                            Formulaire de contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="./design/jquery.js"></script>
    <script src="./design/script.js"></script>
</body>
</html>