<?php


namespace App\Command;
use PDO;

class LoisirCommand extends BaseCommand
{

    public function get_loisirs(){
        $return_loisirs = "select * from my_meetic.loisir;";
        return $this->db->query($return_loisirs,PDO::FETCH_ASSOC)->fetchAll();
    }


}