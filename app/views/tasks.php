<?php $this->layout('layout', ['state'=> $state, 'userId' => $userId, 'mail' => $mail]) ?>


<div class="container">
<style>
    .act{
        color: red;
        font-size: 16px;
    }
    .refer:hover{
        text-decoration: none;
    }
    .flex1{
        display: flex;
        justify-content: space-between;
    }
    .border1{
        border: 2px solid red;
    }
    .myStyle{
       width: 32%;
    }
    .myImg{
        display: block;
        width: 100%;
        height: auto;
        max-height: 200px;
        overflow: hidden;
        border: 1px solid red;


    }
    .myLink{
        color: black;
        display: block;
       // margin-bottom: 50px;
    }
    .myLink:hover{

        text-decoration: none;

    }
    

</style>
    <div class="row ">
        <div class="col-md-12  mt-5 ">
            <h1 class="h1 mt-5 mb-5">All  Tasks!</h1>
            <nav aria-label="Page navigation example text-dark">
                <ul class="pagination ">
                    <?php
                    $iCurr = (empty($_GET['page']) ? 1 : intval($_GET['page']));
                    $previous = $iCurr -1 ;
                    echo "<li class='page-item ".( $previous  == 0 ? ' disabled' : '')."'><a href=tasks?page=".$previous ."     class='page-link ' > Previous </a> </li>";
                    ?>
                    <?php  for ($i = 1; $i <= $amountPage; $i++){
                        $iCurr = (empty($_GET['page']) ? 1 : intval($_GET['page']));

                        echo "<a href=tasks?page=".$i." class='page-link disabled ".($i == $iCurr ? ' act' : '')."' >  ".$i." </a>";
                    }          ?>

                    <?php
                    $iCurr = (empty($_GET['page']) ? 1 : intval($_GET['page']));
                    $next = $iCurr + 1 ;
                    echo "<li class='page-item ".( $iCurr  == $amountPage ? ' disabled' : '')."'><a href=tasks?page=".$next ."     class='page-link' > Next </a> </li>";
                    ?>
                </ul>
            </nav>
           <div class="row flex1">

                   <?php foreach($tasks as $task): ?>
                       <div class="card myStyle  mt-2 mb-3 "  >

                           <a href="/tasks/<?php  echo $task['id']; ?>" class="myLink"><img src="<?php echo $task['file']; ?> " width="100%"   alt="Photo"  class="card-img-top myImg"></a>
                           <div class="card-body">
                               <h5 class="card-title"><?php echo $task['title']; ?></h5>
                               <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                               <a  href="/tasks/<?php  echo $task['id']; ?>" class="btn btn-success">Show</a>
                               <?php  if($check): ?>
                                   <a class="btn btn-info" href="/edit/<?php  echo $task['id']; ?>">Edit</a>
                                   <a class="btn btn-danger"  href="/delete/<?php echo $task['id']; ?>">Delete</a>
                               <?php endif; ?>
                               <?php  if(!$check): ?>
                                   <a href="login" class="btn btn-danger">Войдите для редактирования</a>

                               <?php endif; ?>

                           </div>
                       </div>
                   <?php endforeach; ?>



           </div>

        </div>

    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            $iCurr = (empty($_GET['page']) ? 1 : intval($_GET['page']));
            $previous = $iCurr -1 ;
            echo "<li class='page-item ".( $previous  == 0 ? ' disabled' : '')."'><a href=tasks?page=".$previous ."     class='page-link' > Previous </a> </li>";
            ?>
            <?php  for ($i = 1; $i <= $amountPage; $i++){
                $iCurr = (empty($_GET['page']) ? 1 : intval($_GET['page']));

                echo "<a href=tasks?page=".$i." class='page-link disabled".($i == $iCurr ? ' act' : '')."' >  ".$i." </a>";
            }          ?>

            <?php
            $iCurr = (empty($_GET['page']) ? 1 : intval($_GET['page']));
            $next = $iCurr + 1 ;
            echo "<li class='page-item ".( $iCurr  == $amountPage ? ' disabled' : '')."'><a href=tasks?page=".$next ."     class='page-link' > Next </a> </li>";
            ?>
        </ul>
    </nav>
</div>




