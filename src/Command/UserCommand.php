<?php


namespace App\Command;

use PDO;

class UserCommand extends BaseCommand
{
    public function sql_request_login($mail, $login, $pwd)
    {
        $return_members = $this->db->prepare("select * from my_meetic.utilisateur where mail = :mail 
                                                                                            or login = :login
                                                                                            -- and mdp = :crypt_pwd 
                                                                                            and actif = 1  limit 1;");
        $return_members->bindParam(':mail', $mail);
        $return_members->bindParam(':login', $login);
        $return_members->execute();
        $member_exist = $return_members->fetch(PDO::FETCH_ASSOC);

        if ($this->verify_passeword($pwd,$member_exist['mdp']) === false){
            return false;
        }

        return $member_exist ;
    }

    public function get_info_membre(int $id) : array
    {
        $return_request = $this->db->prepare("select * from my_meetic.utilisateur where id = :id");
        $return_request->bindParam(':id', $id);
        $return_request->execute();
        return $return_request->fetch(PDO::FETCH_ASSOC);
    }

    public function get_loisirs_membre(int $id) : array
    {

        $return_request = $this->db->prepare("select * from my_meetic.loisir
                                                inner join my_meetic.user_loisir on loisir.id = user_loisir.id_loisir
                                                where user_loisir.id_user = :id and user_loisir.actif = 1;");


        $return_request->bindParam(':id', $id);
        $return_request->execute();
        return $return_request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function check_user_dispo($login, $mail){

        $return_request = $this->db->prepare("select * from my_meetic.utilisateur where login = :login and 
                                                                                                    mail = :mail;");
        $return_request->bindParam(':login', $login);
        $return_request->bindParam(':mail', $mail);
        $return_request->execute();
        return $return_request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add_new_member($first_name, $name, $birthday, $mail, $login, $pwd, $city, $cp, $gender, $adress, $hobbies){

        $crypt_pwd = $this->protected_passeword($pwd);

        $return_request = $this->db->prepare("insert into my_meetic.utilisateur (prenom, nom, date_naissance, mail,login, mdp, ville, code_postal,sexe, adress)
                                    values (:first_name, :name, :birthday, :mail, :login, :crypt_pwd, :city, :cp, :gender, :adress);");

        $return_request->bindParam(':first_name', $first_name);
        $return_request->bindParam(':name', $name);
        $return_request->bindParam(':birthday', $birthday);
        $return_request->bindParam(':mail', $mail);
        $return_request->bindParam(':login', $login);
        $return_request->bindParam(':crypt_pwd', $crypt_pwd);
        $return_request->bindParam(':city', $city);
        $return_request->bindParam(':cp', $cp);
        $return_request->bindParam(':gender', $gender);
        $return_request->bindParam("adress", $adress);

        $return_request->execute();

        $last_user_id = $this->db->lastInsertId();
        $this->add_loisirsByMember($hobbies, $last_user_id);

        return $return_request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add_loisirsByMember(array $hobbies, int $last_user_id) :void
    {
        $delete_loisirs = $this->db->prepare("update my_meetic.user_loisir set actif = 0 where id_user = :last_user_id;");
        $delete_loisirs->bindParam(':last_user_id', $last_user_id);
        $delete_loisirs->execute();

        foreach ($hobbies as $value) {

            $loisir_is_exist = $this->db->prepare("select * from my_meetic.loisir where nom_loisir like binary :value;");
            $loisir_is_exist->bindParam(':value', $value);
            $loisir_is_exist->execute();
            $loisir = $loisir_is_exist->fetch(PDO::FETCH_ASSOC);

            if ($loisir === false) {
                $add_loisir = $this->db->prepare("insert into my_meetic.loisir (nom_loisir) values (:value);");
                $add_loisir->bindParam(':value', $value);
                $add_loisir->execute();
                $last_loisir_id = $this->db->lastInsertId();
            } else {
                $last_loisir_id = $loisir['id'];
            }

            $loisir_by_member = $this->db->prepare("insert into my_meetic.user_loisir (id_loisir,id_user, actif) 
                                                                    values (:last_loisir_id,:last_user_id, 1);");
            $loisir_by_member->bindParam(':last_loisir_id', $last_loisir_id);
            $loisir_by_member->bindParam(':last_user_id', $last_user_id);
            $loisir_by_member->execute();
        }
    }

    public function update_informations($id,$name,$first_name,$birthday,$mail,$pwd,$city,$cp,$gender,$adress,$hobbies){

        if (!empty($pwd)) {

            $crypt_pwd = $this->protected_passeword($pwd);

            $requette_sql_pwd = $this->db->prepare("update my_meetic.utilisateur set  mdp = :crypt_pwd where id = :id;");
            $requette_sql_pwd->bindParam(':crypt_pwd', $crypt_pwd);
            $requette_sql_pwd->bindParam(':id', $id);
            $requette_sql_pwd->execute();
        }

        $requette_sql_user = $this->db->prepare("update my_meetic.utilisateur set
                                 prenom = :first_name,
                                 nom = :name,
                                 date_naissance = :birthday,
                                 mail = :mail,
                                 ville = :city,
                                 code_postal = :cp,
                                 sexe = :gender,
                                 adress = :adress 
                            where id = :id;");

        $requette_sql_user->bindParam(':first_name', $first_name);
        $requette_sql_user->bindParam(':name', $name);
        $requette_sql_user->bindParam(':birthday', $birthday);
        $requette_sql_user->bindParam(':mail', $mail);
        $requette_sql_user->bindParam(':city', $city);
        $requette_sql_user->bindParam(':cp', $cp);
        $requette_sql_user->bindParam(':gender', $gender);
        $requette_sql_user->bindParam(':adress', $adress);
        $requette_sql_user->bindParam(':id', $id);
        $requette_sql_user->execute();

        $this->add_loisirsByMember($hobbies, $id);
    }

    public function delete_account($id){
        $sql_request = $this->db->prepare("UPDATE my_meetic.utilisateur SET actif = 0 WHERE id = :id limit 1;");
        $sql_request->bindParam(':id', $id);
        $sql_request->execute();
    }

    private function protected_passeword(string $pwd) {
        $cost = 12;
        $crypt_pwd = password_hash($pwd,PASSWORD_BCRYPT, ["cost" => $cost]) ;
        return $crypt_pwd;
    }

    private function verify_passeword(string $pwd, string $crypt_pwd) : bool{
        $verif_pwd = password_verify($pwd, $crypt_pwd) ;
        return $verif_pwd;
    }

}