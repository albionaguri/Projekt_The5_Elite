<?php include('includes/config.php'); ?>
<?php include('includes/functions.php'); ?>
<?php include_once('includes/sessions.php'); ?>


<?php
    if(isset($_POST["Submit"])){

      $fullname= $_POST['fullname'];
      $_SESSION["fullname"] = $fullname;

      $password = $_POST['pwd'];
      $confirm_password = $_POST['pwd-repeat'];

      $mail = $_POST['mail'];
      $mail = ucfirst(strtolower($mail));
      $_SESSION["mail"] = $mail;

      $gender = $_POST['gender'];
      $rollid = $_POST['rollid'];
      $classid = $_POST['classid'];
      $dob = $_POST['dob'];

      if (empty($fullname) || empty($password) || empty($confirm_password) || empty($mail) || empty($gender) ||
      empty($rollid) || empty($classid) || empty($dob)){
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
        exit;
    }

    elseif(!empty($mail)){
      if(!strpos($mail, "@fshnstudent.info")) {
        $_SESSION["ErrorMessage"] = "Invalid Email format!";
        exit;
      }
    }

      $query = "INSERT INTO tblstudents(StudentName,RollId,Gender,StudentEmail,DOB,ClassId,Student_Pwd)
                VALUES(?, ?, ?, ?, ?, ?, ?)";
      $result = mysqli_prepare($con, $query);

      if ($result){
           mysqli_stmt_bind_param($result, "sssssis", $fullname, $rollid , $gender, $mail, $dob, $classid, $password);
           mysqli_stmt_execute($result);
           $last_id = mysqli_insert_id($con);
           $_SESSION["SuccessMessage"] = "Successfully registered! Go ahead and login!";
           header("location: index.php");
          }
            else{
                $_SESSION["ErrorMessage"] = "Something went wrong! Try again!";
                header("location: register.php");
                }
        mysqli_close($con);

}

 ?>
