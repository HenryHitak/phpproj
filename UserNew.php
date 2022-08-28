<?php
  include 'conn.php';
  session_start();
  $_SESSION['userName'];
  include 'head.php';
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style='width: 1200px;'>
    <div class="mb-3">
        <label for="fname" class="form-label">Fisrt Name</label>
        <input type="text" name="fname" class="form-control" require>
        <label for="lname" class="form-label">Last Name</label>
        <input type="text" name="lname" class="form-control" require>
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" name="dob" class="form-control" require>
        <label for="gender" class="form-label">Gender</label>
        <select name="gender" class="form-control" require>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="occupation" class="form-label">User Type</label>
        <select name="occupation" class="form-control" require>
            <option value="admin">admin</option>
            <option value="general">general</option>
            <option value="doctor">doctor</option>
        </select>
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" require>
        <label for="pass" class="form-label">Password</label>
        <input type="password" name="pass" class="form-control" require>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" require>
        <label for="addr" class="form-label">Address</label>
        <input type="text" name="addr" class="form-control" require>
        <button type="submit" class="btn btn-primary">new user</button>
    </div>
</form>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $dbUsername = "root";
        $dbServername = "localhost";
        $dbPass = "";
        $dbName = "Hey_Doc";

        $dbCon = new mysqli($dbServername,$dbUsername,$dbPass,$dbName);

        if($dbCon->connect_error){
            die("Connection error ".$dbCon->connect_error);
        }else{
            $insertCmd = "INSERT INTO User_DB (occupation,firstName,lastName,gender,dob,email,pass,phone,addr,salt) VALUES ('".$_POST['occupation']."','".$_POST['fname']."','".$_POST['lname']."','".$_POST['gender']."','".$_POST['dob']."','".$_POST['email']."','".$_POST['pass']."','".$_POST['phone']."','".$_POST['addr']."','salt')";
            $result = $dbCon->query($insertCmd);

            if($result === true){
                echo "<h1 style='color: green;'>DONE!!!!</h1>";
            }else{
                echo "<h1 style='color: red;'>".$dbCon->error."</h1>";
            }
            $dbCon->close();

            header('Location: http://localhost/phpproj/userTable.php');
        }
    }
?>

<?php include 'footer.php';?>