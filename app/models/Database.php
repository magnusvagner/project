<?php
namespace App\models;

use PDO;
use Aura\SqlQuery\QueryFactory;

class Database
{

    private PDO $pdo;
    private QueryFactory $queryFactory;

    public function __construct(QueryFactory $queryFactory, PDO $pdo){

        $this->pdo = $pdo;
        $this->queryFactory = $queryFactory;
    }

    public function all($table, $limit, $offset){

        $select = $this->queryFactory->newSelect();

        $select->cols(['*'])->from('tasks')->limit($limit)->offset($offset);

        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        return  $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($table, $data, $path){

        $insert = $this->queryFactory->newInsert();

        $insert
            ->into($table)
            ->cols([
                'title',
                'content',
                'file'
            ])
            ->bindValues([
                'title' => $data['title'],
                'content' => $data['content'],
                'file' => $path
            ]);
        $sth = $this->pdo->prepare($insert->getStatement());

        $sth->execute($insert->getBindValues());
    }

    public function show($table, $id){

        $select = $this->queryFactory->newSelect();

        $select->cols(['*'])->from($table)->where('id=:id')->bindValues(['id'=> $id]);

        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function edit($table, $id){
        $select = $this->queryFactory->newSelect();

        $select->cols(['*'])->from($table)->where('id=:id')->bindValues(['id'=> $id]);

        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public  function update($id, $data, $path){
        $update = $this->queryFactory->newUpdate();
       // echo $path; die();
       if($path != "uploads/photo.jpg"){

           $update
               ->table('tasks')                  // update this table
               ->cols([
                   'id',
                   'title',
                   'content',
                   'file'
               ])
               ->where('id=:id')
               ->bindValues([                  // bind these values to the query
                   'id' => $id,
                   'title' => $data['title'],
                   'content' => $data['content'],
                   'file' => $path

               ]);
       }else{
           $update
               ->table('tasks')                  // update this table
               ->cols([
                   'id',
                   'title',
                   'content',

               ])
               ->where('id=:id')
               ->bindValues([                  // bind these values to the query
                   'id' => $id,
                   'title' => $data['title'],
                   'content' => $data['content']

               ]);
       }


        $sth = $this->pdo->prepare($update->getStatement());

        // execute with bound values
        $sth->execute($update->getBindValues());
    }

    public function delete($table, $id){
        $delete = $this->queryFactory->newDelete();

        $delete->from($table)->where('id=:id')->bindValues(['id'=> $id]);

        $sth = $this->pdo->prepare($delete->getStatement());

        $sth->execute($delete->getBindValues());
    }
}