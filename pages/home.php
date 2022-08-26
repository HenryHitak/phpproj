<form method="POST"action="home">
    <input type="text" name="name">
    <button type="submit">go</button>

</form>

<?php
    echo "home page";

    if(isset($_POST['name'])){
        echo $_POST['name'];
    }
?>