<div class="container">
    <h2 class="mb-3">Formulaire d'inscription</h2>
    <span class="obg"> Informations obligatoires * </span>

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

    <form class="needs-validation" method="post">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name">Nom</label> <span class="etoile">*</span>
                <input type="text" class="form-control" name="name" id="name" placeholder="Videl" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="first_name">Prénom</label> <span class="etoile">*</span>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Leone" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="username">Nom d'utilisateur</label> <span class="etoile">*</span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">&#9786;</span>
                    </div>
                    <input type="text" class="form-control" id="username" name="user_name" placeholder="Chinchillax" required>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="user_pwd">Mot de passe</label> <span class="etoile">*</span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">&#x1F512;</span>
                    </div>
                    <input type="password" class="form-control" id="user_pwd" name="user_pwd" placeholder="Mot de passe entre 8 et 16 caractères" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="user_birth">Date de naissance</label> <span class="etoile">*</span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">&#128467;</span>
                    </div>
                    <input type="date" class="form-control" id="user_birth" name="user_birth" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="user_birth">Adresse mail</label>  <span class="etoile">*</span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">&#64;</span>
                    </div>
                    <input type="email" class="form-control" id="email" name = "email_user" placeholder="leone.videl@example.com" required>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="address">Addresse postale</label> <span class="etoile">*</span>
                <input type="text" class="form-control" id="address"  name="user_adress" placeholder="21 Jump Street" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="ville">Ville</label> <span class="etoile">*</span>
                <input type="text" class="form-control" id="ville" name="user_city" placeholder="Paris" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="cpostal">Code postal</label> <span class="etoile">*</span>
                <input type="text" class="form-control" id="cpostal" name="user_cp" placeholder="75000" required>
            </div>
        </div>


        <hr class="mb-4">

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="custom-control">
                    <label>Mes loisirs :</label> <span class="etoile">*</span>
                </div>
                <div class="custom-control">
                    <input type="checkbox" id="cuisine_loisir" name="loisir[]"  value="cuisine" class="custom-control-input" checked>
                    <label class="custom-control-label" for="cuisine_loisir">Cuisine</label>
                </div>
                <div class="custom-control">
                    <input type="checkbox" id="lecture_loisir" name="loisir[]" value="lecture" class="custom-control-input">
                    <label class="custom-control-label" for="lecture_loisir">Lecture</label>
                </div>
                <div class="custom-control">
                    <input type="checkbox" id="equitation_loisir" name="loisir[]"  value="equitation" class="custom-control-input">
                    <label class="custom-control-label" for="equitation_loisir">Equitation</label>
                </div>

                <div class="custom-control">
                    <input type="checkbox" id="informatique_loisir" name="loisir[]" value="informatique" class="custom-control-input">
                    <label class="custom-control-label" for="informatique_loisir">Informatique</label>
                </div>
                <div class="custom-control">
                    <input type="checkbox" id="randonnéé_loisir" name="loisir[]" value="randonnéé" class="custom-control-input">
                    <label class="custom-control-label" for="randonnéé_loisir">Randonnée</label>
                </div>
                <div class="custom-control">
                    <input type="checkbox" id="danse_loisir" name="loisir[]" value="danse" class="custom-control-input">
                    <label class="custom-control-label" for="danse_loisir">Danse</label>
                </div>

                <div>
                    <label for="autre_loisir">Autre : </label> <span class="etoile" >*</span>
                    <input type="text" id="autre_loisir" name="loisir[]" placeholder="Les chinchillas">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="custom-control">
                    <label>Par sexe :</label> <span class="etoile">*</span>
                </div>
                <div class="custom-control custom-radio">
                    <input id="sexe_homme" name="user_gender" type="radio" class="custom-control-input" value="h" checked required>
                    <label class="custom-control-label" for="sexe_homme">Un homme</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="sexe_femme" name="user_gender" type="radio" class="custom-control-input" value="f" required>
                    <label class="custom-control-label" for="sexe_femme">Une femme</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="sexe_other" name="user_gender" type="radio" class="custom-control-input" value="o" required>
                    <label class="custom-control-label" for="sexe_other">Autre</label>
                </div>
            </div>
            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit">Valider</button>
        </div>
    </form>
</div>