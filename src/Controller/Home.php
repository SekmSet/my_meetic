<?php

namespace App\Controller;

use PDO;

class Home extends BaseController
{
    public function index() {
        // code php tres compliqué
        $user_name = 'priscilla';

        $membres = $this->db->query('SELECT * FROM utilisateur', PDO::FETCH_ASSOC);

        // appeler la template
        $this->return_pages('home/home', [
            'user_name' => $user_name,
            'membres' => $membres->fetchAll()
        ]);
    }
}