<?php
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
    //echo('<br/>Success: A proper connection to MySQL was made.<br/> Host information: '.$mysqli->host_info.'<br/> Protocol version: '.$mysqli->protocol_version);
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
    <title>testing</title>
</head>
<body>
    <form action='test.php' method='post'>
        <input type='text' name='vreg'>enter the vehicle registration number
        <input type='submit' name='Check quota' value='validity'/>
    </form>

    <?php
        $vreg = $_POST['vreg'];

        $vnum = explode("-", $_POST['vreg'],2);
        $let = $vnum[0];
        $num = $vnum[1];

        $quota = "SELECT * FROM vehicles WHERE $let = vletter AND $num = vnumber";
        
        $result = $mysqli->query($quota);
        $row = $result->fetch_assoc();

        echo("<h1>the quota</h1>");
        echo($row['bal_quota']."/".$row['alloc_quota']);
        echo("<br/><br/>");

        if ($row['bal_quota'] == 0) {
            echo("You have no quota left");
        }
        else {
            echo("You have quota left");
            echo("<input type='text' name='pumped'/> Fuel amount purchased");

        }
        
        $mysqli->close();
</body>
</html>