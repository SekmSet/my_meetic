<?php


namespace App\Controller;

use App\Tools\Database;
use PDO;

class BaseController
{
    protected PDO $db;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect_to_sql();
    }

    /**
     * Charge un fichier html
     * @param $page : chemin vers la page
     * @param $vars : contient les données de la page (nom d'utilisateur, liste d'utilisateur, les loisirs, l'age, ...)
     */
    function return_pages($page, array $vars = []){
        require '../template/parts/header.php';
        require '../template/pages/'. $page . '.php';
        require '../template/parts/footer.php';
    }
}