<html>
<head>
    <title>My blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
  <body>

    <div class="container mt-3 mb-3 pb-3 pt-5">
        <div class="row fixed-top bg-warning border  text-black ">
            <div class="container">
                 <div class="row d-flex justify-content-between">

                      <ul class="nav mb-3 mt-3  " >
                         <li class="nav-item fs-2">
                             <a class="nav-link active mr-4 fw-bold" aria-current="page" href="/tasks"><p class=" text-uppercase font-weight-bold text-dark">Главная</p></a>
                        </li>
                      </ul>
                      <ul class="nav mb-3 mt-3" >
                          <?php  if(isset($_SESSION['email'])):  ?>
                              <li class="nav-item">
                                   <a  class="btn btn-success  nav-link mr-4" href="/create">Добавить дело</a>
                              </li>
                          <?php endif;  ?>
                      </ul>
                      <ul class="nav   mb-3 mt-3" >
                          <?php  if(isset($_SESSION['email'])):  ?>
                              <li class="nav-item">
                                  <span class="mr-2 nav-link">Ваш mail : <b class="mr-4">  <?php  echo $_SESSION['email'];  ?> </b></span>
                              </li>
                              <li class="nav-item">
                                  <a href="/logout" class="mr-4 nav-link text-dark"><p class="fs-2 font-weight-bold ">Выйти</p></a>
                              </li>
                          <?php endif;  ?>
                          <?php
                          if(empty($_SESSION['email'])):  ?>
                              <li class="nav-item">
                                  <a class="nav-link text-dark font-weight-bold" href="/register">Регистрация</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link text-dark font-weight-bold" href="/login">Логин</a>
                              </li>
                          <?php endif;  ?>
                      </ul>
                 </div>
             </div>
        </div>

      <?=$this->section('content')?>

    </div>
  </body>
</html>

<?php

