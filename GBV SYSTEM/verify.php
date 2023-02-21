<?php
include 'session.php';
$conn = $pdo->connect();

if (isset($_POST['submit'])) {
    $firstName    = $_POST['firstName'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM user WHERE firstName = :firstName");
        $stmt->execute(['firstName' => $firstName]);
        $row = $stmt->fetch();

        if ($row['numrows'] > 0) {
            if ($password === $row['password']) {
                if ($row['firstName'] == 'admin') {
                    $_SESSION['admin'] = $row['user_id'];
                }
                header('location: admin.php');
            } else {
                $_SESSION['error'] = 'Incorrect password';
                echo $_SESSION['error'];
            }
        } else {
            $_SESSION['error'] = 'Username not found';
            echo $_SESSION['error'];
        }
    } catch (PDOException $enter) {
        echo "Connection fail" . $enter->getMessage();
    }
    // header('location: admin.php');
}
