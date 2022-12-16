<?php
    include 'databaseaccess.php';
    $nic = $_SESSION['nic'];
    $sql = "SELECT * FROM users where nic = '$nic'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $uname = $_SESSION['username'];
    $phone = $row['phone'];
    $email = $row['email'];

    $sql2 = "SELECT * FROM vehicles where nic = '$nic'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $vno = $row2['vletter'].$row2['vnumber'];
    $vtype = $row2['vtype'];
    $fuel = $row2['vfuel'];
    $quota = $row2['alloc_quota'];
    $balance = $row2['bal_quota'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//code.jquery.com/jquery.min.js"></script>
	<link href="profile.css" rel="stylesheet">
    <script>
        $.get("nav.html", function(data){
            $("#nav-placeholder").replaceWith(data);
            //document.getElementById("stations").style.color = "#E14761";
        });
        $(document).ready(function()
            {
                $("tr:odd").css({
                    "background-color":"#f0f0f0",
                    "color":"#000"});
            });
    </script>
    <script>
        $.get("nav.html", function(data){
            $("#nav-placeholder").replaceWith(data);
            document.getElementById("profile").style.color = "#E14761";
        });
		</script>
    <title>Profile</title>
</head>
<body>
    <div id="nav-placeholder"></div>
    <h1>Profile</h1>
    <div id='container'>
        <div id='left'>
            <div id='profilepic'>
                <img src='imgs/pic.png' alt='profilepic'>
            </div>
            <div id='profiledetails'>
                <h2>Profile Details</h2>
                <table>
                    <tr>
                        <td>Name</td>
                        <td>John Doe</td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>john_doe</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                    </tr>
                </table>
            </div>
        </div>
        <div id='right'>
            <div id='User'>
                <h2>User Details</h2>
                <table>
                    <tr>
                        <th>User name</th>
                        <td><?php echo $uname;?></td>
                    </tr>
                    <tr>
                        <th>NIC</th>
                        <td><?php echo $nic;?></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td><?php echo $phone;?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $email;?></td>
                    </tr>
                </table>
            </div>
            <div id='vehicle'>
                <h2>Vehicle Details</h2>
                <table>
                    <tr>
                        <th>Vehicle number</th>
                        <td><?php echo $vno;?></td>
                        
                    </tr>
                    <tr>
                        <th>Vehicle type</th>
                        <td><?php echo $vtype;?></td>
                    </tr>
                    <tr>
                        <th>Fuel</th>
                        <td><?php echo $fuel;?></td>
                    </tr>
                    <tr>
                        <th>Quota</th>
                        <td><?php echo $quota;?></td>
                    </tr>
                    <tr>
                        <th>Balance</th>
                        <td><?php echo $balance;?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>