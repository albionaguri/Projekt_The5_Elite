
<?php include("includes/config.php"); ?>
<?php

function Confirm_Login(){
  if (isset($_SESSION["username"])) {
    return true;
  }  else {
    $_SESSION["ErrorMessage"]="Login Required !";
    header("location: index.php");
  }
}

function checkUsernameExistsOrNot($username){
  global $con;
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 1){
    return true;
  }
  else{
    return false;
  }
}



function loginAttempt($username, $password, $role){
  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND role = '$role'";
  $result = mysqli_query($con, $sql);

  if ($row = mysqli_num_rows($result) > 0){
    return true;
  }
  else{
    return false;
  }
}


?>
