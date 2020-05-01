<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-6">Bonjour, tu es sur la page de ton compte !</h2>

            <p>Ici tu peux : p</p>

            <ul>
                <li>
                    Consulter tes informations personnelles
                </li>
                <li>
                    Modifier tes informations personnelles
                </li>
                <li>
                    Supprimer ton compe :'(
                </li>
            </ul>

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
            <span class="obg">Informations obligatoires *</span>

            <form class="needs-validation" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Nom</label>  <span class="etoile">*</span>
                        <input type="text" class="form-control" id="firstName"  name="name" placeholder="Videl" value="<?= $vars['user_info']['nom']; ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="lastName">Prénom</label>  <span class="etoile">*</span>
                        <input type="text" class="form-control" id="lastName" placeholder="Leone" name="first_name" value="<?= $vars['user_info']['prenom']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="user_birth">Date de naissance</label>  <span class="etoile">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">&#128467;</span>
                            </div>
                            <input type="date" class="form-control" id="user_birth" name="user_birth" value="<?= $vars['user_info']['date_naissance']; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="username">Nom d'utilisateur</label>  <span class="etoile">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" id="username" placeholder="Chinchillax"  value="<?= $vars['user_info']['login']; ?>" disabled>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="user_pwd">Mot de passe</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">&#x1F512;</span>
                            </div>
                            <input type="password" class="form-control" id="user_pwd" name="user_pwd" placeholder="Mot de passe">
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
                            <input type="email" class="form-control" id="email" name = "email_user" placeholder="leone.videl@example.com" value="<?= $vars['user_info']['mail']; ?>">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="address">Address</label>  <span class="etoile">*</span>
                        <input type="text" class="form-control" id="address" placeholder="21 Jump Street" name = "user_adress" value="<?= $vars['user_info']['adress']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="ville">Ville</label>  <span class="etoile">*</span>
                        <input type="text" class="form-control" id="ville" placeholder="Paris" name="user_city" value="<?= $vars['user_info']['ville']; ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="cpostal">Code postal</label>  <span class="etoile">*</span>
                        <input type="text" class="form-control" id="cpostal" placeholder="75000" name="user_cp" value="<?= $vars['user_info']['code_postal']; ?>">
                    </div>
                </div>

                <hr class="mb-4">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="custom-control">
                            <label >Mes loisirs :</label>  <span class="etoile">*</span>
                        </div>

                        <?php foreach ($vars['loisirs'] as $value){ ?>
                            <div class="custom-control">
                                <input type="checkbox" id="<?= $value['nom_loisir'] ?>" name="loisir[]" value="<?= $value['nom_loisir'] ?>" class="custom-control-input"
                                    <?php if (in_array($value['nom_loisir'], $vars['user_info']['loisirs'])) { echo 'checked'; } ?>>
                                <label class="custom-control-label" for="<?= $value['nom_loisir'] ?>"> <?= $value['nom_loisir'] ?></label>
                            </div>
                       <?php } ?>

                        <div>
                            <label for="autre_loisir">Autre : </label>
                            <input type="text" id="autre_loisir" name="loisir[]" placeholder="Les chinchillas">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="custom-control">
                            <label >Je suis  :</label>  <span class="etoile">*</span>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="sexe_homme" name="user_gender" type="radio" class="custom-control-input" value="h" <?php if( $vars['user_info']['sexe']==="h"){ echo 'checked'; }?> required>
                            <label class="custom-control-label" for="sexe_homme">Un homme</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="sexe_femme" name="user_gender" type="radio" class="custom-control-input" value="f"  <?php if( $vars['user_info']['sexe']==="f"){ echo 'checked'; }?> required>
                            <label class="custom-control-label" for="sexe_femme">Une femme</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="sexe_other" name="user_gender" type="radio" class="custom-control-input" value="o" <?php if( $vars['user_info']['sexe']==="o"){ echo 'checked'; }?>  required>
                            <label class="custom-control-label" for="sexe_other">Autre</label>
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Modifier mes informations</button>
            </form>

            <form action="delete" method="post">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Supprimer mon compte</button>
            </form>
        </div>
    </div>
</div>



