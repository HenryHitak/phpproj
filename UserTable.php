<?php
    // link DataBase
    $conn = mysqli_connect("localhost","root","","User_DB");
    if(!$conn) {
        die("db error : " . mysqli_error());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .User_Table{
            width : 1200px;
            height: 500px;
            border-bottom : 1px solid black;
            overflow: auto;
        }

        th, td {
            text-align: center;
        }

        .table-top {
            width : 1200px;
            display : flex;
            justify-content: space-between;
        }

        .button {
            width : 1200px;
            display : flex;
            justify-content: right;
        }

        form {
            width:200px !important;
            display : flex;
        }
    </style>
    <title>table</title>
</head>
<body>
    <!--sorting and searching -->
    <div class='table-top'><form method='POST'>;
    <select name='dep' class='form-select form-select-sm' aria-label='.form-select-sm example'>;
    <option selected>All</option>;
    <?php

    ?>
    </select>
    <button class='btn btn-outline-secondary' type='submit' id='button-addon2'>Sort</button>
    </form>

    <form class=input-group mb-3>
    <input type='text' class='form-control' placeholder='Search' aria-label='Search' aria-describedby='button-addon2'>
    <button class='btn btn-outline-secondary' type='button' id='button-addon2'>Button</button>
    </form></div>

    <div class="User_Table">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">User Type</th>
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Edit</th>
                <th scope="col">Delet</th>
                </tr>
            </thead>
            <tbody class="table-group-divider text">
                <?php
                    $query = "SELECT * FROM user_tb ORDER BY user_id";
                    $result = mysqli_query($conn,$query);

                    $rows = mysqli_num_rows($result);

                    //get userdata in table
                    while($row = mysqli_fetch_array($result)) {
                        $no = $row['user_id'];
                        $fname = $row['firstName'];
                        $lname = $row['lastName'];
                        $email = $row['email'];
                        $dob = $row['dob'];
                        $phone = $row['phone'];
                        $addr = $row['addr'];
                    
                        echo("
                        <div class='my_div'>
                        <tr class='my_ul'>
                        <td>$no</td>
                        <td>$fname</td>
                        <td>$lname</td>
                        <td>$usertype</td>
                        <td>$usertype</td>
                        <td>$email</td>
                        <td>$phone</td>
                        <td>$addr</td>
                        <td><a href='/board/update.php?no=$no'>Edit</a></td>
                        <td><a href='/board/delete.php?no=$no'>Delet</a></td>
                        </tr>
                        </div>
                        ");
                    }
                ?>
            </tbody>
        </table>
    </div>
    <section class="button">
        <button type="button" class="btn btn-primary">+New User</button>
    </section>
</main>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>