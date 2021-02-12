<?php


namespace App\models;

use Delight\Auth\Auth;
use League\Plates\Engine;
use PDO;

class Login
{
    private Engine $view;
    private Database $database;
    private Registration $registration;
    private PDO $pdo;

    public function __construct(Engine $view, Database $database, Registration $registration, PDO $pdo){

        $this->view = $view;
        $this->database = $database;
        $this->registration = $registration;
        $this->pdo = $pdo;
    }
 public function login(){
     $auth = new Auth($this->pdo);
     try {
         $auth->login($_POST['email'], $_POST['password']);
         $id = $auth->getUserId();
         session_start();
         $_SESSION['email'] = $_POST['email'];
         $_SESSION['id'] = $id;
         return "OK";

     }
     catch (\Delight\Auth\InvalidEmailException $e) {
        return 'Wrong email address';
     }
     catch (\Delight\Auth\InvalidPasswordException $e) {
        return 'Wrong password';
     }
     catch (\Delight\Auth\EmailNotVerifiedException $e) {
        return 'Email not verified';
     }
     catch (\Delight\Auth\TooManyRequestsException $e) {
         return 'Too many requests';
     }
 }

}