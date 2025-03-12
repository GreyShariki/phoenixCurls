<?php
session_destroy();
setcookie("user_id","",time()-3600,"/");
setcookie("role","",time()-3600,"/");

$_SESSION = array();
header("location:http:/index.html");
?>