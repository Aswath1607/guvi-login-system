<?php

header("Content-Type: application/json");

require_once "config/mongo.php";

$userId = isset($_GET["user_id"])
    ? (int)$_GET["user_id"]
    : 0;

try {

    $collection = $mongoDB->user_profiles;

    $profile = $collection->findOne([
        "user_id" => $userId
    ]);

    if ($profile) {

        echo json_encode([
            "success" => true,
            "age" => $profile["age"] ?? "",
            "dob" => $profile["dob"] ?? "",
            "contact" => $profile["contact"] ?? ""
        ]);

    } else {

        echo json_encode([
            "success" => false
        ]);
    }

} catch (Exception $e) {

    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}