<?php include('includes/config.php'); ?>
<?php include('includes/sessions.php'); ?>


<?php
      if(isset($_POST['Submit'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        if (empty($username) || empty($password)){
            $_SESSION["ErrorMessage"] = "All fields must be filled out!";
        }
        else{

        if($role == "Student"){
          $query = "SELECT * FROM tblstudents WHERE StudentName='$username' AND
                  Student_pwd='$password' ";

          $result  = mysqli_query($con, $query);
          $check_login_query = mysqli_num_rows($result);

          if($check_login_query == 1){
            $row = mysqli_fetch_array($result);
            $username = $row['StudentName'];
            $password= $row["Student_pwd"];
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("location: student_profile.php");
           }
           else{
              $_SESSION["ErrorMessage"] = "Username or Password incorrect";
           }
         }


        else if($role == "Teacher"){
          $query = "SELECT * FROM tblteachers WHERE Firstname='$username' AND
                  Password='$password' ";

          $result  = mysqli_query($con, $query);
          $check_login_query = mysqli_num_rows($result);

          if($check_login_query == 1){
            $row = mysqli_fetch_array($result);
            $username = $row['Firstname'];
            $password= $row["Password"];
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("location: teacher_profile.php");
           }
           else{
              $_SESSION["ErrorMessage"] = "Username or Password incorrect";
           }
        }

        else if($role == "Admin"){
          $query = "SELECT * FROM admin WHERE UserName='$username' AND
                  Password='$password' ";

          $result  = mysqli_query($con, $query);
          $check_login_query = mysqli_num_rows($result);

          if($check_login_query == 1){
            $row = mysqli_fetch_array($result);
            $username = $row['UserName'];
            $password= $row["Password"];
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("location: dashboard.php");
           }
           else{
              $_SESSION["ErrorMessage"] = "Username or Password incorrect";
           }
         }
   }
}
?>
