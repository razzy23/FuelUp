<?php
    include 'databaseaccess.php';
?>
<!DOCTYPE html>
<html>

   <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="complaints.css" rel="stylesheet">
      <title>Complaints</title>
      <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
        $.get("nav.html", function(data){
            $("#nav-placeholder").replaceWith(data);
            document.getElementById("complaints").style.color = "#E14761";
        });
    </script>
   </head>
	
   <body>
   <div id="nav-placeholder"></div>
  <div class="row">
  <div class="column">
  <form action="" method="POST" >
         Topic: <input type = "text" name="topic" placeholder="brief topic" />
         <br><br>
         Briefly explain the issue: <br>  <textarea name="message" rows="10" cols="30"></textarea>
         <br>
         <input type="reset" value="Cancel">
         <input type="submit" value="Post">
      </form>
  </div>
  <div class="column">
    <h2>FAQs</h2>
    <h3>How to edit profile?</h3>
    <p>Click on the profile icon in the top right corner and select edit profile option at the bottom of the page</p>
    <br>
    <h3>How to check previous transactions</h3>
    <p>Click on “history”
To select a specific date or amount, type in the value in the relevant input box</p>
<br>
    <h3>Can i sign in to another account?</h3>
    <p>Why would you want to unless you’re trying to get more fuel than you should :)</P>
  </div>
</div>


   </body>
	
</html>

<table>
<?php 


    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }


?>
</table>

<?php 
// session_start ();  
        $id=$_SESSION['id'];
        $topic = $_POST['topic'];
        $message = $_POST['message'];
        $sql = "INSERT INTO complaints (complain_owner, topic, message) VALUES ('$id', '$topic', '$message')";
        if($conn->query) {
            echo "complain logged successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
?>


