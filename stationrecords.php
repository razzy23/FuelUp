<?php include 'databaseaccess.php'; 

    $sql1 = "SELECT DISTINCT location FROM station";
    $result1 = $conn->query($sql1);

    $sql2 = "SELECT DISTINCT company FROM station";
    $result2 = $conn->query($sql2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>station records</title>
    <link href="adminstyles.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
        $.get("nav.html", function(data){
            $("#nav-placeholder").replaceWith(data);
            document.getElementById("stations").style.color = "#E14761";
        });
        
    </script>

</head>
<body>
    <div id="nav-placeholder"></div>
    <h1>Station Records</h1>
    Filters:&nbsp;&nbsp;
    <form actions="" method="POST" onSubmit="onFormSub()">
        Station number &ensp;<input type="text" name="sno">

        &ensp;&ensp;&ensp;&ensp;
        
        Select location &ensp;
        <select name='location'>
            <option value='' disabled>Select location</option>
            <option value=''>All</option>
            <?php
                if($result1->num_rows > 0){
                    while($row1 = $result1->fetch_assoc()){
                        echo "<option value='".$row1['location']."'>".$row1['location']."</option>";
                    }
                }
            ?>
        </select>
        &ensp;&ensp;&ensp;&ensp;
        Select company &ensp;
        <select name='company'>
            <option value='' disabled>Select company</option>
            <option value=''>All</option>
            <?php
                if($result2->num_rows > 0){
                    while($row2 = $result2->fetch_assoc()){
                        echo "<option value='".$row2['company']."'>".$row2['company']."</option>";
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
        if($_POST['sno'] != ""){
            $sno = $_POST['sno'];
            $sno_q = " WHERE station_id = '$sno'";
            echo("where station id is".$sno);
        }
        if($_POST['location'] != ""){
            $location = $_POST['location'];
            if($sno_q != ""){
                $loc_q = " AND Location = '$location'";
                echo("and location is ".$location);
            }else{
                $loc_q = " WHERE Location = '$location'";
                echo("where location is ".$location);
            }
        }
        if($_POST['company'] != ""){
            $company = $_POST['company'];
            if($sno_q != "" || $loc_q != ""){
                $comp_q = " AND company = '$company'";
                echo("and company is ".$company);
            }else{
                $comp_q = " WHERE company = '$company'";
                echo("where location is ".$company);
            }
        }
        $sql = "SELECT * FROM station".$sno_q.$loc_q.$comp_q;
        $result = $conn->query($sql); 
    }else{
        $sql = "SELECT * FROM station";
        $result = $conn->query($sql);
    }
    
    ?>
    <table class="records">
        <tr><th>ID</th><th>Name</th><th>Location</th><th>Company</th><th>petrol92 balance</th><th>petrol95 balance</th><th>Diesel balance</th><th>Super-diesel balance</th><th>Kerosene balance</th><th>phone number</th></tr>

        <?php 
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr><td>".$row["station_id"]."</td><td>".$row["Name"]."</td><td>".$row["Location"]."</td><td>".$row["Company"]."</td><td>".$row["petrol92_bal"]."</td><td>".$row["petrol95_bal"]."</td><td>".$row["diesel_bal"]."</td><td>".$row["supdiesel_bal"]."</td><td>".$row["kerosene_bal"]."</td><td>".$row["Phone"]."</td></tr>";
                }
            }
            
        ?>

    </table>
</body>
</html>