<?php

header("Content-Type: application/json");

require_once "config/redis.php";

$data = json_decode(
    file_get_contents("php://input"),
    true
);

$token = $data["token"] ?? "";

$redis->del("session:" . $token);

echo json_encode([
    "success" => true
]);