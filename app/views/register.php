<?php $this->layout('layout') ?>

<div class="container pt-4">
    <h1 class="h1 mt-5">Register</h1>
    <form action="/reg"  method="post" class="form">
        <div class="form-group">
            <ul class="<?php if(!empty($error)){ echo "alert alert-danger";} ?>">
            <?php  if($error):
            foreach($error as $err): ?>
                <li>
                    <span> <?php  echo $err;  ?> </span>
                </li>
            <?php endForeach; endif?>
            </ul>
            <ul class="<?php if(!empty($message)){ echo "alert alert-success";} ?>">
                <?php  if(!empty($message)): ?>

                        <li>
                            <span> <?php  echo $message;  ?> </span>
                        </li>


                    <?php  endif?>
            </ul>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="mail" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password"  class="form-control" name="password" id="pass">
            </div>
        </div>
        <button class="btn btn-success" type="submit">Register</button>
        <a class="btn btn-warning" href="/tasks">Back</a>
        <a class="btn btn-info" href="/login">Login</a>
    </form>
</div>

