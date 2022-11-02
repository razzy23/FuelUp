<?php
    session_start();

    session_start();
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'FuelUp';

    $mysqli = @new mysqli(
        $db_host,
        $db_user,
        $db_password,
        $db_db
    );

    if ($mysqli->connect_error) {
        die('Connection error error:<br/>Errno: '.$mysqli->connect_errno.'<br/>Error'.$mysqli->connect_error);
    }
    echo('<br/>Success: A proper connection to MySQL was made.<br/> Host information: '.$mysqli->host_info.'<br/> Protocol version: '.$mysqli->protocol_version);
    //connection to mySQL database

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
    
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <?php 
        echo("Welcome ".$_SESSION['uname']);
        

        $quota = "SELECT bal_quota AND alloc_quota FROM vehicles, users WHERE $_SESSION['phone'] = user.phone AND user.user_id = vehicle.user_id"

        $result = $mysqli->query($quota);
        $row = $result->fetch_assoc();

        echo("<h1>Your quota</h1>");
        echo($row['bal_quota']."/".$row['alloc_quota']);
        echo("<br/><br/>")
        
        $mysqli->close();
    ?>    
    <form method="post">
        <input type="submit" name="logout"
                value="Log out"/>
    </form>
</body>
</html>
