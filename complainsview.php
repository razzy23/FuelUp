<?php 
    include 'databaseaccess.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="adminstyles.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
        $.get("nav.html", function(data){
            $("#nav-placeholder").replaceWith(data);
            document.getElementById("complains").style.color = "#E14761";
        });
        
    </script>
    <title>Complains</title>
</head>
<body>                                      
    <div id="nav-placeholder"></div>
    <h1>Complains</h1>
    <form action="" method="GET">
        <button type="submit" name="complainsbtn" id="resolvedbtn" value="resolved">Show resolved complains</button>
        <button type="submit" name="complainsbtn" id="pendingbtn" value="pending">Show pending complains</button>
    </form>

    <?php
        $sql = "SELECT * FROM complains";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($_GET['complainsbtn'] == "resolved"){
                    if($row['status'] == "Resolved"){
                        echo ("<br><b>Customer:</b> ".$row['complain_owner']."&ensp;".$row['date']."</br>
                        <b>Topic:</b> ".$row['topic']."<br/>
                        <b>Description:</b> ".$row['description']."<br/>
                        <b>Status:</b> ".$row['status']."</br>
                        <b>Response:</b> ".$row['response']."</br>");
                    }
                        echo("<script>document.getElementById('resolvedbtn').disabled = 'true';</script>");
                    
                }else if($_GET['complainsbtn'] == "pending"){
                    if($row['status'] == "Pending"){
                        echo ("<br><b>Customer:</b> ".$row['complain_owner']."&ensp;".$row['date']."</br>
                        <b>Topic:</b> ".$row['topic']."<br/>
                        <b>Description:</b> ".$row['description']."<br/>
                        <b>Status:</b> ".$row['status']."</br>");
                        echo "<b>Response:</b> <form action='complainsview.php' method='POST'>
                        <textarea name='response' placeholder='Enter response' rows='4' cols='140'></textarea>
                        <button type='submit' name='resolve' value='".$row['complain_id']."'>Resolve</button></form>";

                        echo("<script>document.getElementById('pendingbtn').disabled = 'true';</script>");
                    }
                }
            }
        }

        if(array_key_exists('resolve', $_POST)){
            $id = $_POST['resolve'];
            $response = $_POST['response'];
            $sql = "UPDATE complains SET response='$response', status='Resolved' WHERE complain_id='$id'";
            if($conn->query($sql) === TRUE){
                header("Location: complainsview.php?complainsbtn=pending");
            }
            else{
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }

        ?>

</body>
</html>