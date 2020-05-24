<?php include('includes/config.php'); ?>
<?php include('includes/sessions.php'); ?>
<?php include('includes/functions.php'); ?>

<?php
if(isset($_POST["Submit"])){

  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['pwd-repeat'];
  $gender = $_POST['gender'];
  $role = $_POST['role'];
  $email = $_POST['mail'];
  $email = ucfirst(strtolower($email));
  $dob = $_POST['dob'];
  $dept = $_POST['dept'];
  $classname = $_POST['classname'];


  if (empty($username) || empty($password) || empty($confirm_password) || empty($gender) || empty($email) ||
  empty($dob) || empty($role) ){
    $_SESSION["ErrorMessage"] = "All fields must be filled out!";
    header("location: register.php");
    exit;
  }
  elseif(checkUsernameExistsOrNot($username)){
    $_SESSION["ErrorMessage"] = "Username exists";
    header("location: register.php");
    exit;
  }
  elseif (strlen($password) < 5){
    $_SESSION["ErrorMessage"] = "Password should be greater than 5 characters!";
    header("location: register.php");
    exit;
  }
  elseif ($password != $confirm_password){
    $_SESSION["ErrorMessage"] = "Password and Confirm Password should match!";
    header("location: register.php");
    exit;
  }
  elseif (preg_match('/[^A-Za-z0-9]/', $password)){
    $_SESSION["ErrorMessage"] = "Your password can contain only english characters and numbers!";
    header("location: register.php");
    exit;
  }
  else{
    if($role == "Teacher"){
      if(!preg_match("~@fshn.edu\.al$~",$email)){
        $_SESSION["ErrorMessage"] = "Must be @fshn.edu.al format!";
        header("location: register.php");
        exit;
      }

      $query = "INSERT INTO users(username,password,email,gender,DOB,role)
      VALUES(?, ?, ?, ?, ?,?)";
      $result = mysqli_prepare($con, $query);

      if ($result){
        mysqli_stmt_bind_param($result, "ssssss", $username, md5($password) , $email, $gender, $dob,$role);
        mysqli_stmt_execute($result);
        $last_id = mysqli_insert_id($con);
        $_SESSION["SuccessMessage"] = "Successfully registered! Go ahead and login!";
        header("location: index.php");
      }
      else{
        $_SESSION["ErrorMessage"] = "Something went wrong! Try again!";
      }
    }

    elseif($role == "Student"){
      if(!preg_match("~@fshnstudent\.info$~",$email)){
        $_SESSION["ErrorMessage"] = "Must be @fshnstudent.info format!";
        header("location: register.php");
        exit;
      }

      $sql1 = "SELECT * FROM tblclasses WHERE ClassName='$classname'";
      $res = mysqli_query($con, $sql1);
      $nr = mysqli_num_rows($res);

      if($nr == 1){
        $ro = mysqli_fetch_array($res);
        $ClassId = $ro[0];
        $query = "INSERT INTO users(username,password,email,gender,DOB,role, ClassId)
                  VALUES(?, ?, ?, ?, ?,?, ?)";
        $result = mysqli_prepare($con, $query);

        if ($result){
          mysqli_stmt_bind_param($result, "ssssssi", $username, md5($password) , $email, $gender, $dob,$role,$ClassId);
          mysqli_stmt_execute($result);
          $last_id = mysqli_insert_id($con);
          $_SESSION["SuccessMessage"] = "Successfully registered! Go ahead and login!";
          header("location: index.php");
        }
        else{
          $_SESSION["ErrorMessage"] = "Something went wrong! Try again!";
          header("location: register.php");
        }
      }
      else {
        $_SESSION["ErrorMessage"] = "ClassName doesnt exist!";
        header("location: register.php");
      }


    }
}
}






?>
