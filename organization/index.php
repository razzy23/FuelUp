<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
     $mysqli = require __DIR__ . "/database.php";
    
     $sql = "SELECT * FROM org_admin
             WHERE id = {$_SESSION["user_id"]}";            
     $result = $mysqli->query($sql);
     $user = $result->fetch_assoc();

     $ADminID= "SELECT BRN FROM org_admin WHERE id = {$_SESSION["user_id"]}";
     $result = $mysqli->query($ADminID);
     $BRN = $result->fetch_assoc();
     
 }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
    <h1>Home - Admin </h1>
    
    <?php if (isset($user)): ?>

        <p>Hello <?= htmlspecialchars($user["CompanyName"]) ?></p>
        <p><a href="AddDriver.html">Add driver</a></p>
        <p><a href="logout.php">Log out</a></p>
        
    <?php else: ?>
        
        <p><a href="OAlogin.php">Log in</a> or <a href="OrgAdmin_Registration.html">sign up</a></p>
        
    <?php endif; ?>

    <h2>Driver List</h2>
    <br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>NIC</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo($BRN);
            $mysqli = require __DIR__ . "/database.php";
            $res=mysqli_query($mysqli,"select * from org_driver WHERE BRN ='$BRN'");
            while($row=mysqli_fetch_array($res)){
                    echo"<tr>
                            <td>" .$row["id"] . "</td>
                            <td>" .$row["username"] . "</td>
                            <td>" .$row["NIC"] . "</td>
                            <td>" .$row["email"] . "</td>
                            <td>
                                <a href='delete'>Delete</a>
                            </td>
                        </tr>";
                }
            ?>
        </tbody>
    </table>

</body>
</html>
    
    
    
    
    
    
    
    
    
    
    