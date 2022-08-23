<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding;0:
        }
        .user {
            width:1200px;
            height: 500px;
            display:flex;
            flex-direction : column;
            justify-content: right;
            overflow:auto;
            row-gap: 5px;
        }

        .button {
            width: 1190px;
            display:flex;
            justify-content: right;
            column-gap : 10px;
            padding-top :1%;
        }

        div {
            border:1px solid black;
            padding: 2%;
            width:95%;
            display:flex;
            flex-wrap:wrap;
            justify-content: space-between;
        }

        p {
            width:100%;
            padding-bottom:2%;
            font-weight:600;
        }

        input {
            width:25%;
            text-align:center;
            padding:0.5%;
        }

        .contact {
            display:flex;
            flex-direction:column;
        }

        .contact > input {
            width:98%;
        }

        h3{
            color:green;
        }


    </style>
</head>
<body>
    <?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $type = $_POST['type'];
        $id = $_POST['id'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $addr = $_POST['addr'];

        $idx = $_GET['idx'];

        $filehandler = fopen('./files/data.json','r');
        $user = json_decode(fread($filehandler,filesize('./files/data.json')));
        fclose($filehandler);

        $user[$idx]->id = $id;
        $user[$idx]->first_name = $fname;
        $user[$idx]->last_name = $lname;
        $user[$idx]->gender = $gender;
        $user[$idx]->user_type = $type;
        $user[$idx]->username = $id;
        $user[$idx]->password = $password;
        $user[$idx]->email = $email;
        $user[$idx]->phone = $phone;
        $user[$idx]->address = $addr;

        $filehandler = fopen('./files/data.json','w');
        $stringData = json_encode($user);

        fwrite($filehandler,$stringData);
        fclose($filehandler);
        echo "<h3>Your changes have been saved successfully.</h3>";
    }

    if(isset($_GET['idx'])){
        $idx = $_GET['idx'];
        $filehandler = fopen('./files/data.json','r');
        $userData = json_decode(fread($filehandler,filesize('./files/data.json')));
        fclose($filehandler);
        echo "<form method='POST' action='".$_SERVER['PHP_SELF']."?idx=$idx'>";
        echo "<h2>User Info Details</h2><section class='user'>";
        echo "<div>";
        echo "<label for='id'>ID number</label>";
        echo "<input name='id' value='".$userData[$idx]->EmployeeID."'/>";
        echo "</div>";
        echo "<div><p>Personal Info</p>";
        echo "<label for='fname'>First Name</label>";
        echo "<input name='fname' value='".$userData[$idx]->first_name."'/>";
        echo "<label for='lname'>Last Name</label>";
        echo "<input name='lname' value='".$userData[$idx]->last_name."'/>";
        echo "<label for='gender'>Gender</label>";
        echo "<input name='gender' value='".$userData[$idx]->gender."'/>";
        echo "</div>";
        echo "<div><p>Register Info</p>";
        echo "<label for='type'>Usertype</label>";
        echo "<input name='type' value='".$userData[$idx]->user_type."'/>";
        echo "<label for='id'>ID</label>";
        echo "<input name='id' value='".$userData[$idx]->username."'/>";
        echo "<label for='password'>Password</label>";
        echo "<input name='password' value='".$userData[$idx]->password."'/>";
        echo "</div>";
        echo "<div class='contact'><p>Contact</p>";
        echo "<label for='email'>Email</label>";
        echo "<input name='email' value='".$userData[$idx]->email."'/>";
        echo "<label for='phone'>Phone</label>";
        echo "<input name='phone' value='".$userData[$idx]->phone."'/>";
        echo "<label for='addr'>Address</label>";
        echo "<input name='addr' value='".$userData[$idx]->address."'/>";
        echo "</div></section>";
    }
    ?>
    <section class="button">
        <a href='./userDelet.php'>Del</a>
        <button type="submit">Save</button>
        <button type="button" onclick="location.href='./membertest.php';">Back</button>
    </section>
    </form>
</body>
</html>