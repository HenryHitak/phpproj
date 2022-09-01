<?php
    include 'conn.php';
    session_start();
    $query = "SELECT * FROM User_DB";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);

    $name = $_SESSION['userName'];
    $did = $_SESSION['did'];
    $dnam = $_SESSION['dname'];
    include './dochead.php';
?>

<?php
    if(isset($_GET['no'])){
        $idx = $_GET['no'];
        while($row = mysqli_fetch_array($result)) {
            if($row['userid']==$idx) {
                $fname = $row['firstName'];
                $lname = $row['lastName'];
                $dob = $row['dob'];
                $gender = $row['gender'];
                $email = $row['email'];
                $pass = $row['pass'];
                $dob = $row['dob'];
                $phone = $row['phone'];
                $addr = $row['addr'];
                $_SESSION['del'] = $idx;
            }
        }

        echo "<form method='POST' action='./edit/useredit.php' style='width: 1000px; padding-left:13%;'>";
        echo "<h2>User Info Details</h2><section class='user'>";
        echo "<div>";
        echo "<label for='id'>ID number</label>";
        echo "<input name='id' class='form-control' value='".$idx."'/>";
        echo "</div>";
        echo "<div><p>Personal Info</p>";
        echo "<label for='fname'>First Name</label>";
        echo "<input name='fname' class='form-control' value='".$fname."'/>";
        echo "<label for='lname'>Last Name</label>";
        echo "<input name='lname' class='form-control' value='".$lname."'/>";
        echo "<label for='gender'>Gender</label>";
        echo "<input name='gender' class='form-control' value='".$gender."'/>";
        echo "<label for='dob'>Date of Birth</label>";
        echo "<input name='dob' class='form-control' value='".$dob."'/>";
        echo "</div>";
        echo "<div><p>Register Info</p>";
        echo "<label for='id'>Email</label>";
        echo "<input name='email' class='form-control' type='email' value='".$email."'/>";
        echo "<div class='contact'><p>Contact</p>";
        echo "<label for='phone'>Phone</label>";
        echo "<input name='phone' class='form-control' value='".$phone."'/>";
        echo "<label for='addr'>Address</label>";
        echo "<input name='addr' class='form-control' value='".$addr."'/>";
        echo "</div></section>";
    }
?>
        <div style="text-align:right;">
            <a href='./edit/useredelet.php' class="btn btn-danger">Del</a>
            <button type="submit" class='btn btn-primary'>Save</button>
            <button type="button" class='btn btn-primary' onclick="location.href='./UserTable.php';">Back</button>
        </div>
</form>

<?php include 'footer.php';?>