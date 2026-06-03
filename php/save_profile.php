<?php

header("Content-Type: application/json");

require_once "config/mongo.php";

$data = json_decode(file_get_contents("php://input"), true);

$userId = (int)$data["user_id"];
$age = (int)$data["age"];
$dob = trim($data["dob"]);
$contact = trim($data["contact"]);

try {

    $collection = $mongoDB->user_profiles;

    $collection->updateOne(
        ["user_id" => $userId],
        [
            '$set' => [
                "age" => $age,
                "dob" => $dob,
                "contact" => $contact
            ]
        ],
        ["upsert" => true]
    );

    echo json_encode([
        "success" => true,
        "message" => "Profile Saved Successfully"
    ]);

} catch (Exception $e) {

    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}
