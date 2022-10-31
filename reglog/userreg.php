<html>
  <head>
    <title>Recieving data</title>
  </head>
  <body>
    <h1>Data recieved from the user registration form</h1>
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
        //connection to mySQL database


        $nic = $_POST['nic'];
        $phone = $_POST['phone'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $conf = $_POST['conf'];
        $terms = filter_input(INPUT_POST, 'terms', FILTER_VALIDATE_BOOLEAN); 
        //getting data from the form

        if($pass != $conf){
          die ("Registration error:<br/>Passwords do not match");
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !$email==null){
          die ("Registration error:<br/>Invalid email");
        }
        if(!$terms){
          die ("Registration error:<br/>You must agree to the terms and conditions");
        }
        if(strlen($nic) > 12){
          die ("Invalid NIC");
        }
        //validation

        $sql = "INSERT INTO users (nic, phone, name, email, password) VALUES ('$nic', '$phone', '$uname', '$email', '$pass')";
        //sql query to insert data to the account if valid

        if ($mysqli->query($sql) === TRUE) {
          echo("<br/>Account created successfully");
          header("Location: ulogin.html", true, 301);
          //redirect to login page
        } else {
          echo ("<br/>Error: " . $sql . "<br>" . $mysqli->error);
          //insert error
        }
        $mysqli->close();
      ?>
    </p>
  </body>
</html>