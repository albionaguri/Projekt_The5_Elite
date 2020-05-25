<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/sessions.php');
include('includes/functions.php');


if(isset($_POST['submit']))
{
  $classname=$_POST['classname'];
  $classnamenumeric=$_POST['classnamenumeric'];
  $section=$_POST['section'];

  if (empty($classname) || empty($classnamenumeric) ||  empty($section)){
    $_SESSION["ErrorMessage"] = "All fields must be filled out!";
    header("location: create-class.php");
    exit;
  }


  $sql = "SELECT * FROM tblclasses WHERE ClassName = '$classname' AND ClassNameNumeric =$classnamenumeric
        AND Section = '$section'";
  $res = mysqli_query($con, $sql);
  $nr = mysqli_num_rows($res);
  if ($nr == 1){
      $_SESSION["ErrorMessage"] = "This class already exists";
      header("location: create-class.php");
      exit;
  }

  $sql1 = "INSERT INTO  tblclasses(ClassName,ClassNameNumeric,Section)
  VALUES('$classname', $classnamenumeric, '$section')";
  $result = mysqli_query($con, $sql1);

  if($result){
    $lastInsertId = mysqli_insert_id($con);
    $msg="Class Created successfully";
  }
  else
  {
    $error="Something went wrong. Please try again";
  }
}
?>
