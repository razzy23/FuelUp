<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
     $mysqli = require __DIR__ . "/database.php";
    
     $sql = "SELECT * FROM org_admin
             WHERE id = {$_SESSION["user_id"]}";            
     $result = $mysqli->query($sql);
     $user = $result->fetch_assoc();
     
 }

if (isset($_GET['id'])){

    $id = $_GET['id'];
    $sql = "DELETE FROM org_driver WHERE id = $id";  

    if ($sql){
        header("location: index.php");
        die();
    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>FuelUp</title>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <!-- <link href="../FuelUp-raz-admin/adminstyles.css" rel="stylesheet"> -->
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
        $.get("nav.html", function(data){
            $("#nav-placeholder").replaceWith(data);
            document.getElementById("complains").style.color = "#E14761";
        });
        
    </script>
</head>
<body>
        
    <div id="nav-placeholder"></div>

</body>
</html>
    
    
    
    
    
    
    
    
    
    
    