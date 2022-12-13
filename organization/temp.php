<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="ARN" id="BRN">
        <input type="text" name="password" id="password">
        <input type="submit" value="submit">
    </form>
</body>
</html>

<?php 
session_start();
include 'database.php';

if(array_key_exists('ARN', $_POST) && array_key_exists('password', $_POST)){
    $brn = $_POST['ARN'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM org_admin WHERE BRN = '$brn'";

    $result = $mysqli->query($sql);

    if ($result==true) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $_SESSION["BRN"] = $row["BRN"];
            header("Location: index.php");
        }
    } else {
        echo "0 results";
    }
}