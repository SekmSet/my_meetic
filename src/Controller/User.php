<?php


namespace App\Controller;

use App\Command\LoisirCommand;
use App\Command\UserCommand;

class User extends BaseController
{
    public function login(){
        $mail = $_POST['utilisateur_mail']??null;
        $login = $_POST['utilisateur_mail']??null;
        $pwd = $_POST['user_pwd']??null;

        $errors = [];

        if (!empty($mail) && !empty($pwd)){
            // On va chercher dans notre BD si un utilisateur correspond
            $user_command = new UserCommand();
            $membre = $user_command->sql_request_login($mail, $login, $pwd);

            if ($membre === false) {
                $errors[] = "Une erreur s'est produite, veuillez reessayer";
            } else {
                $_SESSION['user'] = $membre;
                header('Location: http://localhost:8080/');
                exit;
            }
        }
        $this->return_pages('user/login', [
            'errors' => $errors,
        ]);
    }

    public function register(){
        $name = $_POST['name']??null;
        $first_name = $_POST['first_name']??null;
        $login = $_POST['user_name']??null;
        $pwd = $_POST['user_pwd']??null;
        $birthday = $_POST['user_birth']??null;
        $mail = $_POST['email_user']??null;
        $adress = $_POST['user_adress']??null;
        $city = $_POST['user_city']??null;
        $cp = $_POST['user_cp']??null;
        $hobbies = $_POST['loisir']?? [];
        $gender = $_POST['user_gender']??null;

        $errors = [];

        foreach($hobbies as $key => $value) {
            if(empty($value)) {
                unset($hobbies[$key]);
            }
        }
        // on verifie si tous les postes sont remplis
        if(!empty($name) && !empty($first_name) &&
            !empty($login) && !empty($pwd) &&
            !empty($birthday) && !empty($mail)
            && !empty($adress) && !empty($city)
            && !empty($cp)&& !empty( $gender)) {

            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email invalide";
            } elseif (empty($hobbies)) {
                $errors[] = 'Il faut au moins un loisir';
            } elseif (!$this->isMajor($birthday)) {
                $errors[] = 'Il faut au moins 18 ans';
            } elseif (strlen($pwd) < 8 || strlen($pwd) > 16) {
                $errors[] = 'Votre mot de passe doit contenir entre 8 et 16 caractères';
            }

            $date_array = explode('-', $birthday);

            if (count($date_array) !== 3) {
                $errors[] = 'Format date d\'anniversaire invalide';
            } else {
                $tmp = checkdate((int)$date_array[1], (int)$date_array[2], (int)$date_array[0]);
                if ($tmp !== true) {
                    $errors[] = 'Format date pas conforme';
                }
            }

            // on verifie que l'utilisateur est 'nouveau' (adresse mail- nom d'utilisateur unique)
            $user_register = new UserCommand();
            $regsiter = $user_register->check_user_dispo($login,$mail);

            // si tout est ok -> j'envoie à la BD et j'ajoute la ligne utilisateur et redirection vers page de login
            if(!empty($regsiter)){
                $errors[] = 'Impossible de créer un compte, le nom d\' utilisateur existe déjà ';
                // Sinon je retourne des erreurs (message d'erreur) et je n'ajoute rien à la BD
            } elseif(empty($errors)) {
                $user_register = new UserCommand();
                $user_register->add_new_member($name,$first_name,$birthday,$mail,$login,$pwd,$city,$cp,$gender,$adress,$hobbies);
                header('Location: http://localhost:8080/login');
                exit;
            }
        }

        // $errors=[]; si c'est vide : rien à afficher
        $this->return_pages('user/register',[
            'errors' => $errors
        ]);
    }

    public function account(){
        $id = $_SESSION['user']['id'];

        $name = $_POST['name']??null;
        $first_name = $_POST['first_name']??null;
        $pwd = $_POST['user_pwd']??null;
        $birthday = $_POST['user_birth']??null;
        $mail = $_POST['email_user']??null;
        $adress = $_POST['user_adress']??null;
        $city = $_POST['user_city']??null;
        $cp = $_POST['user_cp']??null;
        $hobbies = $_POST['loisir']??[];
        $gender = $_POST['user_gender']??null;

        $errors=[];
        $info = new UserCommand();

        // supprime l'autre loisir quand il est vide
        foreach($hobbies as $key => $value) {
            if(empty($value)) {
                unset($hobbies[$key]);
            }
        }

        if(!empty($name) && !empty($first_name) && !empty($birthday) && !empty($mail)
            && !empty($adress) && !empty($city) && !empty($cp)) {

            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Email invalide';
            } elseif (empty($hobbies)) {
                $errors[] = 'Il faut au moins un loisir';
            } elseif (!$this->isMajor($birthday)) {
                $errors[] = 'Il faut au moins 18 ans';
            } else {
                $info->update_informations($id, $name, $first_name, $birthday, $mail, $pwd, $city, $cp, $gender, $adress, $hobbies);
            }

            $date_array = explode('-', $birthday);
            if (count($date_array) !== 3) {
                $errors[] = 'Format date d\'anniversaire invalide';
            } else {
                $tmp = checkdate((int)$date_array[1], (int)$date_array[2], (int)$date_array[0]);
                if ($tmp !== true) {
                    $errors[] = 'Format date pas conforme';
                }
            }
        }

        if(!empty($pwd)){
            if(strlen($pwd)<8 || strlen($pwd)>16){
                $errors[] = 'Votre mot de passe doit contenir entre 8 et 16 caractères';
            }
        }

        $informations = $info->get_info_membre($id);

        $informations['loisirs'] = [];

        foreach ($info->get_loisirs_membre($id) as $value) {
            $informations['loisirs'][] = $value['nom_loisir'];
        }

        $loisir = new LoisirCommand();
        $loisirs = $loisir->get_loisirs();

        $this->return_pages('user/account', [
            'user_info' => $informations,
            'loisirs' => $loisirs,
            'errors' =>  $errors
        ]);
    }

    public function delete(){
        $id = $_SESSION['user']['id'];
        $user_delete = new UserCommand();
        $user_delete->delete_account($id);
        $this->logout();
    }

    public function logout(){
        session_destroy();
        header('Location: http://localhost:8080/');
    }

    //Validate for users over 18 only
    private function isMajor($date)
    {
        $dates = explode('-', $date);
        $majorite = date('Y') - (int)$dates[0];

        return $majorite >= 18 ? true : false;
    }
}