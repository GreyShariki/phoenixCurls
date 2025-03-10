<?php
require_once("db.php");
$email = $_POST["email"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$password = $_POST["password"];
$repPassword = $_POST["repPassword"];

if($repPassword === $password && !isset($_POST)){
    $sql = "INSERT INTO users (email, fname, lname, password, role) VALUES ('$email','$fname','$lname','$password','user')";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка";
    }
};
?>