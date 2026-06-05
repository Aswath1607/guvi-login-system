<?php

try {
    $pdo = new PDO(
        "mysql:host=sql.freedb.tech;dbname=freedb_E81hUeLX;charset=utf8mb4",
        "u_00X2Pq",
        "nf6gMLGUK4d1"
    );

    echo "Connected";
} catch (PDOException $e) {
    echo $e->getMessage();
}
