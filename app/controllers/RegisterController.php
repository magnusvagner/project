<?php


namespace App\controllers;
use App\models\Database;
use App\models\Registration;
use League\Plates\Engine;

class RegisterController
{
    private Registration $registration;
    private Engine $view;
    private Database $database;

    public function __construct( Engine $view, Database $database, Registration $registration){

        $this->view = $view;

        $this->database = $database;

        $this->registration = $registration;
    }

    public function register(){
        echo $this->view->render("register", []);

    }

    public function reg(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        //var_dump($_POST); die();
        $error = [];
        $flag = true;
        if(strlen($password ) < 6){
            $error[] = "Короткий пароль";
            $flag = false;

        }
        if(empty($password) || empty($email)){
            $error[] = "Все поля обязательны к заполнению!";
            $flag = false;

        }
        $emailValidator = filter_var($email, FILTER_VALIDATE_EMAIL);

        if(!$emailValidator){
            $error[] = "Неверный формат email!!";
            $flag = false;
        }


     if($flag){
       $res = $this->registration->register($_POST['email'], $_POST['password']);
         //var_dump($res); die();
      if($res == "OK"){
          $message = "Вы успешно зарегистрированы. Вам на почту отправлена активация аккаунта";

          echo $this->view->render("message", ['message' => $message]);
      }else{
          $error[] = $res;
          echo $this->view->render("register", ['error' => $error]);

      }
     }else{

         echo $this->view->render("register", ['error' => $error]);
     }



    }



}