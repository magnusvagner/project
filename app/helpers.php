<?php
namespace App\controllers;
function components($name)
{
    global $container;
    return $container->get($name);
}

function config($arr)
{
    $el = $arr[1];
    $config = require '../app/config.php';
    return $config[1][$el];
}



?>