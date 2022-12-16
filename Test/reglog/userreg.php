<html>
  <head>
    <title>Recieving data</title>
  </head>
  <body>
    <h1>Data recieved from the user registration form</h1>
    <p>
      <?php
      session_start();

      $nic = $_POST['nic'];
      $_SESSION['nic'] = $nic;
      $phone=$_POST['phone'];
      $_SESSION['phone'] = $phone;
      $_SESSION['uname'] = $_POST['uname'];
      $email = $_POST['email'];
      $_SESSION['email'] = $email;
      $pass = $_POST['pass'];
      $_SESSION ['pass'] = $pass;
      $conf = $_POST['conf']; 
      //getting data from the form

      if($pass != $conf){
        die ("Registration error:<br/>Passwords do not match");
      }
      if($email != null){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          die ("Registration error:<br/>Invalid email address"); //emails can be null or should have a correct entry
        }
      }
      if(strlen($nic) > 12){
        die ("Invalid NIC");
      }
      //validation

      header("Location: vehreg.html", true, 301);

?>
    </p>
  </body>
</html>