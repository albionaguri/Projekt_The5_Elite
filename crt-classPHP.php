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

  elseif(!empty($classnamenumeric) && (!empty($section))){
    if($section == $row["Section"] && $classnamenumeric == $row["ClassNameNumeric"]){
      $_SESSION["ErrorMessage"] = "This Class already exists";
      header("location: create-class.php");
      exit;
    }
  }


  $sql = "SELECT * FROM tblclasses WHERE ClassName = '$classname' AND ClassNameNumeric =$classnamenumeric
        AND Section = $section";
  $res = mysqli_query($con, $sql);
  $nr = mysqli_num_rows($res);
  if ($nr == 1){
      $_SESSION["ErrorMessage"] = "This class already exists";
      header("location: create-class.php");
      exit;
  }


  $sql = "INSERT INTO  tblclasses(ClassName,ClassNameNumeric,Section)
  VALUES(?,?,?)";
  $result = mysqli_prepare($con, $sql);

  if($result){
    mysqli_stmt_bind_param($result,"sis",$classname,$classnamenumeric,$section);
    mysqli_stmt_execute($result);
    $lastInsertId = mysqli_insert_id($con);
    $msg="Class Created successfully";
  }
  else
  {
    $error="Something went wrong. Please try again";
  }
}
?>
