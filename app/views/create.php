<?php $this->layout('layout') ?>

<div class="container">
        <h1 class="h1 mt-5">Create Task</h1>
        <form action="/add"  method="post" class="form"  enctype="multipart/form-data" >
            <div class="form-group">
                <input type="text" class="form-control" name="title">
                <input type="file" class="form-control" name="img">
                <textarea class="form-control mt-3" name="content" id="" ></textarea>
            </div>
            <button class="btn btn-success" type="submit">Submit</button> <a class="btn btn-warning" href="/tasks">Back</a>
        </form>
</div>