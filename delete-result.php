<?php
$con = mysqli_connect('localhost','root',"",'srms');
$Delete_Record_Id = $_GET['Delete'];

$delete_query = "DELETE FROM users WHERE id = '$Delete_Record_Id'";
$result = mysqli_query($con,$delete_query);
if($result){
  header("Location:". "manage-results.php");
}
 ?>
