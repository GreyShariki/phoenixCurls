<?php
require_once("db.php");
$number = $_POST["number"];
$specialist = $_POST["specialist"];
$service = $_POST["service"];
$date = $_POST["date"];
$time = $_POST["time"];
$price = $_POST['price'];
$user_id = $_COOKIE['user_id'];
$sql = "INSERT INTO applications (date, time, status, specialist, number, type_of_service, price, user_id) 
        VALUES ('$date', '$time', 'На рассмотрении', '$specialist', '$number', '$service', $price, $user_id)";
if ($conn->query($sql)){
        echo "Запись создана";
} else{
        echo 'Error';
};
?>