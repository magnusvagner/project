<?php $this->layout('layout') ?>

<div class="container pt-4">
    <h1 class="h1 mt-5">Login</h1>
    <ul class="<?php if(!empty($error)){ echo "alert alert-danger";} ?>">
        <?php  if($error):
            foreach($error as $err): ?>
                <li>
                    <span> <?php  echo $err;  ?> </span>
                </li>


            <?php endForeach; endif?>
    </ul>
    <form action="/log"  method="post" class="form">
        <div class="form-group">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="mail" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password"  class="form-control" name="password" id="pass">
            </div>
        </div>
        <button class="btn btn-success" type="submit">Login</button>
        <a class="btn btn-warning" href="/tasks">Back</a>
        <a class="btn btn-info" href="/register">Register</a>
    </form>
</div>
