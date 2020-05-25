<?php
include('includes/config.php');
?>
<?php include('includes/functions.php'); ?>
<?php include('includes/sessions.php'); ?>
<?php  Confirm_Login(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Result Management System | Dashboard</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
  <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
  <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
  <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
  <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" >
  <link rel="stylesheet" href="css/icheck/skins/line/blue.css" >
  <link rel="stylesheet" href="css/icheck/skins/line/red.css" >
  <link rel="stylesheet" href="css/icheck/skins/line/green.css" >
  <link rel="stylesheet" href="css/main.css" media="screen" >
  <script src="js/modernizr/modernizr.min.js"></script>
</head>
<body class="top-navbar-fixed">
  <div class="main-wrapper">
    <?php include('includes/topbar.php');?>
    <div class="content-wrapper">
      <div class="content-container">

        <?php include('includes/leftbar.php');?>

        <div class="main-page">
          <div class="container-fluid">
            <div class="row page-title-div">
              <div class="col-sm-6">
                <h2 class="title">Dashboard</h2>
              </div>
            </div>
          </div>

          <section class="section">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <a class="dashboard-stat bg-primary" href="manage-students.php">
                    <?php
                    $sql1 ="SELECT id from users where role = 'Student'";
                    $result1 = mysqli_query($con,$sql1);
                    $row=mysqli_fetch_array($result1);
                    $totalstudents=mysqli_num_rows($result1);
                    ?>

                    <span class="number counter"><?php echo htmlentities($totalstudents);?></span>
                    <span class="name">Registered Students</span>
                    <span class="bg-icon"><i class="fa fa-users"></i></span>
                  </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <a class="dashboard-stat bg-danger" href="manage-subjects.php">
                    <?php
                    $sql2 ="SELECT id from  tblsubjects ";
                    $result2 = mysqli_query($con,$sql2);
                    $row=mysqli_fetch_array($result2);
                    $totalsubjects=mysqli_num_rows($result2);
                    ?>
                    <span class="number counter"><?php echo htmlentities($totalsubjects);?></span>
                    <span class="name">Subjects Listed</span>
                    <span class="bg-icon"><i class="fa fa-ticket"></i></span>
                  </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <a class="dashboard-stat bg-warning" href="manage-classes.php">
                    <?php
                    $sql3 ="SELECT id from  tblclasses ";
                    $result3 = mysqli_query($con,$sql3);
                    $row=mysqli_fetch_array($result3);
                    $totalclasses=mysqli_num_rows($result3);
                    ?>
                    <span class="number counter"><?php echo htmlentities($totalclasses);?></span>
                    <span class="name">Total classes listed</span>
                    <span class="bg-icon"><i class="fa fa-bank"></i></span>
                  </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <a class="dashboard-stat bg-success" href="manage-results.php">
                    <?php
                    $sql4="SELECT  StudentId FROM  tblresult ";
                    $result4 = mysqli_query($con,$sql4);
                    $row=mysqli_fetch_array($result4);
                    $totalresults=mysqli_num_rows($result4);
                    ?>

                    <span class="number counter"><?php echo htmlentities($totalresults);?></span>
                    <span class="name">Results Declared</span>
                    <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                  </a>
                </div>
              </div>
            </div>
          </section>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat bg-primary" href="manage-teachers.php">
              <?php
              $sql5 ="SELECT id from users where role = 'Teacher' ";
              $result5 = mysqli_query($con,$sql5);
              $row=mysqli_fetch_array($result5);
              $totalteachers=mysqli_num_rows($result5);
              ?>

              <span class="number counter"><?php echo htmlentities($totalteachers);?></span>
              <span class="name">Registered Teachers</span>
              <span class="bg-icon"><i class="fa fa-users"></i></span>
            </a>
          </div>

        </div>

      </div>
    </div>
  </div>

  <script src="js/jquery/jquery-2.2.4.min.js"></script>
  <script src="js/jquery-ui/jquery-ui.min.js"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <script src="js/pace/pace.min.js"></script>
  <script src="js/lobipanel/lobipanel.min.js"></script>
  <script src="js/iscroll/iscroll.js"></script>

  <script src="js/prism/prism.js"></script>
  <script src="js/waypoint/waypoints.min.js"></script>
  <script src="js/counterUp/jquery.counterup.min.js"></script>
  <script src="js/amcharts/amcharts.js"></script>
  <script src="js/amcharts/serial.js"></script>
  <script src="js/amcharts/plugins/export/export.min.js"></script>
  <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
  <script src="js/amcharts/themes/light.js"></script>
  <script src="js/toastr/toastr.min.js"></script>
  <script src="js/icheck/icheck.min.js"></script>

  <script src="js/main.js"></script>
  <script src="js/production-chart.js"></script>
  <script src="js/traffic-chart.js"></script>
  <script src="js/task-list.js"></script>

  <script>
  $(function(){

    // Counter for dashboard
    $('.counter').counterUp({
      delay: 10,
      time: 1000
    });

    // Welcome notification
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    toastr["success"]( "Welcome to student Result Management System!");

  });
  </script>
</body>
</html>
