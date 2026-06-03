<?php

header("Content-Type: application/json");

require_once "config/mysql.php";



if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode([
        "success" => false,
        "message" => "Invalid request method"
    ]);
    exit;
}

$fullName = trim($_POST["full_name"] ?? "");
$email = trim($_POST["email"] ?? "");
$password = trim($_POST["password"] ?? "");

if (
    empty($fullName) ||
    empty($email) ||
    empty($password)
) {
    echo json_encode([
        "success" => false,
        "message" => "All fields are required"
    ]);
    exit;
}

try {

    $checkUser = $pdo->prepare(
        "SELECT id FROM users WHERE email = ?"
    );

    $checkUser->execute([$email]);

    if ($checkUser->rowCount() > 0) {

        echo json_encode([
            "success" => false,
            "message" => "Email already exists"
        ]);

        exit;
    }

    $passwordHash = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    $insertUser = $pdo->prepare(
        "INSERT INTO users(full_name,email,password_hash)
         VALUES(?,?,?)"
    );

    $insertUser->execute([
        $fullName,
        $email,
        $passwordHash
    ]);

    echo json_encode([
        "success" => true,
        "message" => "Registration successful"
    ]);

} catch (Exception $e) {

    echo json_encode([
        "success" => false,
        "message" => "Registration failed",
        "error" => $e->getMessage()
    ]);

}
