<?php
    include 'conn.php';
    session_start();
    $_SESSION['userName'];
    include 'head.php';


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
<div class="Users">
    <!--sorting and searching -->
    <div class='table-top'>
        <form method='POST' action="<?php echo $_SERVER['PHP_SELF']?>">
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
    <div class="User_Table">
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
                <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody class="table-group-divider text">
                <?php
                    // table page make
                    $pageMax = 8;
                    $total = $rows;
                    $page_check = $total/$pageMax;
                    $page_total = (int)($page_check);
                    $page_num = isset($_GET['page_num']) == '' ? 1 : $_GET['page_num'];
                    
                    $pg_cal = (int)(($page_num-1) / $pageMax) * $pageMax;
                    $pg_start =  $pg_cal+1;
                    $pg_end = $pg_start + $pageMax;
                    $prev = $pg_start-$pageMax;
                    
                    if($page_total < $page_check){
                        $page_total += 1;
                    }
                    
                    if($page_num == 1){
                        $skip_record=0;

                    }else{
                        $skip_record=($page_num-1)*$pageMax;
                    }

                    
                    //get userdata in table
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $userType = $_POST['userType'];
                        switch($_POST['userType']){
                            case "all":
                                $sql = "SELECT * FROM User_DB LIMIT $skip_record,$pageMax" ;
                                $result = mysqli_query($conn,$sql);
                                
                            break;
                            case "doctor":
                                $sql = "SELECT * FROM User_DB WHERE occupation = 'doctor' LIMIT $skip_record,$pageMax";
                                $result = mysqli_query($conn,$sql);
                            break;
                            case "general":
                                $sql = "SELECT * FROM User_DB WHERE occupation = 'general' LIMIT $skip_record,$pageMax";
                                $result = mysqli_query($conn,$sql);
                            break;
                            case "admin":
                                $sql = "SELECT * FROM User_DB WHERE occupation = 'admin' LIMIT $skip_record,$pageMax";
                                $result = mysqli_query($conn,$sql);
                            break;
                        }
                    }else{
                        $sql = "SELECT * FROM User_DB LIMIT $skip_record,$pageMax";
                        $result = mysqli_query($conn,$sql);
                    }

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
                        <td>$no</td>
                        <td>$fname</td>
                        <td>$lname</td>
                        <td>$gender</td>
                        <td>$dob</td>
                        <td>$type</td>
                        <td>$email</td>
                        <td>$phone</td>
                        <td>$addr</td>
                        <td><a href='./userUpdate.php?no=$no'class='btn btn-primary'>Edit</a></td>
                        ");
                        
                    }
                ?>
            </tbody>
        </table>

        
    </div>
    <!--Pagelist-->
    <p class="table_page">
        <?php

            if($page_num != '1'){
            echo("<a href='$_SERVER[PHP_SELF]?page_num=1'>[pre]</a> ");
            };

            if($page_num >= 11)
            echo("<a href='$_SERVER[PHP_SELF]?page_num=$prev'>[next]</a> ");

            for($page=$pg_start; $page < $pg_end; $page++) {
            if($page <= $page_total){
                if($page_num == $page){
                    echo "[$page] ";
                }else{
                echo "<a href=$_SERVER[PHP_SELF]?page_num=$page>[$page]</a> ";
                }
            }
            }

            if($page_num < $page_total)
            echo("<a href='$_SERVER[PHP_SELF]?page_num=$pg_end'>[next]</a> ");

            if($page_num != $page_total)
            echo("<a href='$_SERVER[PHP_SELF]?page_num=$page_total'>[end]</a> ");
        ?>
    </p>
    <section class="button">
        <a href="./UserNew.php" class="btn btn-primary">+New User</a>
    </section>
</div>

<?php include 'footer.php';?>