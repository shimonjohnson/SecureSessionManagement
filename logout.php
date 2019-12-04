<?php
session_start();
unset($_SESSION["userId"]);
unset($_SESSION["userRole"]);
$_SESSION["validation_msg"] = $_GET["msg"];
header("Location: index.php");
?>
