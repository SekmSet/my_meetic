<?php


namespace App\Command;


use App\Tools\Database;
use PDO;

class BaseCommand
{
    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect_to_sql();
    }
}