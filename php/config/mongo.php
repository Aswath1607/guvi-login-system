<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use MongoDB\Client;

try {

    $client = new Client("mongodb://localhost:27017");

    $mongoDB = $client->guvi_auth;

} catch (Exception $e) {

    die("MongoDB Connection Failed: " . $e->getMessage());

}
