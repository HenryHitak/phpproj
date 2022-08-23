<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>table</title>
</head>
<body>
    <main>
        <div class="User_Table">
                <?php
                    function tabledisplay($details){
                        return "<tr><td>$details->id</td><td>$details->first_name</td><td>$details->last_name</td><td>$details->user_type</td><td>$details->username</td><td>$details->email</td><td>$details->phone</td><td>$details->address</td><td><a href='./coursework3edit.php?idx=$idx'>Edit</a></td><td><a href='#'>Del</a></td></tr>";
                    }

                    $fileHandler = fopen('./files/data.json','r');
                    $data = fread($fileHandler,filesize('./files/data.json'));
                    fclose($fileHandler);
                    $userData = json_decode($data);
                


                    //sorting by usertype 'Dortor' or 'General' or 'Admin'
                    echo "<form method='POST'>";
                    echo "Type :  ";
                    echo "<select name='dep' style='width: 200px;'>";
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

                    echo "<table border=1><thead><tr><th>Num</th><th>First Name</th><th>Last Name</th><th>User Type</th><th>ID</th><th>Email</th><th>Phone</th><th>Address</th><th>Edit</th><th>Delet</th></tr><thead>";
                    echo "<tbody>";

                    // if it's not "POST" show everything
                    if($_SERVER['REQUEST_METHOD']!=="POST"){
                        foreach($userData as $idx => $details){
                            echo tabledisplay($details);
                        }
                    
                    //display only selected usertype but if 'All' is selected show everything again(how...)!
                    }elseif($_SERVER['REQUEST_METHOD']=="POST"){
                        $dep = $_POST["dep"];
                        foreach($userData as $idx => $details){
                            if($dep == $details->user_type){
                                echo tabledisplay($details);
                            }
                        }
                        if($dep == "All"){
                            if($_SERVER['REQUEST_METHOD']=="POST"){
                                foreach($userData as $idx => $details){
                                    echo tabledisplay($details);
                                }
                            }
                        }
                    }
                    echo "</tbody></table>";
                ?>
    </main>
    <?php
        
    ?>
</body>
</html>