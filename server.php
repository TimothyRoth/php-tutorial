<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Api-Token");

$apiToken = "123"; // normalerweise in einer DB stehen gamapped auf einen Client
$headers = getallheaders(); // $_SERVER["X-Api-Token"];

if(!isset($headers["X-Api-Token"])) {
    echo "Gib mir einen Token du Wurst";
    exit;
}

if($headers["X-Api-Token"] !== $apiToken) {
    echo "falscher Token du Nudel";
    exit;
}

echo "Hello World!!!!";