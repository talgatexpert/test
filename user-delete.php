<?php
session_start();

if (isset($_SESSION['user'])) {

    $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "");
    $query = "SELECT * FROM users WHERE id=:id";
    $statement = $pdo->prepare($query);
    $statement->execute(['id' => $_GET['id']]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (is_file('uploads/'.$user['avatar'])){
        unlink('uploads/'.$user['avatar']);
    }
    $sql = "DELETE FROM users WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $_GET['id']]);

    header("Location: /users.php" );

}