<?php
require_once('db.php');
$email = $_POST['email'];
$password = $_POST["password"];
$sql = "SELECT * from users where email = '$email' and password = '$password'";
$res = $conn->query($sql);
if ($res){
    session_start();
    $row = $res->fetch_assoc();
    $_SESSION['user_id'] = $row["id"];
    $_SESSION['fname'] = $row['fname'];
    if ($row['role'] == "specialist"){
        header('location:http://dima2005/public/html/profile_specialist.php');
    };
    if ($row['role'] == "admin"){
        header('location:http://dima2005/public/html/adminpanel.php');
    };
    if ($row['role'] == "user"){
        header('location:http://dima2005/public/html/profile.php');
    };
} else {
    echo "error";
};

?>