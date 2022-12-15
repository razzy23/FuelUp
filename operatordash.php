<?php
    include 'databaseaccess.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
            $(function(){
                $("#nav-placeholder").load("nav.html");
            });
        </script>
</head>
<body>
    <div id="nav-placeholder"></div>
        
    <h1>Enter vehicle details</h1>
    <form action="" method="POST">
        Enter the vehicle number<br/>
        <input type="text" name="vehicleno" id="vehicleno" required><br/><br/>
        <button type="submit" name="Submit">Submit</button>
    </form>
</body>
</html>

<?php
    if(array_key_exists('Submit',$_POST)){
        $vno= explode("-",$_POST['vehicleno']);
        $sql = "SELECT * FROM vehicle WHERE vlet = '$vno[0]' AND vnum = '$vno[1]'";
        $_SESSION['sql']= $sql;
        $result = $conn->query($sql);
        if($result==TRUE){
            header ("Location: vehicle.php");
        }
        else{
            echo "Vehicle not found";
        }
    }
        
?>