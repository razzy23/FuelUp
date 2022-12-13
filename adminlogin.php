<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="adminstyles.css" rel="stylesheet">
    <title>Admin-Login</title>
</head>
<body>
    <div id="loginform">
        <h1>Admin Login</h1>
        <form action="adminlogin.php" method="POST"> <!-- Front end bit to get login deets -->
            <input type="text" name="uname" placeholder="Admin name"><br/></br>
            <input type="password" name="password" placeholder="Admin password"><br/><br/>
            <input type="password" name="pin" placeholder="Secret key"><br/><br/>
            <button type="submit" name="login"><div id="button">Login</div></button>
        </form>
    </div> 
</body>
</html>

<?php
    include 'databaseaccess.php';
    //starts the session and connects to the database

    if(array_key_exists('login',$_POST)){ //if the login button is pressed

        $uname = $_POST['uname'];
        $pass = $_POST['password'];
        $pin = $_POST['pin'];
                
        $sql = "SELECT * FROM System_admin WHERE username = '$uname'";
        $result1 = $conn->query($sql);  //checks for the existence of the account
        if($result1->num_rows>0){       //if the account exists
            $row = $result1->fetch_assoc(); //fetches the row
            if($row['password'] == $pass AND $row['pin']==$pin){ //checks if the password and pin are correct
                echo("password and pin checked");
                if($row['status'] == 0){
                    $sql2 = "UPDATE System_admin SET status = 1 WHERE username = '$uname' AND password = '$pass' AND pin = '$pin'"; //updates the status of the account
                    $result2 = $conn->query($sql2);
                    echo("<script>console.log('status updated')</script>");
                    $_SESSION['uname'] = $uname; //sets the session variable for the logged in user
                    echo "<script>console.log('Login successful')</script>";
                    header("Location: admindashboard.php");
                }else{
                    echo "Your account is active on another device"; //mentioned in status in the database- reset manually or at logout in the device it has been logged in on
                    header("Location: adminlogin.php"); //redirects to the login page
                }
            }else{                
                echo("invalid password/pin");
                header("Location:adminlogin.php");
                
            }
        }else{
            echo("Invalid username");
            header("Location: adminlogin.php");
        }
    }
?>