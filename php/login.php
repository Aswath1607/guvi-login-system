<?php

header("Content-Type: application/json");
session_start();

require_once "config/mysql.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    echo json_encode([
        "success" => false,
        "message" => "Invalid request"
    ]);

    exit;
}

$email = trim($_POST["email"] ?? "");
$password = trim($_POST["password"] ?? "");

if (empty($email) || empty($password)) {

    echo json_encode([
        "success" => false,
        "message" => "All fields are required"
    ]);

    exit;
}

try {

    $stmt = $pdo->prepare(
        "SELECT * FROM users WHERE email = ?"
    );

    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {

        echo json_encode([
            "success" => false,
            "message" => "User not found"
        ]);

        exit;
    }

    if (!password_verify(
        $password,
        $user["password_hash"]
    )) {

        echo json_encode([
            "success" => false,
            "message" => "Invalid password"
        ]);

        exit;
    }

    

    session_start();

$_SESSION["user_id"] = $user["id"];
$_SESSION["name"] = $user["full_name"];

echo json_encode([
    "success" => true,
    "message" => "Login successful",
    "user_id" => $user["id"],
    "name" => $user["full_name"]
]);

}catch (Exception $e) {

    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}