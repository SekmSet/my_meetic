<?php

namespace App\Command;
use PDO;

class SearchCommand extends BaseCommand
{
    public function recherche_membre($ville,$cp,$loisir,$gender,$age_min,$age_max){

        $array_filter = [];
        $array_execute = [];

        if(!empty($cp)){
            $array_filter[]= "ville like binary :ville";
            $array_execute[':ville'] = $ville;
        }
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

        $filters = implode(' and ', $array_filter);
        $members = $this->db->prepare("select * from my_meetic.utilisateur where $filters;");
        $members->execute($array_execute);

        return $members->fetchAll(PDO::FETCH_ASSOC);
    }
}