<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Predis\Client;

try {

    $redis = new Client([
        'scheme' => 'tcp',
        'host'   => '127.0.0.1',
        'port'   => 6379,
    ]);

} catch (Exception $e) {

    die("Redis Connection Failed: " . $e->getMessage());

}