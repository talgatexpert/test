<?php
session_start();
$login = $_POST['login'];
$password = $_POST['password'];
if (isset($login) && isset($password) && preg_match("/^[^@]+@[^@]+\.[a-z]{2,6}$/i",$login)){


    $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "");
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $login]);
    if ($stmt->rowCount() > 0) {
        $_SESSION['email_exist'] = "Такой email уже занят";
        header("Location: /");
        exit();
    }
    unset( $_SESSION['email_exist']);
    $sql = "INSERT INTO users (email, password, date, avatar) VALUES (:email, :password, :date, :avatar)";
    $statement = $pdo->prepare($sql);
    $statement->execute(["email" => $login, "password" => password_hash($password, PASSWORD_BCRYPT ), "avatar"=>"none.png","date" => date("d/m/Y")]);
    header("Location: /");
}else{
    unset( $_SESSION['email_exist']);
    $_SESSION['message'] = "Заполните поле";
    header("Location: /");
    exit();
}

