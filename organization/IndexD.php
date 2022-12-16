<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
     $mysqli = require __DIR__ . "/database.php";
    
     $sql = "SELECT * FROM org_driver
             WHERE id = {$_SESSION["user_id"]}";
            
     $result = $mysqli->query($sql);
    
     $user = $result->fetch_assoc();
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
      $.get("navd.html", function(data){
            $("#nav-placeholder").replaceWith(data);
            document.getElementById("FF").style.display = 'none';
            document.getElementById("QR").style.display = 'none';
            document.getElementById("History").style.display = 'none';
            document.getElementById("UVehicle").style.display = 'none';
        });
        
    </script>
</head>
<body>
<div id="nav-placeholder"></div>    
    <?php if (isset($user)): ?>

    <div class="outerDiv">
        <div class="leftDiv">
        <h1>Welcome <?= htmlspecialchars($user["username"]) ?></h1>

        </div>
        <div class="rightDiv">
            <div class = "nav2">
                    <a id="Drivers" href=""><div class="item2">Find Fuel</div></a>
                    <a id="vehicles" href=""><div class="item2">QR Code</div></a>
            </div>
            <div class="nav">
                    <a id="History" href=""><div class="item2">History</div></a>
                    <a id="complains" href=""><div class="item2">Update Vehicle</div></a>
            </div>
        </div>
    </div>


        <!-- <p><a href="logout.php">Log out</a></p> -->
        
    <?php else: ?>
        
        <p><a href="ODlogin.php">Log in</a> </p>
        
    <?php endif; ?>

</body>
</html>
    
    
    
    
    
    
    
    
    
    
    