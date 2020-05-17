<?php
$con = mysqli_connect('localhost','root',"",'srms');
$Delete_Class_Id = $_GET['Delete'];

$delete_query = "DELETE FROM tblclasses WHERE id = '$Delete_Class_Id'";
$result = mysqli_query($con,$delete_query);
if($result){
  header("Location:". "manage-classes.php");
}
 ?>
