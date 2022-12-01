<?php include 'databaseaccess.php'; 

$sql1 = "SELECT DISTINCT fuel FROM vehicle";
$result1 = $conn->query($sql1);

$sql2 = "SELECT DISTINCT type FROM vehicle";
$result2 = $conn->query($sql2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vehicle records</title>
    <link href="adminstyles.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
        $.get("nav.html", function(data){
            $("#nav-placeholder").replaceWith(data);
            document.getElementById("vehicles").style.color = "#E14761";
        });
        
    </script>
</head>
<body>
    <div id="nav-placeholder"></div>
    <h1>Vehicle Records</h1>
    Filters:&nbsp;&nbsp;
    <form actions="" method="POST">
        vehicle number<input type="text" name="vno" placeholder="CAG-2342">&ensp;&ensp;&ensp;&ensp;
        Select Fuel &ensp;
        <select name='ftype'>
            <option value='' disabled>Select fuel type</option>
            <option value=''>All</option>
            <?php
                if($result1->num_rows > 0){
                    while($row1 = $result1->fetch_assoc()){
                        echo "<option value='".$row1['fuel']."'>".$row1['fuel']."</option>";
                    }
                }
            ?>
        </select>
        &ensp;&ensp;&ensp;&ensp;
        Select Type &ensp;
        <select name='type'>
            <option value='' disabled>Select Vehicle type</option>
            <option value=''>All</option>
            <?php
                if($result2->num_rows > 0){
                    while($row2 = $result2->fetch_assoc()){
                        echo "<option value='".$row2['type']."'>".$row2['type']."</option>";
                    }
                }
            ?>
        </select>
        &ensp;&ensp;&ensp;&ensp;
        <button type="submit" name="filter">Filter</button>
    </form> 

    <?php
    
        echo("Returning all results ");

        if(array_key_exists('filter', $_POST)) {
            if($_POST['vno'] != ""){
                $vno = explode("-", $_POST['vno'],2);
                $let = $vno[0];
                $num = $vno[1];
                $vno_q = " WHERE vnum = '$num' AND vlet = '$let'";
                echo(" where Vehicle number is is ".$let."-".$num);
            }
            if($_POST['ftype'] != ""){
                $ftype = $_POST['ftype'];
                if($vno_q != ""){
                    $fuel_q = " AND fuel = '$fype'";
                    echo(" and fuel is ".$ftype);
                }else{
                    $fuel_q = " WHERE fuel = '$ftype'";
                    echo(" where fuel is ".$ftype);
                }
            }
            if($_POST['type'] != ""){
                $type = $_POST['type'];
                if($vno_q != "" || $fuel_q != ""){
                    $type_q = " AND type = '$type'";
                    echo("and type is ".$type);
                }else{
                    $type_q = " WHERE type = '$type'";
                    echo(" where vehicle type is ".$type);
                }
            }
            $sql = "SELECT * FROM vehicle".$vno_q.$fuel_q.$type_q;
            $result = $conn->query($sql); 
        }else{
            $sql = "SELECT * FROM vehicle";
            $result = $conn->query($sql);
        }
    
        //echo("<br/>".$sql."<br/>");
    ?>
    <table class="records">
        <tr><th>NIC/BRN</th><th>Vehicle Number</th><th>Vehicle Type</th><th>Fuel type</th><th>Quota</th><th>quota_left</th></tr>

        <?php 
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr><td>".$row["nic"]."</td><td>".$row["vlet"]."-".$row['vnum']."</td><td>".$row["type"]."</td><td>".$row["fuel"]."</td><td>".$row["quota"]."</td><td>".$row["balance"]."</td></tr>";
                }
            }
        ?>

    </table>
</body>
</html>