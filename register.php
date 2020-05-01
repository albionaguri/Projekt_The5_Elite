<?php include('includes/config.php'); ?>
<?php include('register_teacher.php'); ?>


<html>
<head>

  <?php
       echo errorMessage();
      //  echo successMessage();
    ?>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- <link rel="stylesheet" type="text/css" href="css/registercss.css"> -->
</head>

<script>
$(document).ready(function(){
  $("#teacher").hide();

  $("#student").hide();

  $("#te").click(function(){
    $("#teacher").show();
    $("#student").hide();
    });
  $("#st").click(function(){
    $("#student").show();
    $("#teacher").hide();
  });

});
</script>
</head>

<body>

<button id="te">Teacher</button>
<button id="st">Student</button>
 <br>



<div id="student">
<h2 style="color:white"> Student </h2>
<p><span class="error">* required field</span></p>

<form method="POST" action="register_student.php">

  <div class="form-group">
      <input type="text" name="fullname" class="form-control" placeholder="Full Name " value="" />
  </div>

  <div class="form-group">
      <input type="password" name ="pwd" class="form-control" name = "pwd" placeholder="Password " value="" />
  </div>

  <div class="form-group">
      <input type="password" name = "pwd-repeat" class="form-control" name = "pwd-repeat"  placeholder="Confirm Password *" value="" />
  </div>

    <div class="form-group">
      <div class="maxl">
          <label class="radio inline">
              <input type="radio" name="gender" value="male" checked>
              <span> Male </span>
          </label>
          <label class="radio inline">
              <input type="radio" name="gender" value="female">
              <span>Female </span>
          </label>
      </div>
  </div>

  <div class="col-md-6">
      <div class="form-group">
          <input type="email" class="form-control" name = "mail" placeholder="Your Email " value="" required = "required"/>
      </div>

      <div class="form-group">
          <input type="text" minlength="3" maxlength="4" name="rollid" class="form-control" id = "rollid" placeholder="Your RollID *" value="" />
      </div>

      <div class="form-group">
          <input type="text" minlength="10" maxlength="10" name="classid" class="form-control" id = "classname" placeholder="Class Name" value="" />
      </div>

      <div class="form-group">
          <input type="date" minlength="4" maxlength="4" name="dob" class="form-control" id = "date" value="" />
      </div>

    </div>

    <input type="submit" class="btnRegister" name="Submit" value="Register"/>
</form>
</div>



<div id="teacher">
<h2 style="color:white"> Teacher </h2>
<p><span class="error">* required field</span></p>

<form method="POST" action="register.php">
  <div class="form-group">
      <input type="text" class="form-control" name = "firstname" placeholder="First Name *" value="" />
  </div>

  <div class="form-group">
      <input type="text" class="form-control" name = "surname" placeholder="Surname *" value="" />
  </div>

  <div class="form-group">
      <input type="email" class="form-control" name= "mail" placeholder="Email *" value="" />
  </div>

  <div class="form-group">
      <input type="password" class="form-control" name = "pwd" placeholder="Password *" value="" />
  </div>

  <div class="form-group">
      <input type="password" class="form-control" name = "pwd-repeat"  placeholder="Confirm Password *" value="" />
  </div>

  <div class="form-group">
      <input type="text" class="form-control" name = "dept" placeholder="Department" value="" />
  </div>
  <input type="submit" name = "Submit" class="btnRegister"  value="Register"/>
</form>
</div>


</body>
</html>
