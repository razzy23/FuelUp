<?php
    session_start();

    if(isset($_POST['logout'])) {
        session_destroy();
        header("Location: ../FuelUp/index.html", true, 301);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard</h1>
    <?php 
        echo("Welcome ".$_SESSION['uname']);
        
    ?>    
    <form method="post">
        <input type="submit" name="logout"
                value="Log out"/>
    </form>
</body>
</html>
