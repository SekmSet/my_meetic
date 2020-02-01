<?php

namespace App\Command;
use PDO;

class SearchCommand extends BaseCommand
{
    public function recherche_membre($array_ville,$loisirs,$cp,$gender,$age_min,$age_max){

        $array_filter = [];
        $array_execute = [];


        if(!empty($array_ville)){
            foreach ($array_ville as $key => $value){
                $array_filter[]= "ville = :value";
                $array_execute[':value'] = $value;
            }
        }

        if(!empty($loisirs)){
            foreach ($loisirs as $key => $value){
                $array_filter[]= "ville = :value";
                $array_execute[':value'] = $value;
            }
        }

        var_dump($loisirs);
        var_dump($array_ville);
        if(!empty($cp)){
            $array_filter[]= "code_postal = :cp";
            $array_execute[':cp'] = $cp;
        }
        if(!empty($gender)){
            $array_filter[]= "sexe = :gender" ;
            $array_execute[':gender'] = $gender;
        }

        if(!empty($age_min) && !empty($age_max)){
            $array_filter[]= "(year(now())-year(date_naissance)) between :age_min and :age_max " ;
            $array_execute[':age_min'] = $age_min;
            $array_execute[':age_max'] = $age_max;
        }

        $filters = implode(' or ', $array_filter);

//        var_dump($filters);
        $members = $this->db->prepare("select * from my_meetic.utilisateur where $filters;");
//        $members->bindParam(':value', $value);
        $members->execute($array_execute);

        return $members->fetchAll(PDO::FETCH_ASSOC);
    }

    public function search_member_by_cities($villes){
        echo 'bla bla bla';
    }

//    public function get_all_members(){
//        $all_member = 'select * from my_meetic.utilisateur;';
//        return $this->db->query($all_member,PDO::FETCH_ASSOC)->fetchAll();
//    }
}