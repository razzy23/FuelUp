<?php 
    include 'databaseaccess.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link href="history.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
        $.get("nav.html", function(data){
            $("#nav-placeholder").replaceWith(data);
            document.getElementById("history").style.color = "#E14761";
        });
        
    </script>
</head>
<body>
<div id="nav-placeholder"></div>
    <h1>Records</h1>
    Filters:&nbsp;&nbsp;
    Station &ensp;
        <select name='station'>
            <option value='' disabled>Select Station</option>
            <option value=''>All</option>
            <?php
                $sql2 = "SELECT DISTINCT station FROM station";
                $result2 = $conn->query($sql2);
                if($result2->num_rows > 0){
                    while($row2 = $result2->fetch_assoc()){
                        echo "<option value='".$row2['station']."'>".$row2['station']."</option>";
                    }
                }
            ?>
        </select>
        &ensp;&ensp;&ensp;&ensp;
        <form action="" method="GET" onSubmit="onFormSub()">
        Amount: Min &ensp;<input type="number" name="from">
        Max &ensp;<input type="number" name="to"> 
        &ensp;&ensp;&ensp;&ensp;
        
        </select>
        &ensp;&ensp;&ensp;&ensp;
        <form action="" method="POST" onSubmit="onFormSub()">
        Price: Min &ensp;<input type="number" name="fromprice">
        Max &ensp;<input type="number" name="toprice"> 
        &ensp;&ensp;&ensp;&ensp;
        
        </select>
        &ensp;&ensp;&ensp;&ensp;

        <input type="submit" value="Filter" name="filter">
        </form>
        <br>

        <?php
    if(array_key_exists('filter', $_GET)){
        $sno = $_GET['sno'];
        $fromdate = $_GET['fromdate'];
        $todate = $_GET['todate'];
        $sql = "SELECT * FROM transactions";
        if($sno != ""){
            $sno = " WHERE station_id = '$sno'";
        }
        if($fromdate != "" && $sno != ""){
            $fromdate = " AND date >= '$fromdate'";
        }else{
            if($sno == ""){
                $fromdate = " WHERE date >= '$fromdate'";
            }
        }
        if($todate != "" && ($sno != "" || $fromdate != "")){
            $todate = " AND date <= '$todate'";
        }else{
            if($sno == "" && $fromdate == ""){
                $todate = " WHERE date <= '$todate'";
            }
        }
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo "<table class='records'>
            <tr>
                <th>Date</th>
                <th>Station</th>
                <th>Operator</th>
                <th>Amount</th>
                <th>Price</th>
            </tr>";
            while($row = $result->fetch_assoc()){
                echo "<tr>
                <td>".$row['transaction_date']."</td>
                <td>".$row['station_id']."</td>
                <td>".$row['operator']."</td>
                <td>".$row['amount']."</td>
                <td>".$row['price']."</td>
                </tr>";
            }
            echo "</table>";
        }
        else{
            echo "No records found";
        }
    }
    ?>
    </body>
</html>
    