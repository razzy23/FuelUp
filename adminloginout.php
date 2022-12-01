<?php
    include 'databaseaccess.php';

    if(array_key_exists('login', $_POST)) { 
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $pin = $_POST['pin'];
            
        $sql = "SELECT * FROM System_admin WHERE username = '$uname' AND password = '$pass' AND pin = '$pin'";
        $result = $conn->query($sql);
        if($result == True){
            $row = $result->fetch_assoc();
            if($row['status'] == 0){
                $sql2 = "UPDATE System_admin SET status = 1 WHERE username = '$uname' AND password = '$pass' AND pin = '$pin'";
                $result2 = $conn->query($sql2);
                $_SESSION['uname'] = $uname;
                header("Location: admindashboard.html");
            }else{
                echo "Your account is active on another device";
            }
        }else{
            echo("<script>alert('Invalid credentials')</script>");
            //header("Location: adminlogin.html");
        }
    } 
    else if(array_key_exists('logout', $_POST)) { 
        $uname = $_SESSION['uname'];
        $sql = "UPDATE System_admin SET status = 0 WHERE username = '$uname'";
        $result = $conn->query($sql);
        if($result == True){
            session_destroy();
            header("Location: adminlogin.html");
        }else{
            echo "logout Error";
        }
    }
?>

