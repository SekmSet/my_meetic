<!DOCTYPE html>
<html lang="fr">

<head>
    <title>my_meetic</title>
    <link rel="stylesheet" href="design/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<body>
    <header>
        <h1 class="title">My Meetic </h1>
        <nav>
            <div class="row">
                <div class="container col-md-12 offset-md-3 nav_head">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a class="py-2 d-none d-md-inline-block" href="/">Accueil</a></li>
                        <?php if(empty($_SESSION['user'])){ ?>
                            <li class="list-inline-item" id="first_ul_member"><a  class="py-2 d-none d-md-inline-block" href="#">Déjà membre ?</a>
                                <ul id ="sub_ul_member">
                                    <li><a class="py-2 d-none d-md-inline-block" href="login">Connexion</a></li>
                                    <li><a class="py-2 d-none d-md-inline-block" href="register">Inscription</a></li>
                                </ul>
                            </li>

                        <?php } else { ?>
                            <li class="list-inline-item"> <a class="py-2 d-none d-md-inline-block"  href="search">Recherche</a></li>
                            <li class="list-inline-item" id="first_ul_account" > <a class="py-2 d-none d-md-inline-block" href="#">Mon Compte </a>
                                <ul id ="sub_ul_account">
                                    <li><a class="py-2 d-none d-md-inline-block" href="account">Mon espace</a></li>
                                    <li><a class="py-2 d-none d-md-inline-block" href="logout">Deconnexion</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
