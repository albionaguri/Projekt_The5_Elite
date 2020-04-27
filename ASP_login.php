<?php session_start();?>
<?php error_reporting(0); ?>
<?php include('includes/config.php'); ?>


<?php
      if(isset($_POST['Submit'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $Role = $_POST['role'];

        $query = "SELECT * FROM admin WHERE UserName='$username' AND
                Password='$password'  AND role = '$Role'";

        $result  = mysqli_query($con, $query);


       $row = mysqli_fetch_array($result);
         if($row['UserName'] == $username &&
            $row['Password'] == $password &&
            $row['role'] == 'Admin'){
              header('location:dashboard.php');

            } elseif($row['UserName'] == $username &&
               $row['Password'] == $password &&
               $row['role'] == 'Student'){
                 header('location:student_profile.php');

              }elseif($row['UserName'] == $username &&
                 $row['Password'] == $password &&
                 $row['role'] == 'Teacher'){
                   header('location:teacher_profile.php');
              }
            else {
               ?>
         <script>
             alert('username or password invalid');
             window.open('ASP_login.php','_self');
         </script>
         <?php
                 }
       }



?>
