<?php $this->layout('layout') ?>



<div class="container mt-5">
    <ul class="<?php if(!empty($message)){ echo "alert alert-success";} ?>">
        <?php  if(!empty($message)): ?>

            <li>
                <span> <?php  echo $message;  ?> </span>
            </li>


        <?php  endif?>
        <?php  if(empty($message)): ?>

            <li class="alert alert-danger">
                <span> Во время регистрации произошла ошибка. Попробуйте снова, через некоторое время!  ?> </span>
            </li>


        <?php  endif?>
    </ul>
    <a href="/tasks" class="btn btn-primary">На главную</a>
</div>
