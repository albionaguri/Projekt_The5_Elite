<?php
$con = mysqli_connect('localhost','root',"",'srms');
$Delete_Subject_Id = $_GET['Delete'];

$delete_query = "DELETE FROM tblsubjects WHERE id = '$Delete_Subject_Id'";
$result = mysqli_query($con,$delete_query);
if($result){
  header("Location:". "manage-subjects.php");
}
 ?>
