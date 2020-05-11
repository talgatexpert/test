<?php
session_start();
if (isset($_SESSION['user'])){
    $id = $_POST['user_id'];
    $name = $_POST['name'];
    $filename = $_FILES["avatar"]["name"];
    $temp = explode(".", $_FILES["avatar"]["name"]);
    $extension = end($temp);
    $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "");


    if (isset($id) && isset($_FILES['avatar'])) {

        if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {

            $image = md5($filenae . time()) . "." . $extension;
            move_uploaded_file($_FILES['avatar']['tmp_name'], "uploads/" . $image);
            $sql = "UPDATE users SET avatar=:avatar WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['avatar' => $image, 'id' => $id]);

        }




        $sql = "UPDATE users SET name=:name WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'id' => $id]);
        header("Location: /users.php");
        exit();

    }
}else {
    header("Location: /users.php");
}
