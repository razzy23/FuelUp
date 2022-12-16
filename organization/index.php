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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <link href="../FuelUp-raz-admin/adminstyles.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
      $.get("nav.html", function(data){
            $("#nav-placeholder").replaceWith(data);
            document.getElementById("Drivers").style.display = 'none';
            document.getElementById("Vehicles").style.display = 'none';
            document.getElementById("History").style.display = 'none';
            document.getElementById("complains").style.display = 'none';
        });
        
    </script>
</head>
<body>
<div id="nav-placeholder"></div>    
    <?php if (isset($user)): ?>

    <div class="outerDiv">
        <div class="leftDiv">
        <h1>Welcome <?= htmlspecialchars($user["CompanyName"]) ?></h1>
    </div>

    
        <div class="rightDiv">
            <div class = "nav2">
                    <a id="Drivers" href="Driver.php"><div class="item2">Drivers</div></a>
                    <a id="vehicles" href="vehicle.php"><div class="item2">Vehicles</div></a>
            </div>
            <div class="nav">
                    <a id="History" href="history.php"><div class="item2">History</div></a>
                    <a id="complains" href="complain.php"><div class="item2">Complains</div></a>
            </div>
        </div>
    </div>


        <!-- <p><a href="logout.php">Log out</a></p> -->
        
    <?php else: ?>
        
        <p><a href="OAlogin.php">Log in</a> or <a href="OrgAdmin_Registration.html">sign up</a></p>
        
    <?php endif; ?>

</body>
</html>
    
    
    
    
    
    
    
    
    
    
    