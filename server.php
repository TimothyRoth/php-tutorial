<?php

const ROOT_DIR = __DIR__;

require 'vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->before('GET|POST|OPTIONS', 'api/.*', function() {
    include_once(ROOT_DIR . "/security/middleware.php");
});


$router->get("/", function() {
   include_once("./view/home.php");
});

$router->get("/api/v1/basic", function() {
    echo json_encode([
        "message" => "hello world"
    ]);
});

$router->get("/api/v1/customers/get", function() {
    $file_content = file_get_contents(ROOT_DIR . "/db.json");
    $db = json_decode($file_content, true);
    echo json_encode($db['customers']);
});

$router->get("/api/v1/customers/delete", function() {
    echo json_encode(["message" => "customer deleted"]);
});

$router->run();