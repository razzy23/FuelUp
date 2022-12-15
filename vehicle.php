<?php
    include 'databaseaccess.php';
    $result = $conn->query($_SESSION['sql']);
    $row = $result->fetch_assoc();
    $vlet = $row['vlet'];
    $vnum = $row['vnum'];
    $quota = $row['quota'];
    $balance = $row['balance'];
    $fuel = $row['fuel'];
    $owner = $row['owner_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle details</title>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
            $(function(){
                $("#nav-placeholder").load("nav.html");
            });
    </script>
    <style>
        th, td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div id="nav-placeholder"></div>
    <table>
        <tr>
            <th>Vehicle number</th>
            <td><?php echo $vlet."-".$vnum; ?></td>
        </tr><tr>
            <th>Quota</th>
            <td><?php echo $quota; ?></td>
        </tr><tr>
            <th>Balance</th>
            <td><?php echo $balance; ?></td>
        </tr><tr>
            <th>Fuel type</th>
            <td><?php echo $fuel; ?></td>
        </tr>
    </table>
    <form action="" method="POST">
        Enter the amount of fuel<br/>
        <input type="text" name="amount" id="fuel">
        
        <?php if($fuel == "petrol") {
                echo '<select name="fueltype" >
                <option value="92" selected>92</option>
                <option value="95">95</option>
                </select>'; }
            else if($fuel == "diesel") {
                echo ' <select name="fueltype">
                <option value="auto" selected>auto</option>
                <option value="super">super</option>
                </select>';} ?>
        <br/><br/>
        <button type="submit" name="update">Pump Fuel</button>
        <button type="submit" name="exit" id="exit">Exit</button>
    </form>
</body>
</html>

<?php
    if(array_key_exists('update',$_POST)){
        $amount = $_POST['amount'];
        $fueltype = $_POST['fueltype'];
        $fueldata = "$fuel"."$fueltype"."_bal";
        $station = $_SESSION['stationno'];
        $code = $_SESSION['code'];
        $f = "SELECT $fueldata FROM station WHERE station_id = $station"; //get the station balance
        echo $f;
        $result = $conn->query($f);
        $fuelbalance = $result->fetch_assoc()[$fueldata];
        if($amount > 0 && $amount <= $balance){ //check if the amount is valid
            $sql_quota = "UPDATE vehicle SET balance = $balance-$amount WHERE vlet = '$vlet' AND vnum = '$vnum'";       //update the balance
            $sql_station = "UPDATE station SET $fueldata = $fuelbalance-$amount WHERE station_id = $station"; //update the station balance
            
            $sql_transaction = "INSERT INTO transactions (station_id, operator, vehicle_let, vehicle_num, owner, fuel, amount) VALUES ('$station', '$code','$vlet','$vnum','$owner', '$fuel.$fueltype', '$amount')";
            
            if($result_update = $conn->query($sql_quota)){
                echo "quota updated";
                if($result = $conn->query($sql_station)){
                    echo "station updated";
                    if($result = $conn->query($sql_transaction)){
                        echo "transaction updated";
                    }else{
                        echo "Error - transaction updating";
                    }
                }else{
                    echo "Error - station updating";
                }
            }else{
            echo "Invalid amount";
            }
        }
    }

    if(array_key_exists('exit',$_POST)){
        header ("Location: operatordash.php");
        unset($result);
    }
?>