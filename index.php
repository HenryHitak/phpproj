<?php
    include './websettings/routing.php';
    include './masterpages/header.php';

    //와나 이게 문제네....
    if(isset($_GET['id']) && isset($_GET['action'])) {
        session_start();
        $id = $_GET['id'];
        $conn = mysqli_connect("localhost","root","","Hey_Doc");
        if($conn->connect_error){
            die("connection error");
        }else{
            switch($_GET['action']){
                case "del":
                    $delcmd = "DELETE FROM User_DB WHERE user_num=$id";
                    if(mysqli_query($conn,$delcmd)){
                        header("Location: http://localhost/UserTable");
                    }
                break;
                case "edit":
                    $_SESSION['id'] = $id;
                    header("Location:http://localhost/userUpdate");
                break;
            }
            $dbcon->close();
        }
    }
    //와나~~

    echo "<main>";
    echo "<section class='sidebar'>";
        include './masterpages/sidebar.php';
    echo "</section>";
    echo "<section class='content'>";
        include $pageCompo;
    echo "</section>";
    echo "</main>";

    include './masterpages/footer.php';
?>