<?php


namespace App\models;


use Delight\Auth\Auth;
use PDO;

class Verification
{
    private PDO $pdo;

  public function  __construct(PDO $pdo ){
      $this->pdo = $pdo;
  }

  public function  verify(){

      $auth = new Auth($this->pdo);
      try {
          $auth->confirmEmail($_GET['selector'], $_GET['token']);

          return "Email был успешно верифицирован. Пожалуйста залогиньтесь!";


      }
      catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
          return 'Invalid token';
      }
      catch (\Delight\Auth\TokenExpiredException $e) {
          return 'Срок Токена истёк';
      }
      catch (\Delight\Auth\UserAlreadyExistsException $e) {
          return 'Email адрес уже существует';
      }
      catch (\Delight\Auth\TooManyRequestsException $e) {
          return 'Ошибка! Повторите через пять минут';
      }
  }


}