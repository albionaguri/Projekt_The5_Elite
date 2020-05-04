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


?>
