<?php
session_start();
$login = $_POST['email'];
$password = $_POST['password'];
$remember = $_POST['remember-me'];

//var_dump($_POST);
if (isset($login) && isset($password)){
    $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "");
    $sql = "SELECT * FROM users WHERE email=:email LIMIT 1";
    $statement = $pdo->prepare($sql);
    $statement->execute(["email" =>$login]);
      $user=$statement->fetch(PDO::FETCH_ASSOC);


    if (password_verify($password, $user['password'])){

        $_SESSION['user'] = $user;
        if (isset($remember)){


            $name = base64_encode($login);
            $pass = base64_encode($password);

            $expire_time = time()+ 60 *60 *24*30*12;
            setcookie("remember_name", $name, $expire_time);
            setcookie("remember_pass", $pass, $expire_time);

        }
        header("Location: personal_account.php");
    }

}