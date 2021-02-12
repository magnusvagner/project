<?php

namespace  App\controllers;

use  App\models\Registration;
use App\models\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use League\Plates\Engine;
use App\models\Database;
use Delight\Auth\Auth;
use PDO;

class HomeController
 {
    private Registration $registration;
    private Engine $view;
    private Database $database;
    private PDO $pdo;

    private ImageManager $image;

    public function __construct( Engine $view, Database $database, Registration $registration, PDO $pdo, ImageManager $image){

        $this->view = $view;

        $this->database = $database;

        $this->registration = $registration;
        $this->pdo = $pdo;
        $this->image = $image;
    }

        public function index()
        {
            $auth = new Auth($this->pdo);
            $state = "";
            $page = 1;
            $mail = $auth->getEmail();

           $userId = $auth->getUserId();


            if ($auth->isLoggedIn()) {
                $state = 'User is signed in';
            }
            else {
                $state = 'User is not signed in yet';
            }

            if (isset($_GET['page'])){
                $page = $_GET['page'];
            }else {
                $page = 1;
            }



            $limit = 6;
            $offset = ($page * $limit) - $limit;


            $tasksAll = $this->database->all("tasks", null, null);

            $total = count($tasksAll);

            $tasks = $this->database->all("tasks", $limit, $offset);
            $amountPage = ceil($total / $limit);
            $check = $auth->check();
            echo $this->view->render('tasks', ['tasks' => $tasks, 'state' => $state,
                'userId' => $userId, "mail" => $mail, 'amountPage' => $amountPage, 'res' => $res, 'check'=> $check]);
        }
        public function create(){
            echo $this->view->render('create', []);
        }
        public function add(){
        $data = $_FILES;
          $path = $this->image->upload($data);
    // var_dump($path); die();
            $this->database->add("tasks", $_POST, $path);

            header("Location: /tasks");
        }
        public function show($id){
            $task = $this->database->show("tasks", $id);
            echo $this->view->render('show', ['task' =>  $task]);
        }
        public function edit($id){
            $auth = new Auth($this->pdo);
            if($auth->check()){
                $task = $this->database->edit("tasks", $id);
                echo $this->view->render('edit', ['task' =>  $task]);
            }else{
                header("Location: /login");
            }

        }
        public function update($id)
        {
            $data = $_FILES;
            $path = $this->image->upload($data);

            $this->database->update($id, $_POST, $path);
            header("Location: /tasks");
        }
        public  function delete($id){
            $this->database->delete("tasks", $id);
            header("Location: /tasks");
        }

    }


