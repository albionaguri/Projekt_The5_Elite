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
        $query = "SELECT * FROM admin WHERE UserName='$username' AND
                Password='$password'  AND
                 role = '$role'";

        $result  = mysqli_query($con, $query);
        $check_login_query = mysqli_num_rows($result);

        if($check_login_query == 1){
          $row = mysqli_fetch_array($result);
          $username = $row['UserName'];
          $password= $row["Password"];
          $role = $row["role"];

           if($role == "Admin"){
             $_SESSION['username'] = $username;
             $_SESSION['password'] = $password;
             header("location: dashboard.php");
           }

           else if($role == "Student"){
             $_SESSION["username"] = $username;
             $_SESSION['password'] = $password;
             header("location: student_profile.php");
           }
           else if($role == "Teacher"){
             $_SESSION["username"] = $username;
             $_SESSION['password'] = $password;
             header("location: teacher_profile.php");
           }
         }
       else{
           $_SESSION["ErrorMessage"] = "Incorrect username or password!";
       }
   }
}
?>
