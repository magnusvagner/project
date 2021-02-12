<?php


namespace App\controllers;


use App\models\Database;
use App\models\Registration;
use App\models\Verification;
use League\Plates\Engine;
use PDO;


class VerifyController
{

    private Registration $registration;
    private Engine $view;
    private Database $database;
    private PDO $pdo;
    private Verification $verify;


    public function __construct( Engine $view, Database $database, Registration $registration, PDO $pdo, Verification $verify){

        $this->view = $view;
        $this->database = $database;
        $this->registration = $registration;
        $this->pdo = $pdo;
        $this->verify = $verify;
    }



    public function verify(){

        $message = $this->verify->verify();
        if($message == 'Email был успешно верифицирован. Пожалуйста залогиньтесь!') {
            echo $this->view->render("verify", ["message" => $message]);
        }else{
            $error = $message;
            echo $this->view->render("verify", ["error" => $error]);
        }

    }

}

