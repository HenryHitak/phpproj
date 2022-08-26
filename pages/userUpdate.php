<?php
    include './DBlink.php';
    $query = "SELECT * FROM User_DB";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>User Edit</title>
    <style>
        .user {width:1200px; height: 500px; display:flex; flex-direction : column; justify-content: right;overflow:auto; row-gap: 5px;}
        .button {width: 1190px; display:flex; justify-content: right; column-gap : 10px; padding-top :1%;}
        div {border:1px solid black; padding: 2%; width:95%; display:flex; flex-wrap:wrap;}
        p {width:100%; padding-bottom:2%; font-weight:600;}
        input {width:25%; text-align:center; padding:0.5%;}
        .contact {display:flex; flex-direction:column;}
        .contact > input {width:98%;}
        h3{color:green;}
    </style>
</head>
<body>
<?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $no = $_POST['id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $type = $_POST['type'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $addr = $_POST['addr'];
    
            $conn = mysqli_connect("localhost","root","","Hey_Doc");
            $UsereditCMD = "UPDATE User_DB SET user_num='$no',occupation='$type',firstName='$fname',lastName='$lname',gender='$gender',dob='$dob',email='$email',pass='$password',`phone`='$phone',addr='$addr',salt='salt' WHERE user_num = $no";
            if(mysqli_query($conn,$UsereditCMD)){
                header("Location: http://localhost/UserTable");
            }else{
                echo "failed";
            }
    
        }
    ?>
    <?php

    if(isset($_SESSION['id'])){
        $idx = $_SESSION['id'];
        while($row = mysqli_fetch_array($result)) {
            if($row['user_num']==$idx) {
                $fname = $row['firstName'];
                $lname = $row['lastName'];
                $dob = $row['dob'];
                $gender = $row['gender'];
                $type = $row['occupation'];
                $email = $row['email'];
                $pass = $row['pass'];
                $dob = $row['dob'];
                $phone = $row['phone'];
                $addr = $row['addr'];
            }
        }


        echo "<form method='POST'>";
        echo "<h2>User Info Details</h2><section class='user'>";
        echo "<div>";
        echo "<label for='id'>ID number</label>";
        echo "<input name='id' value='".$idx."'/>";
        echo "</div>";
        echo "<div><p>Personal Info</p>";
        echo "<label for='fname'>First Name</label>";
        echo "<input name='fname' value='".$fname."'/>";
        echo "<label for='lname'>Last Name</label>";
        echo "<input name='lname' value='".$lname."'/>";
        echo "<label for='gender'>Gender</label>";
        echo "<input name='gender' value='".$gender."'/>";
        echo "<label for='dob'>Date of Birth</label>";
        echo "<input name='dob' value='".$dob."'/>";
        echo "</div>";
        echo "<div><p>Register Info</p>";
        echo "<label for='type'>Usertype</label>";
        echo "<input name='type' value='".$type."'/>";
        echo "<label for='id'>Email</label>";
        echo "<input name='email' type='email' value='".$email."'/>";
        echo "<label for='password'>Password</label>";
        echo "<input name='password' value='".$pass."'/>";
        echo "</div>";
        echo "<div class='contact'><p>Contact</p>";
        echo "<label for='phone'>Phone</label>";
        echo "<input name='phone' value='".$phone."'/>";
        echo "<label for='addr'>Address</label>";
        echo "<input name='addr' value='".$addr."'/>";
        echo "</div></section>";
    }
    ?>
            <button type="submit">Save</button>
            <button type="button" onclick="location.href='UserTable';">Back</button>
        </section>
    </form>


</body>
</html>