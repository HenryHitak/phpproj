<?php
    include './DBlink.php';

    // get data from DB according to usertype = sorting function
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $userType = $_POST['userType'];
        switch($_POST['userType']){
            case "all":
                $query = "SELECT * FROM User_DB";
                $result = mysqli_query($conn,$query);
                $rows = mysqli_num_rows($result);
            break;
            case "doctor":
                $query = "SELECT * FROM User_DB WHERE occupation = 'doctor'";
                $result = mysqli_query($conn,$query);
                $rows = mysqli_num_rows($result);
            break;
            case "general":
                $query = "SELECT * FROM User_DB WHERE occupation = 'general'";
                $result = mysqli_query($conn,$query);
                $rows = mysqli_num_rows($result);
            break;
            case "admin":
                $query = "SELECT * FROM User_DB WHERE occupation = 'admin'";
                $result = mysqli_query($conn,$query);
                $rows = mysqli_num_rows($result);
            break;
        }
    }else{
        $query = "SELECT * FROM User_DB";
        $result = mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result);
    }
?>

<!--sorting and searching -->
<div class='table-top'>
    <form method='POST' action="UserTable">
        <select name='userType' class='form-select form-select-sm' aria-label='.form-select-sm example'>
            <option value="all">All</option>
            <option value="admin">Admin</option>
            <option value="doctor">doctor</option>
            <option value="general">General</option>
        </select>
        <button class='btn btn-outline-secondary' type='submit' id='button-addon2'>Sort</button>
    </form>
</div>

<!--User Table -->
<div class="UserTable">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Type</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col" colspan="2">Edit</th>
            </tr>
        </thead>
        <tbody class="table-group-divider text">
            <?php
                //get userdata in table
                if($_SERVER['REQUEST_METHOD']=="POST"){
                    $userType = $_POST['userType'];
                    switch($_POST['userType']){
                        case "all":
                            $sql = "SELECT * FROM User_DB" ;
                            $result = mysqli_query($conn,$sql);
                            
                        break;
                        case "doctor":
                            $sql = "SELECT * FROM User_DB WHERE occupation = 'doctor'";
                            $result = mysqli_query($conn,$sql);
                        break;
                        case "general":
                            $sql = "SELECT * FROM User_DB WHERE occupation = 'general'";
                            $result = mysqli_query($conn,$sql);
                        break;
                        case "admin":
                            $sql = "SELECT * FROM User_DB WHERE occupation = 'admin'";
                            $result = mysqli_query($conn,$sql);
                        break;
                    }
                }else{
                    $sql = "SELECT * FROM User_DB";
                    $result = mysqli_query($conn,$sql);
                }
                $number = 1;
                while($row = mysqli_fetch_array($result)) {
                    $no = $row['user_num'];
                    $fname = $row['firstName'];
                    $lname = $row['lastName'];
                    $dob = $row['dob'];
                    $gender = $row['gender'];
                    $type = $row['occupation'];
                    $email = $row['email'];
                    $dob = $row['dob'];
                    $phone = $row['phone'];
                    $addr = $row['addr'];
                
                    echo("
                    <tr>
                    <td>$number</td>
                    <td>$fname</td>
                    <td>$lname</td>
                    <td>$gender</td>
                    <td>$dob</td>
                    <td>$type</td>
                    <td>$email</td>
                    <td>$phone</td>
                    <td>$addr</td>
                    <td><a class='btn' href='".$_SERVER['PHP_SELF']."?id=".$row['user_num']."&action=edit'>Edit</a></td>
                    <td><a class='btn' href='".$_SERVER['PHP_SELF']."?id=".$row['user_num']."&action=del'>Delet</a></td>
                    </tr>
                    ");

                    $number++;
                    
                }
            ?>
        </tbody>
    </table>
</div>
<section class="button">
    <a href="/UserNew" class="btn btn-primary">+New User</a>
</section>
