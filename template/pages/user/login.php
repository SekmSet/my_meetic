<div class="container">
    <h2 class="h3 mb-3 font-weight-normal">Connexion</h2>

    <?php if(!empty($vars['errors'])){ ?>
        <div class="alert alert-danger" role="alert">
            <ul>
                <?php foreach ($vars['errors'] as $error){ ?>
                    <li>
                        <?= $error ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>

    <div class="row">
        <form class="form-connexion col-md-4 offset-md-4" method="post">
            <div class="mb-3">
                <label for="username">Nom d'utilisateur ou Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" class="form-control" id="username" name="utilisateur_mail" placeholder="priscilla.joly@orange.fr" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="user_pwd">Mot de passe</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">&#x1F512;</span>
                    </div>
                    <input type="password" class="form-control" id="user_pwd" name="user_pwd" placeholder="Mot de passe" required>
                </div>
            </div>


            <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
        </form>
    </div>
</div>