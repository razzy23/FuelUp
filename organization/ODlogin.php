<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM org_driver
                    WHERE username = '%s'",
                   $mysqli->real_escape_string($_POST["username"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: IndexD.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet">
    <title>Sign In</title>
</head>

<body>

<?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>

    <div class="signupFrm">
        <img src="../imgs/logo2.png" alt="logo" id="logo2">
        
        <form method="POST" class="form" >
            <div id="regorlogin">
                <h1 class="title">Driver Login</h1>
            </div>
          <div class="inputContainer">
            <input type="text" name="username" class="input" placeholder="a" id="username"
               value="<?= htmlspecialchars($_POST["username"] ?? "") ?>" required>
            <label for="username" class="label">Username</label>
          </div>
    
          <div class="inputContainer">
            <input type="password" name="password" class="input" placeholder="a" id="password" required>
            <label for="" class="label">Password</label>
          </div>

          <a href="ForgotPassword.html" id="FP" >Forgot Password</a>
          <input type="submit" class="submitBtn" value="Login">
        </div>
        </form>
      </div>
</body>
</html>