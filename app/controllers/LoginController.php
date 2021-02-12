<?php


namespace App\controllers;

use App\models\Login;
use Delight\Auth\Auth;
use App\models\Database;
use App\models\Registration;
use League\Plates\Engine;
use PDO;

class LoginController
{


    private Engine $view;

    private Database $database;

    private Registration $registration;
    private PDO $pdo;

    private Login $login;

    public function __construct(Engine $view, Database $database, Registration $registration, PDO $pdo, Login $login)
    {
        $this->view = $view;
        $this->database = $database;
        $this->registration = $registration;
        $this->pdo = $pdo;
        $this->login = $login;
    }

    public function login(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $flag = true;
        $error = [];
        if(empty($password) || empty($email)){
            $error[] = "Все поля обязательны к заполнению!";
            $flag = false;

        }else{
            $flag = true;
        }


        if($flag) {
          $res =  $this->login->login();
          if($res == "OK"){
              header("Location: /tasks");
          }
          if($res != "OK"){
              $error[] = $res;
              echo $this->view->render("login", ['error'=> $error]);
          }

        }else{
            echo $this->view->render("login", ['error'=> $error]);
        }


    }
    public function showLogin(){
        echo $this->view->render("login", []);
    }
}