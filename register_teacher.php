<?php include('includes/config.php'); ?>
<?php include_once('includes/sessions.php'); ?>


<?php
    if(isset($_POST["Submit"])){

      $firstname = $_POST['firstname'];
      $_SESSION["firstname"] = $firstname;

      $surname= $_POST['surname'];
      $_SESSION["surname"] = $surname;

      $mail = $_POST['mail'];
      $mail = ucfirst(strtolower($mail));
      $_SESSION["mail"] = $mail;

      $password = $_POST['pwd'];
      $confirm_password = $_POST['pwd-repeat'];

      $dept = $_POST['dept'];
      $_SESSION["dept"] = $dept;


      if (empty($firstname) || empty($surname) || empty($mail) || empty($password) || empty($confirm_password) ||
      empty($dept)){
          $_SESSION["ErrorMessage"] = "All fields must be filled out!";
          header("location: register.php");
          exit;
        }
          elseif (strlen($password) < 5){
          $_SESSION["ErrorMessage"] = "Password should be greater than 5 characters!";
          header("location: register.php");
          exit;
      }
      elseif ($password !== $confirm_password){
          $_SESSION["ErrorMessage"] = "Password and Confirm Password should match!";
          header("location: register.php");
          exit;
      }
      elseif (preg_match('/[^A-Za-z0-9]/', $password)){
        $_SESSION["ErrorMessage"] = "Your password can contain only english characters and numbers!";
        header("location: register.php");
        exit;
      }

    elseif(!empty($mail)){
      if(!strpos($mail, "@fshn.edu.al")) {
        $_SESSION["ErrorMessage"] = "Invalid Email format!";
        header("location: register.php");
        exit;
      }
    }

      $query = "INSERT INTO tblteachers(Firstname,Surname,Email,Department,Password)
                VALUES(?, ?, ?, ?, ?)";
      $result = mysqli_prepare($con, $query);

      if ($result){
           mysqli_stmt_bind_param($result, "sssss", $firstname, $surname , $mail,$department, $password,);
           mysqli_stmt_execute($result);
           $last_id = mysqli_insert_id($con);
           $_SESSION["SuccessMessage"] = "Successfully registered! Go ahead and login!";
           header("location: index.php");
          }
            else{
                $_SESSION["ErrorMessage"] = "Something went wrong! Try again!";
                  }
        mysqli_close($con);

}

 ?>
