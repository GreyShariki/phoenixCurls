<?php
$username = "root";
$password = "";
$db_name = "phoenix_curls";
$host = "localhost";
$conn = new mysqli($host, $username, $password, $db_name);
if (!$conn){
    die("Ошибка: ". $conn->connect_error);
};
?>