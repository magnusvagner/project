<?php $this->layout('layout') ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<style>
    .mySize{
        display: block;
        width: 60%;
        height: auto;
        margin: 0 auto;
        margin-top: 60px;
    }
    .myImg2{
        display:block;
        overflow: hidden;

        max-height: 55vh;
    }
</style>
    <div class="container">
    <div class="card mySize" >
        <img src="../<?php echo $task['file']; ?>" class="card-img-top myImg2" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $task['title'];  ?></h5>
            <p class="card-text"> <?php    echo $task['content'];  ?>  </p>
            <a href="/tasks" class="btn btn-primary">Back</a>
        </div>
    </div>
    </div>

</body>
</html>