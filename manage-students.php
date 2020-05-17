
<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Manage Students</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
  <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
  <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
  <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
  <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
  <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
  <link rel="stylesheet" href="css/main.css" media="screen" >
  <script src="js/modernizr/modernizr.min.js"></script>
  <style>
  .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
  }
  .succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
  }
  </style>
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
              <div class="col-md-6">
                <h2 class="title">Manage Students</h2>
              </div>

            </div>
            <div class="row breadcrumb-div">
              <div class="col-md-6">
                <ul class="breadcrumb">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                  <li> Students</li>
                  <li class="active">Manage Students</li>
                </ul>
              </div>
            </div>
          </div>

          <section class="section">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading">
                      <div class="panel-title">
                        <h5>View Students Info</h5>
                      </div>
                    </div>
                    <?php if($msg){?>
                      <div class="alert alert-success left-icon-alert" role="alert">
                        <strong> Well done! </strong> <?php echo htmlentities($msg); ?>
                      </div>
                    <?php }
                    else if($error){
                      ?>
                      <div class="alert alert-danger left-icon-alert" role="alert">
                        <strong>Something Went Wrong!</strong> <?php echo htmlentities($error); ?>
                      </div>
                    <?php } ?>
                    <div class="panel-body p-30">

                      <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>ClassName</th>
                            <th>Change Record </th>
                            <th>Delete </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                          $sql = "SELECT *
                          FROM users WHERE role = 'Student'";
                          $result = mysqli_query($con,$sql);
                          $num_rows = mysqli_num_rows($result);
                          $cnt=1;

                          if($num_rows > 0)
                          {
                            while($row = mysqli_fetch_array($result))
                            {
                              ?>
                              <tr>
                                <td><?php echo htmlentities($row[0]); ?> </td>
                                <td><?php echo htmlentities($row[2]); ?> </td>
                                <td><?php echo htmlentities($row[1]); ?> </td>
                                <td><?php echo htmlentities($row[3]); ?> </td>
                                <td><?php echo htmlentities($row[4]); ?> </td>

                                <td><?php
                                $query = "SELECT * FROM tblclasses WHERE id=$row[5] ";
                                $res = mysqli_query($con, $query);
                                $r = mysqli_fetch_array($res);
                                echo htmlentities($r["ClassName"]); ?>
                                </td>
                                
                                  <td> Edit
                                    <a href="edit-student.php?stid=<?php echo htmlentities($row["id"]);?>">
                                      <i class="fa fa-edit" title="Edit Record"></i> </a>
                                  </td>

                                  <td>
                                    <a href="delete_student.php?Delete=<?php echo $row['id']; ?>">  Delete </a>
                                  </td>

                                  </tr>
                                  <?php $cnt=$cnt+1;
                                }
                              }
                              ?>

                            </tbody>
                          </table>

                          <!-- /.col-md-12 -->
                        </div>
                      </div>
                    </div>
                    <!-- /.col-md-6 -->
                  </div>
                  <!-- /.col-md-12 -->
                </div>
              </div>
              <!-- /.panel -->
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.section -->
    </div>
    <!-- /.main-page -->
  </div>
  <!-- /.content-container -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- /.main-wrapper -->

<!-- ========== COMMON JS FILES ========== -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/pace/pace.min.js"></script>
<script src="js/lobipanel/lobipanel.min.js"></script>
<script src="js/iscroll/iscroll.js"></script>

<!-- ========== PAGE JS FILES ========== -->
<script src="js/prism/prism.js"></script>
<script src="js/DataTables/datatables.min.js"></script>

<!-- ========== THEME JS ========== -->
<script src="js/main.js"></script>
<script>
$(function($) {
  $('#example').DataTable();

  $('#example2').DataTable( {
    "scrollY":        "300px",
    "scrollCollapse": true,
    "paging":         false
  } );

  $('#example3').DataTable();
});
</script>
</body>
</html>
