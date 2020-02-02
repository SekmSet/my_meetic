<?php

namespace App\Controller;


use App\Command\SearchCommand;

class Search extends BaseController
{

    function search_membre(){

        $villes = $_GET['city']??null;
        $cp = $_GET['cp']??null;
        $loisirs = $_GET['loisir']??[];
        $gender = $_GET['user_gender']??null;

        $age_min = $_GET['age_min']??18;
        $age_max = $_GET['age_max']??70;

        $errors=[];
        $results_all=[];

        $recherche = new SearchCommand();

        if(!empty($villes) || !empty($cp) || !empty($loisirs) || !empty($gender) || !empty($age_min) || !empty($age_max)){
            $results_all = $recherche->recherche_membre($villes,$cp,$loisirs,$gender,$age_min,$age_max);

            if (empty($results_all)){
                $errors[] = 'Malheureusement, aucun membre correspond à vos critères :\'(' ;
            }
        }

        $this->return_pages('search/search_member',[
            'errors' => $errors,
            'results' => $results_all,
            'city' => $villes,
            'cp' => $cp,
            'loisirs' => $loisirs,
            'gender' => $gender,
            'age_min' => $age_min,
            'age_max' => $age_max
        ]);
    }
}