<div class="container">
    <h2 class="mb-3">Recherche</h2>
    <form class="needs-validation" method="get">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="ville">Ville</label>  <span class="etoile">*</span>
                <input type="text" class="form-control" id="ville" placeholder="Paris" name="city" value="<?= $vars['city'];?>">
            </div>

            <div class="col-md-6 mb-3">
                <label for="cpostal">Code postal</label>  <span class="etoile">*</span>
                <input type="text" class="form-control" id="cpostal" placeholder="75000" name="cp" value="<?= $vars['cp'];?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="custom-control">
                    <label>Age min. </label>
                </div>
                <input id="slider1_age_min" type="range" name="age_min" min="18" max="70" step="1" data-show-value="true" value="<?= $vars['age_min'];?>">
                <span id="val_age_min"></span>
            </div>
            <div class="col-md-6 mb-3">
                <div class="custom-control">
                    <label>Age max. </label>
                </div>
                <input id="slider1_age_max" type="range" name="age_max" min="18" max="70" step="1" data-show-value="true" value="<?= $vars['age_max'];?>">
                <span id="val_age_max"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="custom-control">
                    <label>Par loisir :</label>
                </div>
                <div class="custom-control">
                    <input type="checkbox" id="cuisine_loisir" name="loisir[]" value="cuisine" class="custom-control-input"
                        <?php if (in_array('cuisine',$vars['loisirs'])) { echo 'checked'; } ?>>
                    <label class="custom-control-label" for="cuisine_loisir">Cuisine</label>
                </div>
                <div class="custom-control">
                    <input type="checkbox" id="lecture_loisir" name="loisir[]" value="lecture" class="custom-control-input"
                        <?php if (in_array('lecture',$vars['loisirs'])) { echo 'checked'; } ?>>
                    <label class="custom-control-label" for="lecture_loisir">Lecture</label>
                </div>
                <div class="custom-control">
                    <input type="checkbox" id="equitation_loisir" name="loisir[]" value="equitation" class="custom-control-input"
                        <?php if (in_array('equitation',$vars['loisirs'])) { echo 'checked'; } ?>>
                    <label class="custom-control-label" for="equitation_loisir">Equitation</label>
                </div>

                <div class="custom-control">
                    <input type="checkbox" id="informatique_loisir" name="loisir[]" value="informatique" class="custom-control-input"
                        <?php if (in_array('informatique',$vars['loisirs'])) { echo 'checked'; } ?>>
                    <label class="custom-control-label" for="informatique_loisir">Informatique</label>
                </div>
                <div class="custom-control">
                    <input type="checkbox" id="randonnéé_loisir" name="loisir[]" value="randonnee" class="custom-control-input"
                        <?php if (in_array('randonnee',$vars['loisirs'])) { echo 'checked'; } ?>>
                    <label class="custom-control-label" for="randonnéé_loisir">Randonnée</label>
                </div>
                <div class="custom-control">
                    <input type="checkbox" id="danse_loisir" name="loisir[]" value="danse" class="custom-control-input"
                        <?php if (in_array('danse',$vars['loisirs'])) { echo 'checked'; } ?>>

                    <label class="custom-control-label" for="danse_loisir">Danse</label>
                </div>

                <div>
                    <label for="autre_loisir">Autre : </label>
                    <input type="text" id="autre_loisir" name="loisir[]" value="<?= end($vars['loisirs']);?>" placeholder="Les chinchillas">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="custom-control">
                    <label >Je recherche :</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="sexe_homme" name="user_gender" type="radio" class="custom-control-input" value="h" <?php if( $vars['gender']==="h"){ echo 'checked'; }?>>
                    <label class="custom-control-label" for="sexe_homme">Un homme</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="sexe_femme" name="user_gender" type="radio" class="custom-control-input" value="f" <?php if( $vars['gender']==="f"){ echo 'checked'; }?>>
                    <label class="custom-control-label" for="sexe_femme">Une femme</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="sexe_other" name="user_gender" type="radio" class="custom-control-input" value="o" <?php if( $vars['gender']==="o"){ echo 'checked'; }?>>
                    <label class="custom-control-label" for="sexe_other">Autre</label>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Recherche</button>
    </form>

    <div class="errors">
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
    </div>

    <div>
        <?php
            foreach ($vars['results'] as $key => $value){
                $year =  explode('-', $value['date_naissance']);
                $birth_year = (int)$year[0];
                $today = (int)date('Y');
                $age = $today - $birth_year;
        ?>
                <div class="carousel">
                    <div>
                        <h5><?= $value['prenom']; ?> <br> <?=  $value['nom']; ?></h5>
                        <ul>
                            <li><?=  'J\'ai ' . $age .' ans'; ?> </li>
                            <li><?= ' Je suis un(e) '. $value['sexe']; ?> </li>
                            <li><?=  ' Je viens de '. $value['ville']; ?> </li>
                            <li><?=  $value['code_postal'];?> </li>
                        </ul>
                    </div>
                </div>
        <?php }?>
        <div>
            <span id="nbr_prof"> </span>
        </div>

        <div class="row">
            <div class="col-md-6">
                <button class="button_previous" id="previous">Precédent</button>
            </div>
            <div class="col-md-6">
                <button class="button_next" id="next">Suivant</button>
            </div>
        </div>
    </div>
</div>


