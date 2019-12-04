<?php
session_start();
$data = file_get_contents("assets/data/data.json");
$users = json_decode($data, true);

if(isset($_GET["userName"]) && isset($_GET["password"])){
  $password = $_GET["password"];
  $userName = $_GET["userName"];
  $role = "";
  $id = 0;
  foreach ($users as $user) {
    if($user["firstName"] == $userName && $user["hash"] == sha1($password)){
      $role = $user["userRole"];
      $id = $user["userId"];
      break;
    }
  }
  if($role != "" && $id != 0){
    $_SESSION["userId"] = $id;
    $_SESSION["userRole"] = $role;
    $_SESSION["validation_msg"] = "Logged in Successfully";
    header("Location: index.php");
  }
  else{
    $_SESSION["validation_msg"] = "Incorrect Credentials";
    header("Location: index.php");
  }
}
?>
