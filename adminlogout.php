<?php
    include 'databaseaccess.php';

    $uname = $_SESSION['uname'];
    $sql = "UPDATE System_admin SET status = 0 WHERE username = '$uname'";
    $result = $conn->query($sql);
    if($result == True){
        session_destroy();
        header("Location: adminlogin.php");
    }else{
        echo "logout Error";
    }
?>

