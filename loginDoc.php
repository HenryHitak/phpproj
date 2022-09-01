<?php
    if(isset($_POST['type'])) {
        switch($_POST['type']) {
            case 1:
                header("Location: http://localhost/phpproj/loginDoc.php");
                break;
            case 2:
                header("Location: http://localhost/phpproj/login.php");
                break;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Log In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">

</head>
<body>
  <form method="POST" enctype="multipart/form-data">
    <select class="form-control" id="type" name="type" font="30px" onchange="this.form.submit()">
      <option>Select your option</option>
      <option value="1">For Doctors</option>
      <option value="2">For Patients</option>
    </select>
</form>
<div class="container">
<h1 style="margin-left: 60vh; margin-bottom: 50px">Log In</h1>
  <form   class="form-horizontal" action="docvalidation.php" method="POST">
    <div class="form-group">
      <div class="col-sm-10">
      <label style="margin-top: 15px;"> Email</label> <br>
        <input type="email" class="form-control" placeholder="Enter your email" name="DoctorEmail">
      </div>
    </div>
    <div  class="form-group">
      <div class="col-sm-10">    
      <label style="margin-top: 15px;"> Password</label> <br>      
        <input type="password" class="form-control" id="DoctorPass" placeholder="Enter your password" name="DoctorPass">
        <input type="checkbox" onclick="myFunction1()">Show Password<br>
      </div>
    </div>

    <div class="form-group">        
      <div class=" col-sm-10">
        <button type="submit" class="btn btn-primary">Log In</button>
      </div>
    </div>
    
  </form>
  <p>If you are here for the first time please <a href="signupDoc.php">click here</a> for register.  not registered here.</p>
  <div>
    <a href="./admin/login.html">Administrator Login</a>
  </div>
</div>
</body>
</html>
<script>
  function myFunction1() {
  var x = document.getElementById("DoctorPass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<?php include 'footer.php'; ?>
