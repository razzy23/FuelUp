      <?php
        session_start();

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

        if(strlen($phone)>10){
          header("Location: ./ulogin.html", true, 301);
          die ("Invalid number");
        }

        $sql = "SELECT * FROM users WHERE phone = '$phone' AND password = '$pass'";
        //getting data from the database

        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        //checking if the user exists

        if (is_array($row)) {
          $_SESSION['phone'] = $row['phone'];
          $_SESSION['pass'] = $row['password'];
          $_SESSION['uname'] = $row['name'];
          echo('login successful');
          echo('<script>alert("Login successful");</script>');
          header("Location: ../dash.php", true, 301);
          //redirect to dashboard page
        } else {
          echo ('<script>alert("Invalid credentials");</script>');
        }
  $mysqli->close();
?>