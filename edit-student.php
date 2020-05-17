<?php

session_start();
error_reporting(0);
include('includes/config.php');

$stid=intval($_GET['stid']);

if(isset($_POST['submit']))
{
  $username=$_POST['username'];
  $email=$_POST['email'];
  $gender=$_POST['gender'];
  $class=$_POST['class'];
  $dob=$_POST['dob'];
  $status=$_POST['status'];

  $sql="UPDATE users set username='$username', email='$email', gender='$gender'
  where id=$stid ";

  $result = mysqli_query($con, $sql);
  if($result){
    $msg="Student info updated successfully";

  }
  else{
    $error = "Something went wrong!";
  }
}

?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> SMS Admin| Edit Student </title>
  <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
  <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
  <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
  <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
  <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
  <link rel="stylesheet" href="css/select2/select2.min.css" >
  <link rel="stylesheet" href="css/main.css" media="screen" >
  <script src="js/modernizr/modernizr.min.js"></script>
</head>
<body class="top-navbar-fixed">
  <div class="main-wrapper">

    <!-- ========== TOP NAVBAR ========== -->
    <?php include('includes/topbar.php');?>
    <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
    <div class="content-wrapper">
      <div class="content-container">

        <!-- ========== LEFT SIDEBAR ========== -->
        <?php include('includes/leftbar.php'); ?>
        <!-- /.left-sidebar -->

        <div class="main-page">

          <div class="container-fluid">
            <div class="row page-title-div">
              <div class="col-md-6">
                <h2 class="title">Student Admission</h2>

              </div>
            </div>
            <div class="row breadcrumb-div">
              <div class="col-md-6">
                <ul class="breadcrumb">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

                  <li class="active">Student Admission</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="panel">
                  <div class="panel-heading">
                    <div class="panel-title">
                      <h5> Fill the Student Info </h5>
                    </div>
                  </div>
                  <div class="panel-body">
                    <?php if($msg){ ?>
                      <div class="alert alert-success left-icon-alert" role="alert">
                        <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                      </div>
                    <?php }
                    else if($error){ ?>
                      <div class="alert alert-danger left-icon-alert" role="alert">
                        <strong>Try Again!</strong> <?php echo htmlentities($error); ?>
                      </div>
                    <?php } ?>

                    <form class="form-horizontal" method="POST" action="edit-student.php?stid=<?php echo $_GET['stid']; ?>">

                      <?php
                      $sql = "SELECT users.username, users.id, users.status, users.email,
                      users.gender,users.DOB,tblclasses.ClassName,tblclasses.Section
                      from users
                      join tblclasses on tblclasses.id=users.ClassId
                      where users.id = $stid";

                      $result = mysqli_query($con, $sql);
                      $cnt=1;
                      $num_rows = mysqli_num_rows($result);
                      if($num_rows > 0)
                      {
                        while($row = mysqli_fetch_array($result))
                        {

                          ?>

                          <div class="form-group">
                            <label for="default" class="col-sm-2 control-label"> Username </label>
                            <div class="col-sm-10">
                              <input type="text" name="username" class="form-control" id="fullname"
                              value="<?php  echo htmlentities($row["username"])   ?>" required="required" autocomplete="off">
                            </div>
                          </div>


                          <div class="form-group">
                            <label for="default" class="col-sm-2 control-label"> Email </label>
                            <div class="col-sm-10">
                              <input type="email" name="email" class="form-control" id="email" value="<?php echo htmlentities($row["email"]) ?>" required="required" autocomplete="off">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="default" class="col-sm-2 control-label"> Gender </label>
                            <div class="col-sm-10">
                              <?php  $gender=$row["gender"];
                              if($gender=="Male")
                              {
                                ?>
                                <input type="radio" name="gender" value="Male" required="required" checked> Male
                                <input type="radio" name="gender" value="Female" required="required"> Female
                              <?php  } ?>

                              <?php
                              if($gender=="Female")
                              {
                                ?>
                                <input type="radio" name="gender" value="Male" required="required"> Male
                                <input type="radio" name="gender" value="Female" required="required" checked> Female
                              <?php  } ?>

                            </div>
                          </div>

                          <div class="form-group">
                            <label for="default" class="col-sm-2 control-label"> Class </label>
                            <div class="col-sm-10">
                              <input type="text" name="classname" class="form-control" id="classname"
                              value="<?php echo htmlentities($row["ClassName"]) ?>
                              <?php echo htmlentities($row["Section"]) ?>" >
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="date" class="col-sm-2 control-label"> Date of birth: </label>
                            <div class="col-sm-10">
                              <input type="date"  name="dob" class="form-control"
                              value="<?php  echo htmlentities($row["DOB"]) ?>" id="date">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="default" class="col-sm-2 control-label"> Status </label>
                            <div class="col-sm-10">
                              <input type="text"  class="form-control">

                              <?php
                              $status=$row["Status"];
                              if($status=="1")
                              {
                                ?>
                                <input type="radio" name="status" value="1" required="required" checked> Active
                                <input type="radio" name="status" value="0" required="required"> Block
                              <?php } ?>

                              <?php
                              if($status=="0")
                              {
                                ?>
                                <input type="radio" name="status" value="1" required="required"> Active
                                <input type="radio" name="status" value="0" required="required" checked> Block

                              <?php } ?>
                            </div>
                          </div>

                        <?php }}  ?>

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="submit" class="btn btn-primary"> Edit </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- /.col-md-12 -->
              </div>
            </div>
          </div>
          <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->
      </div>
      <!-- /.main-wrapper -->
      <script src="js/jquery/jquery-2.2.4.min.js"></script>
      <script src="js/bootstrap/bootstrap.min.js"></script>
      <script src="js/pace/pace.min.js"></script>
      <script src="js/lobipanel/lobipanel.min.js"></script>
      <script src="js/iscroll/iscroll.js"></script>
      <script src="js/prism/prism.js"></script>
      <script src="js/select2/select2.min.js"></script>
      <script src="js/main.js"></script>
      <script>
      $(function($) {
        $(".js-states").select2();
        $(".js-states-limit").select2({
          maximumSelectionLength: 2
        });
        $(".js-states-hide").select2({
          minimumResultsForSearch: Infinity
        });
      });
      </script>
      <?php echo $username;
      echo $email;
      echo $gender;
      echo $class;
      echo $dob;
      echo $status;?>
    </body>
    </html>
