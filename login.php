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
<div class="container">
<h1 style="margin-left: 60vh; margin-bottom: 50px">Log In</h1>
  <form   class="form-horizontal" action="validation.php" method="POST">
    <div class="form-group">
      <div class="col-sm-10">
      <label style="margin-top: 15px;"> Email</label> <br>
        <input type="email" class="form-control" placeholder="Enter your email" name="user">
      </div>
    </div>
    <div  class="form-group">
      <div class="col-sm-10">    
      <label style="margin-top: 15px;"> Password</label> <br>      
        <input type="password" class="form-control" placeholder="Enter your password" name="pwd">
      </div>
    </div>
    <div class="form-group">        
      <div class=" col-sm-10">
        <button type="submit" class="btn btn-primary">Log In</button>
      </div>
    </div>
  </form>
  <p>If you are here for the first time please <a href="signup.php">click here</a> for register.  not registered here.</p>
</div>
</body>
</html>
