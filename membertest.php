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
            header : 300px;
            overflow: auto;
        }
    </style>
    <title>table</title>
</head>
<body>
    <div class="User_Table">
        <?php
            function tabledisplay($details,$num){
                return "<tr><th scope='row'>$num</th><td>$details->first_name</td><td>$details->last_name</td><td>$details->user_type</td><td>$details->username</td><td>$details->email</td><td>$details->phone</td><td>$details->address</td><td><a href='./coursework3edit.php?idx=$idx'>Edit</a></td><td><a href='./userDelet.php'>Del</a></td></tr>";
            }

            $fileHandler = fopen('./files/data.json','r');
            $data = fread($fileHandler,filesize('./files/data.json'));
            fclose($fileHandler);
            $userData = json_decode($data);
        


            //sorting by usertype 'Dortor' or 'General' or 'Admin'
            echo "<form method='POST'>";
            echo "Type :  ";
            echo "<select name='dep' style='width: 80px;'>";
            echo "<option selected>All</option>";
            $depart = [];
            foreach($userData as $option){
                array_push($depart,$option->user_type);
            }
            $deparList=array_unique($depart);
            foreach($deparList as $list){
                echo "<option>$list</option>";
            }
            echo "</select>";
            echo "<button type='submit'>Sort</button>";
            echo "</form>";

            /*foreach($userData as $idx => $details){
                foreach($details as $key => $value){
                    echo $key;
                }
            }
            */
        ?>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Num</th>
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
            <tbody class="table-group-divider">
            <?php
                    // if it's not "POST" show everything
                    if($_SERVER['REQUEST_METHOD']!=="POST"){
                        $num = 1;
                        foreach($userData as $idx => $details){
                            echo tabledisplay($details,$num);
                            $num++;
                        }
                    
                    //display only selected usertype but if 'All' is selected show everything again(how...)!
                    }elseif($_SERVER['REQUEST_METHOD']=="POST"){
                        $dep = $_POST["dep"];
                        $numa = 1;
                        foreach($userData as $idx => $details){
                            if($dep == $details->user_type){
                                echo tabledisplay($details,$numa);
                                $numa++;
                            }
                        }
                        if($dep == "All"){
                            if($_SERVER['REQUEST_METHOD']=="POST"){
                                $numb = 1;
                                foreach($userData as $idx => $details){
                                    echo tabledisplay($details,$numb);
                                    $numb++;
                                }
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</main>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>