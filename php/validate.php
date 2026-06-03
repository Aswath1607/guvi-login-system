<?php

header("Content-Type: application/json");

require_once "config/redis.php";

$token = $_GET["token"] ?? "";

$userId = $redis->get(
    "session:" . $token
);

if ($userId) {

    echo json_encode([
        "success" => true,
        "user_id" => $userId
    ]);

} else {

    echo json_encode([
        "success" => false
    ]);
}