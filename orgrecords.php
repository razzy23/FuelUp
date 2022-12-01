<?php include 'databaseaccess.php';

$sql1 = "SELECT DISTINCT city FROM organization";
$result1 = $conn->query($sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization records</title>
    <link href="adminstyles.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
        $.get("nav.html", function(data){
            $("#nav-placeholder").replaceWith(data);
            document.getElementById("orgs").style.color = "#E14761";
        });
        
    </script>
</head>
<body>
    <div id="nav-placeholder"></div>
    <h1>Organizations Records</h1>
    Filters:&nbsp;&nbsp;
    <form actions="" method="POST">
        BRN Number<input type="text" name="id" placeholder="18237410923874">&ensp;&ensp;&ensp;&ensp;
        Phone Number<input type="text" name="phone" placeholder="077-">&ensp;&ensp;&ensp;&ensp;
        &ensp;&ensp;&ensp;&ensp;
        Select Location &ensp;
        <select name='loc'>
            <option value='' disabled>Select Location</option>
            <option value=''>All</option>
            <?php
                if($result1->num_rows > 0){
                    while($row1 = $result1->fetch_assoc()){
                        echo "<option value='".$row1['city']."'>".$row1['city']."</option>";
                    }
                }
            ?>
        </select>
        &ensp;&ensp;&ensp;&ensp;
        <button type="submit" name="filter">Filter</button>
    </form> 
    <?php
    
    if(array_key_exists('filter', $_POST)) {
        
        echo("returning all results");
        $sql= "SELECT * FROM organization";


        if($_POST['id'] != ""){
            $id = $_POST['id'];
            $id_q = " WHERE brn = '$id'";
            echo(" where BRN number is ".$id);
        }
        if($_POST['phone'] != ""){
            $phone = $_POST['phone'];
            if($id_q != ""){
                $phone_q = " AND phone = '$phone'";
                echo(" and phone number is ".$phone);
            }else{
                $phone_q = " WHERE phone = '$phone'";
                echo(" where phone number is ".$phone);
            }
        }
        if($_POST['loc'] != ""){
            $city = $_POST['loc'];
            if($id_q != "" || $phone_q != ""){
                $loc_q = " AND city = '$city'";
                echo("and location (city) is ".$city);
            }else{
                $loc_q = " WHERE city = '$city'";
                echo(" where location (city) is ".$city);
            }
        }
        $sql = $sql.$id_q.$phone_q.$loc_q;
        $result = $conn->query($sql);
    
    }else{
        $sql = "SELECT * FROM organization";
        $result = $conn->query($sql);
    }
        //echo("<br/>".$sql."<br/>");
    ?>
    <table class="records">
        <tr><th>BRN</th><th>Name</th><th>phone</th><th>address</th></tr>

        <?php 
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr><td>".$row["brn"]."</td><td>".$row["name"]."</td><td>".$row["phone"]."</td><td>".$row["building_no"].", ".$row['street_name'].", ".$row['city']."</td></tr>";
                }
            }
        ?>

    </table>
</body>
</html>