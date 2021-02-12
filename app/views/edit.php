<?php
$this->layout('layout');

?>



<div class="container">
    <h1 class="h1 mt-5">Edit Task</h1>
    <form action="/update/<?php echo $task['id']; ?>"  method="post" class="form" enctype="multipart/form-data" >
        <div class="form-group">
            <input type="text" class="form-control" name="title" value="<?php echo $task['title']; ?>">
            <input type="file" class="form-control" name="img">
            <textarea class="form-control mt-3" name="content" id="" > <?php echo $task['content'];  ?></textarea>
        </div>
        <button class="btn btn-success" type="submit">Resave</button>
        <a class="btn btn-warning" href="/tasks">Back</a>
    </form>

</div>
