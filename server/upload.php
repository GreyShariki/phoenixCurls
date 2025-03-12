<?php
require_once("db.php");
$name = $_POST['name'];
$image = $_POST['image'];
$sql = "INSERT INTO galery (specialist, image) VALUES ('$name', '$image')";
if ($conn->query($sql)){
    header("location:../public/html/galery.php");
} else {
    echo "error";
};

?>