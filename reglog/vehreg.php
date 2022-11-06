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

    $sql1 = "INSERT INTO users (nic, phone, name, email, password) VALUES ('$nic', '$phone', '$uname', '$email', '$pass');";
    
    
    if ($mysqli->query($sql1) === TRUE) {
        echo("<br/>Account created successfully");
        $sql2 = "SELECT * FROM `users` WHERE nic = $nic"; //error in this line 

    } else {
        echo ("<br/>Error: " . $sql . "<br>" . $mysqli->error);
        //insert error
    }

    if($vtype == 'Car'){
        $quota = 20;
    }else if($vtype == 'Van'){
        $quota = 30;
    }else if($vtype == 'Truck'){
        $quota = 40;
    }else if($vtype == 'Bike'){
        $quota = 10;
    }
    
    $sql2 = "INSERT INTO vehicles (nic, vletter, vnumber, vtype, vfuel, chassis, alloc_quota, bal_quota) VALUES ('$nic', '$let', '$num', '$vtype', '$fuel', '$chas', '$quota', '$quota')";
    if($mysqli->query($sql2) === TRUE){
        echo("<script>alert('Account created and vehicle registered')</script>");
        header("Location: ../dash.php", true, 301);
    }
    else{
        echo("<br/>Vehicle registration error:<br/>".$mysqli->error);
        $mysqli->query("DELETE FROM users WHERE nic = '$nic'");
        echo("<script>alert('Account deleted')</script>");
    }
        
        //redirect to login page
    $mysqli->close();
?>