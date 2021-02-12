<?php


namespace App\controllers;


use App\models\Database;

use Delight\Auth\Auth;
use PDO;

class LogoutController
{

    private PDO $pdo;

    public function __construct(Database $database, PDO $pdo)
    {


        $this->pdo = $pdo;
    }
    public function logout(){
        $auth = new Auth($this->pdo);
        $auth->logOut();
        session_destroy();
        header("Location: /tasks");
    }
}