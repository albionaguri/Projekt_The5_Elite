<?php include('includes/config.php'); ?>
<?php include('includes/sessions.php'); ?>


<?php
if(isset($_POST['Submit'])){

  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $role = $_POST["role"];


  if (empty($username) || empty($password) || empty($role)){
    $_SESSION["ErrorMessage"] = "All fields must be filled out!";
  }
  elseif(strlen($password) < 5){
    $_SESSION["ErrorMessage"] = "Password length must be greater than 5";
  }

  else{
    $query = "SELECT * FROM users WHERE username='$username' AND
    password='$password' AND role = '$role' ";

    $result  = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $username = $row["username"];
    $password = $row["password"];
    $role = $row["role"];
    $check_login_query = mysqli_num_rows($result);

    if($check_login_query == 1){

      if($row["role"] == 'Student'){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("location: student_profile.php");
      }
      else if($row["role"] == 'Teacher'){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("location: teacher_profile.php");
      }
      else if($row["role"] == 'Admin'){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("location: dashboard.php");
      }
    }
      else {
        $_SESSION["ErrorMessage"] = "Data is incorrect!";
      }

    }
  }

?>
