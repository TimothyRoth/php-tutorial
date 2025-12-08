<?php

const ROOT_DIR = __DIR__;
require 'vendor/autoload.php';

$router = new \Bramus\Router\Router();

function authenticate() {
    $headers = getallheaders();
    $apiKey = $headers['X-Api-Key'] ?? $_GET['api_key'] ?? '';
    
    $db = json_decode(file_get_contents(ROOT_DIR . "/db.json"), true);
    if (!$db || !in_array($apiKey, $db['api_keys'] ?? [], true)) {
        http_response_code(401);
        echo json_encode(["error" => "Unauthorized"]);
        exit();
    }
}
$router->before('GET|POST|OPTIONS', '/api/v1/.*', function() {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: X-API-Key, Content-Type');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }

    authenticate();
});

$router->get('/api/v1/customers/get', function() {
    $db = json_decode(file_get_contents(ROOT_DIR . "/db.json"), true);
    echo json_encode($db['customers'] ?? []);
});

$router->get('/', function() {
    echo "<h1>My First API</h1>
          <p>Try: <a href='/api/v1/customers/get?api_key=demo123'>/api/v1/customers/get?api_key=demo123</a></p>";
});

$router->run();