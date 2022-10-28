<html>
  <head>
    <title>Recieving data</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Data recieved from the user registration form</h1>
    <<div class="signupFrm">
        <form action="" method="POST" class="form" >
          <h1 class="title">User Login</h1>

          <div class="inputContainer">
            <input type="text" name="phone" class="input" placeholder="a" required>
            <label for="" class="label">Phone number</label>
          </div>
    
          <div class="inputContainer">
            <input type="text" name="pass" class="input" placeholder="a" required>
            <label for="" class="label">Password</label>
          </div>
    
          <input type="submit" class="submitBtn" value="Login">
        </form>
      </div>
    <p>
      <?php

        $db_host = 'localhost';
        $db_user = 'root';
        $db_password = 'root';
        $db_db = 'FuelUp';

        $mysqli = @new mysqli(
          $db_host,
          $db_user,
          $db_password,
          $db_db
        );

        if ($mysqli->connect_error) {
          die('Connection error error:<br/>Errno: '.$mysqli->connect_errno.'<br/>Error'.$mysqli->connect_error);
        }
        echo('<br/>Success: A proper connection to MySQL was made.<br/> Host information: '.$mysqli->host_info.'<br/> Protocol version: '.$mysqli->protocol_version);

        $phone = $_POST['phone'];
        $pass = $_POST['pass'];
        //getting data from the form

        if(strlen($phone) > 10){
          die ("Invalid number");
        }

        $sql = "SELECT * FROM users WHERE phone = '$phone' AND password = '$pass'";
        //getting data from the database

        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        //checking if the user exists

        if ($result->num_rows !=0) {
          echo("<br/>Login successful");
          header("Location: dash.html", true, 301);
          //redirect to dashboard page
        } else {
          echo ("<br/>Error: " . $sql . "<br>" . $mysqli->error);
        }

      ?>
    </p>
  </body>
</html>

<?php
  $mysqli->close();
?>