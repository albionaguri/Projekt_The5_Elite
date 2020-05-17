<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/sessions.php');


if(isset($_POST['submit']))
{
  $username=$_POST['username'];
  $password = md5($_POST['password']);
  $email=$_POST['email'];
  $gender=$_POST['gender'];
  $class=$_POST['class'];
  $dob=$_POST['dob'];
  $roli = "Student";

  if(!empty($email)){
    if(!strpos($email, "@fshnstudent.info")) {
      $_SESSION["ErrorMessage"] = "Invalid Email format!";
      header("location: add-students-form.php");
    }
  }

  $sql="INSERT INTO users(username,email, gender, ClassId, DOB, role,password)
        VALUES('$username','$email','$gender','$class','$dob', '$roli','$password')";
  $result = mysqli_query($con, $sql);

  $lastInsertId = mysqli_insert_id($con);
  if($result){
    $msg="Student added successfully";
  }
  else{
    $error="Something went wrong. Please try again";
  }
}
?>
