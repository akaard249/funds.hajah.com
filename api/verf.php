<?php

if (isset($_COOKIE["username"])){
$user = $_COOKIE["username"];
$user_type = $_COOKIE["type"];
}
else{
header("location: ../login.php");
die();
}

?>