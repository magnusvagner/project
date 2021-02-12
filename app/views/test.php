<table class="table table-stripped mt-3">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($tasks as $task): ?>
        <tr>
            <td><?php echo $task['id']; ?></td>
            <td> <?php echo $task['title']; ?> </td>
            <td>
                <a  href="/tasks/<?php  echo $task['id']; ?>" class="btn btn-success">Show</a>
                <?php  if($check): ?>
                    <a class="btn btn-info" href="/edit/<?php  echo $task['id']; ?>">Edit</a>
                    <a class="btn btn-danger"  href="/delete/<?php echo $task['id']; ?>">Delete</a>
                <?php endif; ?>
                <?php  if(!$check): ?>
                    <a href="login" class="btn btn-danger">Войдите для редактирования</a>

                <?php endif; ?>
            </td>
            <td><img src="<?php echo $task['file']; ?> " width='400'   alt="Photo"> </td>
        </tr>
    <?php endforeach; ?>

    <br>





    </tbody>
</table>