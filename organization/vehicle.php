<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
     $mysqli = require __DIR__ . "/database.php";
    
     $sql = "SELECT * FROM org_admin
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
    <link href="style.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
        $.get("nav.html", function(data){
            $("#nav-placeholder").replaceWith(data);
            document.getElementById("Vehicles").style.color = "#E14761";
        });
        
    </script>
</head>
<body>
        
    <div id="nav-placeholder"></div>
    <h2>Vehicles List</h2>
    <div class="center">
        <br>
        <table>
            <thead>
                <tr>
                    <th>Vehicle Number</th>
                    <th>Type</th>
                    <th>Fuel</th>
                    <th>Chassis Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $BRN = $_SESSION["BRN"];
                $mysqli = require __DIR__ . "/database.php";
                $res=mysqli_query($mysqli,"select * from vehicles WHERE nic ='$BRN'");
                while($row=mysqli_fetch_array($res)){
                    $id = $row['v_id'];
                        echo"<tr>
                                <td>" .$row["vletter"] . " - ".$row["vnumber"]."</td>
                                <td>" .$row["vtype"] . "</td>
                                <td>" .$row["vfuel"] . "</td>
                                <td>" .$row["chassis"] . "</td>
                                <td>
                                <a href='deleteveh.php?deleteid=". $id. "'>Delete</a>
                                </td>
                            </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="right">
        <button class ="button1"><a href="AddVehicle.html">Add Vehicle</a></button>
    </div>
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    