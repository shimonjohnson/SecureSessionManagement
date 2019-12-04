<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Secure Session Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
  <div class="jumbotron" style="background-color: #555; color:white;">
    <h2>Secure Session Management</h2>
  </div>
</div>

<?php
if(isset($_SESSION["userId"]) && isset($_SESSION["userRole"])){
?>
  <div class="container" id="contentDisplay">
    <h4 class="admin" style="display:none;">
      This is inside the app content that <b>Admin</b> can see!
      <br/> I have all the control ...
    </h4>
    <h4 class="general admin editor" style="display:none;">
      This is content that <b>General</b> user can see.
      <br/> I don't have much control .. but i'm ok.
    </h4>
    <h4 class="editor admin" style="display:none;">
      This is content that <b>Editor</b> can see.
      I have some more control. I can change things some things if I wish to.
    </h4>
  </div>

  <script>
  $('.<?php echo $_SESSION["userRole"]; ?>').each(function(){
    $(this).css("display","block");
  });
  </script>

  <div class="container">
  <br/>
  <input type="button" class="btn btn-danger" onclick="logout('Logged out successfully');" id="logoutButton" style="display:block;" value="Logout"/>
  </div>

  <script>
  function logout(msg) {
      window.location.href="logout.php?msg="+msg;
  }
  </script>

  <script src="assets/js/activity_watcher.js"></script>
<?php
}
else{
?>
<div class="container" id="loginForm">
  <form id="login" action="validate.php" method="get">
    <div class="form-group">
      <label for="userName">Username:</label>
      <input type="text" class="form-control" id="userName" placeholder="Enter username" name="userName" autocomplete="off">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" autocomplete="off">
    </div>
    <input type="submit" class="btn btn-primary" value="Submit Form" />
  </form>
</div>
<?php
}
?>
<br/>
<div class="container">
  <div class="alert alert-info" role="alert" id="alertMessages">App messages appear here! <b><?php echo $_SESSION["validation_msg"]; ?></b></div>
  <div class="alert alert-warning" role="alert" id="activityWatcher">App warnings appear here!</div>
</div>

</body>
</html>
