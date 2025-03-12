<?php
require_once("db.php");
$email = $_POST["email"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$password = $_POST["password"];
$repPassword = $_POST["repPassword"];
    $sql = "INSERT INTO users (email, fname, lname, password, role) VALUES ('$email','$fname','$lname','$password','user')";
    if($conn->query($sql)){
        $id = $conn->insert_id;
        session_start();
        $_SESSION['user_id'] = $id;
        setcookie("user_id", $id, time() + 3600, "/");
        setcookie("role", 'user', time() + 3600, "/");
        header("location:../public/html/profile.php");
    } else{
        echo "Ошибка";
    }
?>