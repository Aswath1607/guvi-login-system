<?php

$host = "localhost";
$dbname = "guvi_auth";
$username = "root";
$password = "";
$port = 3306;

try {

    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {
    die(
        json_encode([
            "success" => false,
            "message" => "Database connection failed"
        ])
    );
}