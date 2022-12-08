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
    <title>Complains view</title>
</head>
<body>                                      
    <div id="nav-placeholder"></div>
    <h1>Complains view</h1>

    <?php
        $sql = "SELECT * FROM complains";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo ("<br><b>Customer:</b> ".$row['complain_owner']."&ensp;".$row['date']."</br>
                        <b>Topic:</b> ".$row['topic']."<br/>
                        <b>Description:</b> ".$row['description']."<br/>
                        <b>Status:</b> ".$row['status']."</br>");
                if($row['status'] == "pending"){
                    echo "<b>Response:</b> <form action='complainsview.php' method='POST'>
                    <textarea name='response' placeholder='Enter response' rows='4' cols='140'></textarea>
                    <button type='submit' name='resolve' value='".$row['complain_id']."'>Resolve</button></form>";
                }else{
                    echo "<p>Response: ".$row['response']."</p>";
                }
            }
        }

        if(array_key_exists('resolve', $_POST)){
            $id = $_POST['resolve'];
            $response = $_POST['response'];
            $sql = "UPDATE complains SET response='$response', status='Resolved' WHERE complain_id='$id'";
            if($conn->query($sql) === TRUE){
                header("Location: complainsview.php");
            }
            else{
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }

        ?>

</body>
</html>