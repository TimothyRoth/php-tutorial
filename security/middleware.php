<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-API-KEY, Content-Type');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

authenticate();

function authenticate() {
    $headers = getallheaders();
    $apiKey = $headers['X-API-KEY'] ?? $_GET['X-API-KEY'];
    $db = json_decode(file_get_contents(ROOT_DIR . "/db.json"), true);

    if($db === null || !in_array($apiKey, $db['api_keys'])) {
        http_response_code(401);
        echo json_encode(["error" => "Unauthorized"]);
        exit;
    }
}

