<?php
    include 'databaseaccess.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash.css" type="text/css">
    <title>Dashboard</title>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
        $.get("nav.html", function(data){
            $("#nav-placeholder").replaceWith(data);
             //document.getElementById("dash").style.color = "#E14761";
             document.getElementById("findfuel").style.display='none';
             document.getElementById("qrcode").style.display='none';
             document.getElementById("complaints").style.display='none';
             document.getElementById("history").style.display='none';
        });
    </script>
</head>
<body>
    <div id="nav-placeholder"></div>	

<?php
// Set session variables

echo "Welcome " . $_SESSION['uname'] . "<br>";

?>
<div class="split right">
<div class="container">
            <div class="box"><div class="action-container">
             <a href="findfuel.php" class="button">Find Fuel</a>
        </div></div>
            <div class="box"><div class="action-container">
             <a href="qrcode.php" class="button">QR Code</a>
        </div></div>
            <div class="box"><div class="action-container">
             <a href="complaints.php" class="button">Complaints</a>
        </div></div>
            <div class="box"><div class="action-container">
             <a href="history.php" class="button">History</a>
        </div></div>
        </div>
    </div>
    </div>
    <div class="split left">
    
    <div class="container2">
            <div class="card">
                <div class="percent" style="--clr:#E14761;--num:85;">
                    <div >
                        <svg>
                        <circle cx="100" cy="95" r="88"></circle>
                        <circle cx="100" cy="95" r="88"></circle>
                    </svg>
                
                    <div class="number">
                       <h2>0/20<span></span></h2>
                       <p>Remaining Quota</p>
                    </div>
                 </div>
            </div>
    </div>
</body>
</html>