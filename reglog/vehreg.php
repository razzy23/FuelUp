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
    echo('<br/>Success: A proper connection to MySQL was made.<br/> Host information: '.$mysqli->host_info.'<br/> Protocol version: '.$mysqli->protocol_version);
    //connection to mySQL database


    $nic = $_SESSION['nic'];
    $phone = $_SESSION['phone'];
    $uname = $_SESSION['uname'];
    $email = $_SESSION['email'];
    $pass = $_SESSION['pass'];
    $vnum = explode("-", $_POST['vnum'],2);
    $let = $vnum[0];
    $num = $vnum[1];
    $chas = $_POST['chasis'];
    $vtype = $_POST['type'];
    $fuel = $_POST['fuel'];
    $terms = filter_input(INPUT_POST, 'terms', FILTER_VALIDATE_BOOLEAN); 
    //getting data from the form

    
    if(!$terms){
        die ("Registration error:<br/>You must agree to the terms and conditions");
    }
    //validation

    $sql1 = "INSERT INTO users (nic, phone, name, email, password) VALUES ('$nic', '$phone', '$uname', '$email', '$pass')";
    $sql2 ="INSERT INTO vehicles VALUES ('$nic', '$let', '$num', '$vtype', '$fuel', '$chas')";

    if ($mysqli->query($sql1) === TRUE) {
        echo("<br/>Account created successfully");
        if($mysqli->query($sql2) === TRUE){
            echo("<br/>Vehicle registered successfully");
            header("Location: dash.php", true, 301);
        }
        else{
            echo("<br/>Error: ".$sql2."<br/>".$mysqli->error);
            $mysqli->query("DELETE FROM users WHERE nic = '$nic'");
            echo("<br/>Account deleted");
            header("Location: userreg.html", true, 301);
        }
        
        //redirect to login page
    } else {
        echo ("<br/>Error: " . $sql . "<br>" . $mysqli->error);
        //insert error
    }
    $mysqli->close();
?>