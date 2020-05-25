<?php
session_start();
error_reporting(0);
include('includes/config.php');

$tid=intval($_GET['tid']);

if(isset($_POST['submit']))
{
  $username=$_POST['username'];
  $email=$_POST['email'];
  $gender=$_POST['gender'];
  $dob=$_POST['dob'];

  $sql="UPDATE users set username='$username', DOB = '$dob', email='$email', gender='$gender'
  where id=$tid ";


  $result = mysqli_query($con, $sql);
  if($result){
    $msg="Teacher info updated successfully";

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
  <title> SMS Admin| Edit Teacher </title>
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

    <?php include('includes/topbar.php');?>
    <div class="content-wrapper">
      <div class="content-container">

        <?php include('includes/leftbar.php'); ?>
        <div class="main-page">
          <div class="container-fluid">
            <div class="row page-title-div">
              <div class="col-md-6">
                <h2 class="title"> Teacher  Admission</h2>
              </div>
            </div>
            <div class="row breadcrumb-div">
              <div class="col-md-6">
                <ul class="breadcrumb">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

                  <li class="active">Teacher Admission</li>
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
                      <h5> Fill the Teacher Info </h5>
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

                    <form class="form-horizontal" method="POST" action="edit-teacher.php?tid=<?php echo $_GET['tid']; ?>">

                      <?php
                      $sql = "SELECT users.username, users.id, users.email,
                      users.gender,users.DOB from users
                      where users.id = $tid";

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
                                <input type="radio" name="gender" value="Male" required="required" checked> Male
                                <input type="radio" name="gender" value="Female" required="required"> Female
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="date" class="col-sm-2 control-label"> Date of birth: </label>
                            <div class="col-sm-10">
                              <input type="date"  name="dob" class="form-control"
                              value="<?php  echo htmlentities($row["DOB"]) ?>" id="date">
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
              </div>
            </div>
          </div>
        </div>
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

    </body>
    </html>
