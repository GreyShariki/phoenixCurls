<?php
session_destroy();

$_SESSION = array();
header("location:http:/index.html");
?>