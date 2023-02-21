<?php

include 'DB.php';
session_start();

if (isset($_SESSION['admin'])) {
    $conn = $pdo->connect();

    try {
        $stmt = $conn->prepare("SELECT * FROM user WHERE user_id = :id");
        $stmt->execute(['id' => $_SESSION['admin']]);
        $user = $stmt->fetch();
    } catch (PDOException $enter) {
        echo "Connection fail " . $enter->getMessage();
    }
}