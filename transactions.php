<?php 
    include 'databaseaccess.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions view</title>
    <link href="adminstyles.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
        $.get("nav.html", function(data){
            $("#nav-placeholder").replaceWith(data);
            document.getElementById("transactions").style.color = "#E14761";
        });
        
    </script>
</head>
<body>
<div id="nav-placeholder"></div>
    <h1>Station Records</h1>
    Filters:&nbsp;&nbsp;

    <form action="" method="POST" onSubmit="onFormSub()">
        Station number &ensp;<input type="text" name="sno">

        Date: from &ensp;<input type="date" name="fromdate">
        to &ensp;<input type="date" name="todate"> 
        &ensp;&ensp;&ensp;&ensp;
        
        </select>
        &ensp;&ensp;&ensp;&ensp;
        Select company &ensp;
        <select name='company'>
            <option value='' disabled>Select company</option>
            <option value=''>All</option>
            <?php
                $sql2 = "SELECT DISTINCT company FROM station";
                $result2 = $conn->query($sql2);
                if($result2->num_rows > 0){
                    while($row2 = $result2->fetch_assoc()){
                        echo "<option value='".$row2['company']."'>".$row2['company']."</option>";
                    }
                }
            ?>
        </select>
        &ensp;&ensp;&ensp;&ensp;
        <input type="submit" value="Filter" name="filter">
</body>
</html>