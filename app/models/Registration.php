<?php
namespace App\models;

 use Delight\Auth\Auth;
 use PDO;


 class Registration
{

    private Auth $auth;
    private Database $database;
     private PDO $pdo;
     private Notifications $notifications;

     public function __construct( Database $database, PDO $pdo, Notifications $notifications)
    {
        $this->database = $database;
        $this->pdo = $pdo;
        $this->notifications = $notifications;
    }

    public function register($email, $password)
    {
        $auth = new Auth($this->pdo);

        try {
            $userId = $auth->register($email, $password, null, function ($selector, $token) use ($email) {
               $this->notifications->confirm($email, $selector, $token);
            });

            return "OK";
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
          return 'Invalid email address';
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            return 'Invalid password';
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
           return 'User already exists';
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {


            return 'Too many requests';
        }
    }
}