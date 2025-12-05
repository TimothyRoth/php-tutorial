<?php

const ROOT_DIR = __DIR__;

require 'vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->get("/", function() {
    include_once("./view/home.php");
});

$router->run();


