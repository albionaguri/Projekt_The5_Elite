<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/sessions.php');

if(isset($_POST['submit']))
{
$subjectname=$_POST['subjectname'];
$subjectcode=$_POST['subjectcode'];


$sql = "SELECT * FROM tblsubjects WHERE SubjectName='$subjectname'";
$res = mysqli_query($con, $sql);
$nr = mysqli_num_rows($res);
if ($nr == 1){
    $_SESSION["ErrorMessage"] = "Subject exists";
    header("location: create-subject.php");
    exit;
}

$query="INSERT INTO  tblsubjects(SubjectName,SubjectCode)
      VALUES(?,?)";
$result = mysqli_prepare($con, $query);
if($result){
  mysqli_stmt_bind_param($result,"ss",$subjectname,$subjectcode);
  mysqli_stmt_execute($result);
  $lastInsertId = mysqli_insert_id($con);
  $msg="Subject Created successfully";
}
else
{
$error="Something went wrong. Please try again";
}
}
?>
