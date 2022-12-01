    
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

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
            $mysqli = require __DIR__ . "/database.php";

                $query = "SELECT * FROM org_admin";
                $result = mysql_query($query);

                while($row = mysql_fetch_assoc($result)){
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
    
    