<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM org_admin
                    WHERE BRN = '%s'",
                   $mysqli->real_escape_string($_POST["BRN"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
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
                <h1 class="title">Admin Login</h1>
                <a href="OrgAdmin_Registration.html" id="mis">Don't have an account? Sign up instead</a>
            </div>
          <div class="inputContainer">
            <input type="number" name="BRN" class="input" placeholder="a" id="BRN"
               value="<?= htmlspecialchars($_POST["BRN"] ?? "") ?>" required>
            <label for="BRN" class="label">BRN</label>
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