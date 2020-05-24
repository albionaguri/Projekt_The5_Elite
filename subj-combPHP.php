<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/sessions.php');
include('includes/functions.php');


if(isset($_POST['submit']))
{
  $class=$_POST['class'];
  $subject=$_POST['subject'];
  $status=1;



  $sql="INSERT INTO  tblsubjectcombination(ClassId,SubjectId,status)
  VALUES(?,?,?)";
  $result = mysqli_prepare($con,$sql);
  if($result){
    mysqli_stmt_bind_param($result,"iii",$class,$subject,$status);
    mysqli_stmt_execute($result);
    $lastInsertId = mysqli_insert_id($con);
    $msg="Combination added successfully";
  }
  else
  {
    $error="Something went wrong. Please try again";
  }
}
?>
