<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use MongoDB\Client;

try {

    $client = new MongoDB\Client(
    "mongodb+srv://aswaths1607_db_user:Aswath@cluster0.wsl7ttm.mongodb.net/?retryWrites=true&w=majority"
);

    $mongoDB = $client->guvi_auth;

} catch (Exception $e) {

    die("MongoDB Connection Failed: " . $e->getMessage());

}
