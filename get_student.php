<?php
include('includes/config.php');
if(!empty($_POST["classid"]))
{
 $cid=intval($_POST['classid']);
 if(!is_numeric($cid)){

 	echo htmlentities("invalid Class");
  exit;
 }
 else{
 $query = "SELECT username,id FROM users
          WHERE ClassId= $cid
          ORDER BY username";

 $result = mysqli_query($con,$query);

 $stmt = (array('$id' => $cid));
 ?><option value="">Select Name </option><?php

 while($row = mysqli_fetch_array($result))
 {
  ?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['username']); ?></option>
  <?php
 }
}

}
// Subjects
if(!empty($_POST["classid1"]))
{
 $cid1=intval($_POST['classid1']);
 if(!is_numeric($cid1)){

  echo htmlentities("invalid Class");
  exit;
 }
 else{
 $status=0;
 $sql = "SELECT tblsubjects.SubjectName,tblsubjects.id
   FROM tblsubjectcombination
   JOIN  tblsubjects
   ON tblsubjects.id = tblsubjectcombination.SubjectId
   WHERE tblsubjectcombination.ClassId = $cid1
   and tblsubjectcombination.status != $status
   order by tblsubjects.SubjectName";

$res = mysqli_query($con,$sql);

 $stmt = (array('$cid' => $cid1,'$status' => $status));

 while($row=mysqli_fetch_array($res))
 {?>
  <p> <?php echo htmlentities($row['SubjectName']); ?><input type="text"  name="marks[]" value="" class="form-control"
    placeholder="Enter marks out of 100" autocomplete="off"></p>

<?php  }
}
}


?>

<?php

if(!empty($_POST["studclass"]))
{
 $id= $_POST['studclass'];
 $dta=explode("$",$id);
$id=$dta[0];
$id1=$dta[1];
 $query = "SELECT StudentId,ClassId FROM tblresult WHERE StudentId= $id1 and ClassId=$id";
//$query= $dbh -> prepare($sql);

$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$cnt=1;
$num_rows = mysqli_num_rows($result);
if($num_rows  > 0)
{ ?>
<p>
<?php
echo "<span style='color:red'> Result Already Declare .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
 ?></p>
<?php }


  }?>
