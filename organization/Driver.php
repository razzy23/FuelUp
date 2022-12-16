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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <!-- <link href="../FuelUp-raz-admin/adminstyles.css" rel="stylesheet"> -->
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
        $.get("nav.html", function(data){
            $("#nav-placeholder").replaceWith(data);
            document.getElementById("Drivers").style.color = "#E14761";
        });
        
    </script>
</head>
<body>
        
    <div id="nav-placeholder"></div>
    <h2>Driver List</h2>
    <div class="center">
        <br>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>NIC</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $BRN = $_SESSION["BRN"];
                $mysqli = require __DIR__ . "/database.php";
                $res=mysqli_query($mysqli,"select * from org_driver WHERE BRN ='$BRN'");
                                
                while($row=mysqli_fetch_array($res)){
                    $id = $row['id'];
                        echo"<tr>
                                <td>" .$row["username"] . "</td>
                                <td>" .$row["NIC"] . "</td>
                                <td>" .$row["email"] . "</td>
                                <td>
                                    <a href='delete.php?deleteid=". $id. "'>Delete</a>
                                </td>
                            </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="right">
        <button class ="button1"><a href="AddDriver.html">Add Driver</a></button>
    </div>
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    