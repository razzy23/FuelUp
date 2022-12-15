<?php
    include 'databaseaccess.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Station Operator Login</title>
</head>
<body>
    <h1>Station Operator Login</h1>
    <form action="" method="post">
        <label for="station">Station number</label><br/>
        <input type="text" name="stationno" id="stationno" required><br/><br/>
        <label for="code">Employee code</label><br/>
        <input type="text" name="code" id="code" required><br/><br/>
        <label for="password">Password</label><br/>
        <input type="password" name="password" id="password" required><br/><br/>
        <input type="submit" value="Login">
    </form>
</body>
</html>

<?php
    if(isset($_POST['stationno']) && isset($_POST['code']) && isset($_POST['password'])){
        $stationno = $_POST['stationno'];
        $code = $_POST['code'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM operator WHERE station_id = '$stationno' AND code = '$code' AND password = '$password'";
        $result = $conn->query($sql);
        if($result == TRUE){
            $_SESSION['code'] = $code;
            $_SESSION['stationno'] = $stationno;
            header("Location: operatordash.php");
        }else{
            echo "Login Failed";
            echo $conn->error;
        }
    }
?>